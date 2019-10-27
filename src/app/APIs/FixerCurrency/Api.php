<?php

namespace LaravelEnso\Currencies\app\APIs\FixerCurrency;

use GuzzleHttp\Client;
use LaravelEnso\Currencies\app\APIs\Exceptions\FixerCurrencyApiException;

class Api
{
    private const Method = 'GET';

    private $client;
    private $method;
    private $endPoint;
    private $query;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => $this->baseUri()]);

        $this->method = self::Method;
    }

    public function request()
    {
        $response = $this->client->request($this->method, $this->endPoint, [
            'headers' => $this->headers(),
            'query' => $this->query,
        ]);

        return $this->body($response);
    }

    public function method($method)
    {
        $this->method = $method;

        return $this;
    }

    public function endPoint($endPoint)
    {
        $this->endPoint = $endPoint;

        return $this;
    }
    
    public function query($query)
    {
        $this->query = $query;

        return $this;
    }

    private function body($response)
    {
        if ($response->getStatusCode() !== 200) {
            throw FixerCurrencyApiException::unableToConnect(
                $response->getStatusCode()
            );
        }

        $body = json_decode($response->getBody());

        if (! $body->success) {
            throw FixerCurrencyApiException::error($body->code, $body->type);
        }

        return $body;
    }

    private function headers()
    {
        return [
            'x-rapidapi-host' => $this->host(),
            'x-rapidapi-key' => config('enso.currencies.fixerCurrencyApi.key'),
        ];
    }

    private function baseUri()
    {
        return "https://{$this->host()}";
    }

    private function host()
    {
        return config('enso.currencies.fixerCurrencyApi.host');
    }
}
