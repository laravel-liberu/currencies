<?php

namespace LaravelEnso\Currencies\App\APIs\FixerCurrency;

use Carbon\Carbon;
use LaravelEnso\Currencies\App\Models\Currency;

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
            ->query($this->query())
            ->request();
    }

    private function query()
    {
        return [
            'base' => $this->base,
            'symbols' => $this->symbols(),
        ];
    }
}
