<?php

namespace LaravelEnso\Currencies\app\Http\Controllers\ExchangeRates;

use Illuminate\Routing\Controller;
use LaravelEnso\Tables\app\Traits\Init;
use LaravelEnso\Currencies\app\Tables\Builders\ExchangeRateTable;

class InitTable extends Controller
{
    use Init;

    protected $tableClass = ExchangeRateTable::class;
}
