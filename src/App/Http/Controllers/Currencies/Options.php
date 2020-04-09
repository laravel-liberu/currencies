<?php

namespace LaravelEnso\Currencies\App\Http\Controllers\Currencies;

use Illuminate\Routing\Controller;
use LaravelEnso\Currencies\App\Http\Resources\Currency as Resource;
use LaravelEnso\Currencies\App\Models\Currency;
use LaravelEnso\Select\App\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected $model = Currency::class;

    protected $resource = Resource::class;

    protected $queryAttributes = ['name', 'code'];
}
