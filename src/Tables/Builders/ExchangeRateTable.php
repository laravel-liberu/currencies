<?php

namespace LaravelEnso\Currencies\Tables\Builders;

use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Currencies\Models\ExchangeRate;
use LaravelEnso\Tables\Contracts\Table;

class ExchangeRateTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/exchangeRates.json';

    public function query(): Builder
    {
        return ExchangeRate::selectRaw('
            exchange_rates.id, exchange_rates.date, exchange_rates.conversion,
            fromCurrencies.code as "from", toCurrencies.code as "to"
        ')->join('currencies as fromCurrencies', 'fromCurrencies.id', '=', 'exchange_rates.from_id')
            ->join('currencies as toCurrencies', 'toCurrencies.id', '=', 'exchange_rates.to_id');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
