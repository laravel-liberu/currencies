<?php

namespace LaravelEnso\Currencies\APIs\FixerCurrency\Endpoints;

class Symbols extends Endpoint
{
    private const Endpoint = 'symbols';

    public function path(): string
    {
        return self::Endpoint;
    }

    public function params(): array
    {
        return [];
    }
}
