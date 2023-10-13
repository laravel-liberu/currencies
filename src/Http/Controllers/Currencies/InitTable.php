<?php

namespace LaravelLiberu\Currencies\Http\Controllers\Currencies;

use Illuminate\Routing\Controller;
use LaravelLiberu\Currencies\Tables\Builders\Currency;
use LaravelLiberu\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected $tableClass = Currency::class;
}
