<?php

namespace LaravelEnso\Currencies\App\Http\Controllers\ExchangeRates;

use Illuminate\Routing\Controller;
use LaravelEnso\Currencies\App\Tables\Builders\ExchangeRateTable;
use LaravelEnso\Tables\App\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected $tableClass = ExchangeRateTable::class;
}
