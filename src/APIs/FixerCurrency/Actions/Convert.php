<?php

namespace LaravelEnso\Currencies\APIs\FixerCurrency\Actions;

use LaravelEnso\Api\Action;
use LaravelEnso\Currencies\APIs\FixerCurrency\Endpoints\Convert as Endpoint;
use LaravelEnso\Currencies\Models\Currency;

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
