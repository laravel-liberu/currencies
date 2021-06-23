<?php

namespace LaravelEnso\Currencies\APIs\FixerCurrency\Actions;

use LaravelEnso\Api\Action;
use LaravelEnso\Currencies\APIs\FixerCurrency\Endpoints\Symbols as Endpoint;

class Symbols extends Action
{
    protected function endpoint(): Endpoint
    {
        return new Endpoint();
    }
}
