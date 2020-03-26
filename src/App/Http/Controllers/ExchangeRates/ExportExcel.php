<?php

namespace LaravelEnso\Currencies\App\Http\Controllers\ExchangeRates;

use Illuminate\Routing\Controller;
use LaravelEnso\Currencies\App\Tables\Builders\ExchangeRateTable;
use LaravelEnso\Tables\App\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected $tableClass = ExchangeRateTable::class;
}
