<?php

namespace LaravelEnso\Currencies\Http\Controllers\Currencies;

use Illuminate\Routing\Controller;
use LaravelEnso\Currencies\Http\Resources\Currency as Resource;
use LaravelEnso\Currencies\Models\Currency;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected $model = Currency::class;

    protected $resource = Resource::class;

    protected $queryAttributes = ['name', 'code'];
}
