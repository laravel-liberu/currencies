<?php

namespace LaravelEnso\Currencies\App\APIs\FixerCurrency;

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
