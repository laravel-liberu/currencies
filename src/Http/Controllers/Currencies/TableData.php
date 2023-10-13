<?php

namespace LaravelLiberu\Currencies\Http\Controllers\Currencies;

use Illuminate\Routing\Controller;
use LaravelLiberu\Currencies\Tables\Builders\Currency;
use LaravelLiberu\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected $tableClass = Currency::class;
}
