<?php

namespace LaravelEnso\Currencies\APIs\FixerCurrency;

class Symbols
{
    private const EndPoint = 'symbols';

    private $api;

    public function __construct()
    {
        $this->api = new Api();
    }

    public function handle()
    {
        return $this->api->endPoint(self::EndPoint)->request();
    }
}
