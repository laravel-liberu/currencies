<?php

namespace LaravelLiberu\Currencies\Tables\Builders;

use Illuminate\Database\Eloquent\Builder;
use LaravelLiberu\Currencies\Models\Currency as Model;
use LaravelLiberu\Tables\Contracts\Table;

class Currency implements Table
{
    private const TemplatePath = __DIR__.'/../Templates/currencies.json';

    public function query(): Builder
    {
        return Model::selectRaw('
            currencies.id, currencies.code, currencies.name,
            currencies.symbol, currencies.is_default
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}
