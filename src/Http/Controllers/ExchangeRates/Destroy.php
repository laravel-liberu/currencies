<?php

namespace LaravelLiberu\Currencies\Http\Controllers\ExchangeRates;

use Illuminate\Routing\Controller;
use LaravelLiberu\Currencies\Models\ExchangeRate;

class Destroy extends Controller
{
    public function __invoke(ExchangeRate $exchangeRate)
    {
        $exchangeRate->delete();

        return [
            'message' => __('The rate was successfully deleted'),
            'redirect' => 'administration.exchangeRates.index',
        ];
    }
}
