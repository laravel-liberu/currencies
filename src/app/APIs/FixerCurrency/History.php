<?php

namespace LaravelEnso\Currencies\app\APIs\FixerCurrency;

use Carbon\Carbon;
use LaravelEnso\Currencies\app\Models\Currency;

class History extends Exchange
{
    private $date;

    public function __construct(Currency $base, $currencies, Carbon $date)
    {
        parent::__construct($base, $currencies);

        $this->date = $date;
    }

    public function handle()
    {
        return $this->api->endPoint($this->date->format('Y-m-d'))
            ->query([
                'base' => $this->base,
                'symbols' => $this->symbols(),
            ])->request();
    }
}
