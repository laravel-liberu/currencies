<?php

namespace LaravelLiberu\Currencies\APIs\FixerCurrency\Actions;

use LaravelLiberu\Api\Action;
use LaravelLiberu\Currencies\APIs\FixerCurrency\Endpoints\Convert as Endpoint;
use LaravelLiberu\Currencies\Models\Currency;

class Convert extends Action
{
    public function __construct(
        private Currency $from,
        private Currency $to,
        private float $amount
    ) {
    }

    protected function endpoint(): Endpoint
    {
        return new Endpoint([
            'from' => $this->from->code,
            'to' => $this->to->code,
            'amount' => $this->amount,
        ]);
    }
}
