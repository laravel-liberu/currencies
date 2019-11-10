<?php

namespace LaravelEnso\Currencies\app\Http\Controllers\Currencies;

use Illuminate\Routing\Controller;
use LaravelEnso\Currencies\app\Http\Resources\Currency as Resource;
use LaravelEnso\Currencies\app\Models\Currency;
use LaravelEnso\Select\app\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected $model = Currency::class;

    protected $resource = Resource::class;

    protected $queryAttributes = ['name', 'short_name'];
}
