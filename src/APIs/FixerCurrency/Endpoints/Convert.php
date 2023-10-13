<?php

namespace LaravelLiberu\Currencies\APIs\FixerCurrency\Endpoints;

class Convert extends Endpoint
{
    private const Endpoint = 'convert';

    public function __construct(private array $params)
    {
    }

    public function path(): string
    {
        return self::Endpoint;
    }

    public function params(): array
    {
        return $this->params;
    }
}
