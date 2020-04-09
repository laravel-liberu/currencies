<?php

namespace LaravelEnso\Currencies\App\Http\Controllers\Currencies;

use Illuminate\Routing\Controller;
use LaravelEnso\Currencies\App\Tables\Builders\CurrencyTable;
use LaravelEnso\Tables\App\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected $tableClass = CurrencyTable::class;
}
