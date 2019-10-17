<?php

namespace LaravelEnso\Currencies\app\Tables\Builders;

use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\app\Contracts\Table;
use LaravelEnso\Currencies\app\Models\Currency;

class CurrencyTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/currencies.json';

    public function query() : Builder
    {
        return Currency::selectRaw('id,name,symbol,is_default');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
