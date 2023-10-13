<?php

namespace LaravelLiberu\Currencies\APIs\FixerCurrency\Actions;

use LaravelLiberu\Api\Action;
use LaravelLiberu\Currencies\APIs\FixerCurrency\Endpoints\Symbols as Endpoint;

class Symbols extends Action
{
    protected function endpoint(): Endpoint
    {
        return new Endpoint();
    }
}
