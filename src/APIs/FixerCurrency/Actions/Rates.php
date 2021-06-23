<?php

namespace LaravelEnso\Currencies\APIs\FixerCurrency\Actions;

use LaravelEnso\Currencies\APIs\FixerCurrency\Endpoints\Rates as Endpoint;

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
