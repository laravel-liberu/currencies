<?php

namespace LaravelEnso\Currencies\APIs\FixerCurrency\Actions;

use Carbon\Carbon;
use LaravelEnso\Currencies\APIs\FixerCurrency\Endpoints\History as Endpoint;
use LaravelEnso\Currencies\Models\Currency;

class History extends Exchange
{
    private $date;

    public function __construct(Currency $base, $currencies, Carbon $date)
    {
        parent::__construct($base, $currencies);

        $this->date = $date;
    }

    protected function endpoint(): Endpoint
    {
        return new Endpoint([
            'base' => $this->base->code,
            'symbols' => $this->symbols(),
        ], $this->date);
    }
}
