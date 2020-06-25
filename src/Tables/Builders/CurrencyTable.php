<?php

namespace LaravelEnso\Currencies\Tables\Builders;

use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Currencies\Models\Currency;
use LaravelEnso\Tables\Contracts\Table;

class CurrencyTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/currencies.json';

    public function query(): Builder
    {
        return Currency::selectRaw('
            currencies.id, currencies.code, currencies.name,
            currencies.symbol, currencies.is_default
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
