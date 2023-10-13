<?php

namespace LaravelLiberu\Currencies\Http\Controllers\Currencies;

use Illuminate\Routing\Controller;
use LaravelLiberu\Currencies\Http\Resources\Currency as Resource;
use LaravelLiberu\Currencies\Models\Currency;
use LaravelLiberu\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected $model = Currency::class;

    protected $resource = Resource::class;

    protected $queryAttributes = ['name', 'code'];
}
