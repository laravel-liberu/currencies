<?php

namespace LaravelEnso\Currencies\Http\Controllers\Currencies;

use Illuminate\Routing\Controller;
use LaravelEnso\Currencies\Http\Requests\ValidateCurrencyRequest;
use LaravelEnso\Currencies\Models\Currency;

class Store extends Controller
{
    public function __invoke(ValidateCurrencyRequest $request, Currency $currency)
    {
        $currency->fill($request->validated())->save();

        return [
            'message' => __('The currency was successfully created'),
            'redirect' => 'administration.currencies.edit',
            'param' => ['currency' => $currency->id],
        ];
    }
}
