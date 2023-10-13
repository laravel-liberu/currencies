<?php

namespace LaravelLiberu\Currencies\Http\Controllers\ExchangeRates;

use Illuminate\Routing\Controller;
use LaravelLiberu\Currencies\Tables\Builders\ExchangeRate;
use LaravelLiberu\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected $tableClass = ExchangeRate::class;
}
