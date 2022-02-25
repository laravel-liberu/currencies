<?php

namespace LaravelEnso\Currencies\Http\Controllers\Currencies;

use Illuminate\Routing\Controller;
use LaravelEnso\Currencies\Tables\Builders\Currency;
use LaravelEnso\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected $tableClass = Currency::class;
}
