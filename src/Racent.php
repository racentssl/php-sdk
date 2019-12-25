<?php

namespace Racent;

use Racent\Exceptions\RacentException;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

use function GuzzleHttp\json_decode;

class Racent
{
    const API_BASE = 'https://portal.racent.com';

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

    public function __construct($api_token)
    {
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
        $client = new Client([
            'base_uri' => self::API_BASE,
        ]);

        $response = $client->post($url, [
            RequestOptions::QUERY => $query,
            RequestOptions::JSON => collect($data)->merge([
                'api_token' => $this->api_token,
            ])->toArray(),
        ]);

        $body = json_decode($response->getBody()->__toString());
        if (!isset($body->code)) {
            throw new RacentException('Bad response format', 412);
        }

        if ($body->code != 1) {
            $message = collect($body->errors)->count() ? collect($body->errors)->collapse()->implode(',') : json_encode($body);
            throw new RacentException($body->code . ' ' . $message, 412);
        }

        if (!isset($body->data)) {
            return $body;
        }

        $data = $body->data;
        $meta = collect((array) $body)->except(['data', 'code']);
        foreach ($meta as $key => $value) {
            if (!isset($data->{$key})) {
                data_set($data, $key, $value);
            }
        }
        return $data;
    }
}
