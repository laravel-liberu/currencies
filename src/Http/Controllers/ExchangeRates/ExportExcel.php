<?php

namespace LaravelLiberu\Currencies\Http\Controllers\ExchangeRates;

use Illuminate\Routing\Controller;
use LaravelLiberu\Currencies\Tables\Builders\ExchangeRate;
use LaravelLiberu\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected $tableClass = ExchangeRate::class;
}
