<?php

namespace  LaravelEnso\Currencies\app\Http\Controllers\Currencies;

use Illuminate\Routing\Controller;
use LaravelEnso\Tables\app\Traits\Excel;
use LaravelEnso\Currencies\app\Tables\Builders\CurrencyTable;

class ExportExcel extends Controller
{
    use Excel;

    protected $tableClass = CurrencyTable::class;
}
