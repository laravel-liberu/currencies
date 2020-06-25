<?php

namespace LaravelEnso\Currencies\Http\Controllers\ExchangeRates;

use Illuminate\Routing\Controller;
use LaravelEnso\Currencies\Models\ExchangeRate;

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
