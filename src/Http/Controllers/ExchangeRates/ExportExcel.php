<?php

namespace LaravelEnso\Currencies\Http\Controllers\ExchangeRates;

use Illuminate\Routing\Controller;
use LaravelEnso\Currencies\Tables\Builders\ExchangeRate;
use LaravelEnso\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected $tableClass = ExchangeRate::class;
}
