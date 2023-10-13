<?php

namespace LaravelLiberu\Currencies\APIs\FixerCurrency\Actions;

use LaravelLiberu\Currencies\APIs\FixerCurrency\Endpoints\Rates as Endpoint;

class Rates extends Exchange
{
    protected function endpoint(): Endpoint
    {
        return new Endpoint([
            'base' => $this->base->code,
            'symbols' => $this->symbols(),
        ]);
    }
}
