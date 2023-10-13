<?php

namespace LaravelLiberu\Currencies\Tables\Builders;

use Illuminate\Database\Eloquent\Builder;
use LaravelLiberu\Currencies\Models\ExchangeRate as Model;
use LaravelLiberu\Tables\Contracts\Table;

class ExchangeRate implements Table
{
    private const TemplatePath = __DIR__.'/../Templates/exchangeRates.json';

    public function query(): Builder
    {
        return Model::selectRaw('
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
