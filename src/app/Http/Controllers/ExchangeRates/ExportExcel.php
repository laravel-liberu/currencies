<?php

namespace LaravelEnso\Currencies\app\Http\Controllers\ExchangeRates;

use Illuminate\Routing\Controller;
use LaravelEnso\Tables\app\Traits\Excel;
use LaravelEnso\Currencies\app\Tables\Builders\ExchangeRateTable;

class ExportExcel extends Controller
{
    use Excel;

    protected $tableClass = ExchangeRateTable::class;
}
