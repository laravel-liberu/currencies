<?php

namespace LaravelEnso\Currencies\Http\Controllers\ExchangeRates;

use Illuminate\Routing\Controller;
use LaravelEnso\Currencies\Http\Requests\ValidateExchangeRate;
use LaravelEnso\Currencies\Models\ExchangeRate;

class Store extends Controller
{
    public function __invoke(ValidateExchangeRate $request, ExchangeRate $exchangeRate)
    {
        $exchangeRate->fill($request->validated())->save();

        return [
            'message' => __('The Exchange Rate was successfully created'),
            'redirect' => 'administration.exchangeRates.edit',
            'param' => ['exchangeRate' => $exchangeRate->id],
        ];
    }
}
