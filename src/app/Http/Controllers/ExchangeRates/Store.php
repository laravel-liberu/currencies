<?php

namespace LaravelEnso\Currencies\app\Http\Controllers\ExchangeRates;

use Illuminate\Routing\Controller;
use LaravelEnso\Currencies\app\Models\ExchangeRate;
use LaravelEnso\Currencies\app\Http\Requests\ExchangeRates\ValidateExchangeRateStore;

class Store extends Controller
{
    public function __invoke(ValidateExchangeRateStore $request, ExchangeRate $exchangeRate)
    {
        $exchangeRate->fill($request->validated())->save();

        return [
            'message' => __('The Exchange Rate was successfully created'),
            'redirect' => 'administration.exchangeRates.edit',
            'param' => ['exchangeRate' => $exchangeRate->id],
        ];
    }
}
