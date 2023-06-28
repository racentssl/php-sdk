<?php

namespace Racent;

use ArrayObject;
use Racent\Exceptions\RacentException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;

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
            'base_uri' => static::API_BASE,
            RequestOptions::HTTP_ERRORS => false,
        ]);

        $url && logger()->info('Racent URL', [$url]);
        $query && logger()->info('Racent Query', $query);
        $data && logger()->info('Racent Data', $data);

        $response = $client->post($url, [
            RequestOptions::QUERY => $query,
            RequestOptions::JSON => collect($data)->merge([
                'api_token' => $this->api_token,
            ])->toArray(),
        ]);
        $body = json_decode($response->getBody()->__toString());

        if ($response->getStatusCode() != 200) {
            logger()->info('Racent Response statusCode: ' . $response->getStatusCode());
            logger()->info('Racent Response body: ' . $response->getBody()->__toString());
            throw new RacentException('API responses bad status code ' . $response->getStatusCode(), 400);
        }
        if (json_last_error() === JSON_ERROR_NONE) {
            logger()->info('Racent Response', json_decode($response->getBody()->__toString(), true));
        } else {
            throw new RacentException('API responses bad json ' . $response->getBody()->__toString(), 400);
        }
        if (!isset($body->code)) {
            throw new RacentException('API responses bad format' . $response->getBody()->__toString(), 412);
        }

        if ($body->code != 1) {
            if (is_string($body->errors)) {
                $body->errors = new ArrayObject([
                    'err' => [
                        $body->errors,
                    ],
                ]);
            }

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
