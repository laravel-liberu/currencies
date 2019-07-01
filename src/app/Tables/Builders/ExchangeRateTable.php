<?php

namespace LaravelEnso\Currencies\app\Tables\Builders;

use LaravelEnso\Tables\app\Services\Table;
use LaravelEnso\Currencies\app\Models\ExchangeRate;

class ExchangeRateTable extends Table
{
    protected $templatePath = __DIR__.'/../Templates/exchangeRates.json';

    public function query()
    {
        return ExchangeRate::selectRaw('
            exchange_rates.id as "dtRowId",
            fromCurrencies.name as "from",
            toCurrencies.name as "to",
            exchange_rates.conversion,
            exchange_rates.date
        ')->join('currencies as fromCurrencies', 'fromCurrencies.id', '=', 'exchange_rates.from_id')
        ->join('currencies as toCurrencies', 'toCurrencies.id', '=', 'exchange_rates.to_id');
    }
}
