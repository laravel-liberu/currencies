<?php

namespace LaravelLiberu\Currencies\APIs\FixerCurrency\Endpoints;

class Rates extends Endpoint
{
    private const Endpoint = 'latest';

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
