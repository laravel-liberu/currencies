<?php

namespace LaravelEnso\Currencies\APIs\FixerCurrency\Endpoints;

use Carbon\Carbon;

class History extends Endpoint
{
    public function __construct(
        private array $params,
        private Carbon $date
    ) {
    }

    public function path(): string
    {
        return $this->date;
    }

    public function params(): array
    {
        return $this->params;
    }
}
