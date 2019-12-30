<?php

namespace LaravelEnso\Currencies\App\APIs\FixerCurrency;

use Illuminate\Support\Collection;
use LaravelEnso\Currencies\App\Models\Currency;

abstract class Exchange
{
    protected $api;
    protected $base;
    protected $currencies;

    public function __construct(Currency $base, $currencies)
    {
        $this->api = new Api();
        $this->base = $base;
        $this->currencies = $currencies;
    }

    protected function symbols()
    {
        $collection = $this->currencies instanceof Collection
            ? $this->currencies
            : new Collection([$this->currencies]);

        return $collection
            ->map(fn (Currency $currency) => $currency->code)
            ->implode(',');
    }
}
