<?php

namespace LaravelEnso\Currencies\App\Http\Controllers\ExchangeRates;

use Illuminate\Routing\Controller;
use LaravelEnso\Currencies\App\Tables\Builders\ExchangeRateTable;
use LaravelEnso\Tables\App\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected $tableClass = ExchangeRateTable::class;
}
