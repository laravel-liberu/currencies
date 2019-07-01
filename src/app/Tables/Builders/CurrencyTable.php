<?php

namespace LaravelEnso\Currencies\app\Tables\Builders;

use LaravelEnso\Tables\app\Services\Table;
use LaravelEnso\Currencies\app\Models\Currency;

class CurrencyTable extends Table
{
    protected $templatePath = __DIR__.'/../Templates/currencies.json';

    public function query()
    {
        return Currency::selectRaw('
            currencies.id as "dtRowId",
            currencies.name,
            currencies.symbol,
            currencies.is_default
        ');
    }
}
