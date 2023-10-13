<?php

namespace LaravelLiberu\Currencies\Http\Controllers\ExchangeRates;

use Illuminate\Routing\Controller;
use LaravelLiberu\Currencies\Tables\Builders\ExchangeRate;
use LaravelLiberu\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected $tableClass = ExchangeRate::class;
}
