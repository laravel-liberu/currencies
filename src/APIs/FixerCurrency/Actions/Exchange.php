<?php

namespace LaravelEnso\Currencies\APIs\FixerCurrency\Actions;

use Illuminate\Support\Collection;
use LaravelEnso\Api\Action;
use LaravelEnso\Currencies\Models\Currency;

abstract class Exchange extends Action
{
    protected Currency $base;
    protected Collection $currencies;

    public function __construct(Currency $base, Collection $currencies)
    {
        $this->base = $base;
        $this->currencies = $currencies;
    }

    protected function symbols()
    {
        return $this->currencies->map->code->implode(',');
    }
}
