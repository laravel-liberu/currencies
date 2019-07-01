<?php

namespace LaravelEnso\Currencies\app\Http\Controllers\Currencies;

use Illuminate\Routing\Controller;
use LaravelEnso\Tables\app\Traits\Data;
use LaravelEnso\Currencies\app\Tables\Builders\CurrencyTable;

class TableData extends Controller
{
    use Data;

    protected $tableClass = CurrencyTable::class;
}
