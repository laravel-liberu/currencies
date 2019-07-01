<?php

namespace LaravelEnso\Currencies\app\Http\Controllers\Currencies;

use Illuminate\Routing\Controller;
use LaravelEnso\Tables\app\Traits\Init;
use LaravelEnso\Currencies\app\Tables\Builders\CurrencyTable;

class InitTable extends Controller
{
    use Init;

    protected $tableClass = CurrencyTable::class;
}
