<?php

namespace Racent;

use Racent\Exceptions\RacentException;
use Illuminate\Support\Facades\Http;

class Racent
{
    const API_BASE = 'https://portal.racent.com';

    const NAME = 'Racent';

    /**
     * API url
     *
     * @var string
     */
    protected $api_url;

    /**
     * API token
     *
     * @var string
     */
    protected $api_token = null;

    /**
     * 订单/证书对象
     *
     * @var RacentSsl
     */
    public $ssl = null;

    /**
     * 订单/证书对象
     *
     * @var RacentProduct
     */
    public $product = null;

    public function __construct($api_token, $api_url = null)
    {
        if ($api_url) {
            $this->api_url = $api_url;
        } else {
            $this->api_url = static::API_BASE;
        }

        $this->api_token = $api_token;

        $this->ssl = new RacentSsl($this);
        $this->product = new RacentProduct($this);
    }

    /**
     * POST提交
     *
     * @param string $url
     * @param array $query
     * @param array $data
     * @return object
     */
    public function post($url, $query, $data)
    {
        $url && logger()->info(static::NAME . ' [Request] URL', [$url]);
        $query && !empty($query) && logger()->info(static::NAME . ' [Request] Query', $query);
        $data && !empty($data) && logger()->info(static::NAME . ' [Request] Data', $data);

        $response = Http::acceptJson()->asJson()
            ->timeout(20)
            ->connectTimeout(10)
            ->withQueryParameters($query ?? [])
            ->post($this->api_url . $url, collect($data)->merge(['api_token' => $this->api_token, ])->toArray());

        $json = $response->object();

        if (!$response->successful()) {
            logger()->error(static::NAME . ' [Response] statusCode: ' . $response->status());
            logger()->error(static::NAME . ' [Response] body', $response->json() ? $response->json() : [$response->body()]);
            throw new RacentException('API responses bad status code ' . $response->status(), 400);
        }
        if (!$response->json('code')) {
            logger()->error(static::NAME . ' [Response] bad format', $response->json() ? $response->json() : [$response->body()]);
            throw new RacentException('API responses bad format' . $response->body(), 412);
        }

        if ($response->json('code') != 1) {
            $message = collect($response->json('errors'))->count() ? collect($response->json('errors'))->collapse()->implode(',') : json_encode($json);
            logger()->error(static::NAME . ' [Response] error message', [$message]);
            throw new RacentException($response->json('code') . ' ' . $message, 412);
        }

        if (!$response->json('data')) {
            return $json;
        }

        $data = $json->data;
        $meta = collect($response->json())->except(['data', 'code']);
        foreach ($meta as $key => $value) {
            if (!isset($data->{$key})) {
                data_set($data, $key, $value);
            }
        }
        return $data;
    }
}
