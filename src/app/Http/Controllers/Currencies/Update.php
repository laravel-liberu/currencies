<?php

namespace LaravelEnso\Currencies\app\Http\Controllers\Currencies;

use Illuminate\Routing\Controller;
use LaravelEnso\Currencies\app\Http\Requests\Currencies\ValidateCurrencyRequest;
use LaravelEnso\Currencies\app\Models\Currency;

class Update extends Controller
{
    public function __invoke(ValidateCurrencyRequest $request, Currency $currency)
    {
        $currency->update($request->validated());

        return ['message' => __('The currency was successfully updated')];
    }
}
