<?php

namespace LaravelEnso\Currencies\app\Http\Controllers\ExchangeRates;

use Illuminate\Routing\Controller;
use LaravelEnso\Select\app\Traits\OptionsBuilder;
use LaravelEnso\Currencies\app\Models\ExchangeRate;

class Options extends Controller
{
    use OptionsBuilder;

    protected $queryAttributes = ['from_id', 'to_id'];

    protected $model = ExchangeRate::class;
}
