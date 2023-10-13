<?php

namespace LaravelLiberu\Currencies\Http\Controllers\ExchangeRates;

use Illuminate\Routing\Controller;
use LaravelLiberu\Currencies\Http\Requests\ValidateExchangeRate;
use LaravelLiberu\Currencies\Models\ExchangeRate;

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
