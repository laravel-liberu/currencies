<?php

namespace LaravelLiberu\Currencies\Http\Controllers\Currencies;

use Illuminate\Routing\Controller;
use LaravelLiberu\Currencies\Http\Requests\ValidateCurrency;
use LaravelLiberu\Currencies\Models\Currency;

class Store extends Controller
{
    public function __invoke(ValidateCurrency $request, Currency $currency)
    {
        $currency->fill($request->validated())->save();

        return [
            'message' => __('The currency was successfully created'),
            'redirect' => 'administration.currencies.edit',
            'param' => ['currency' => $currency->id],
        ];
    }
}
