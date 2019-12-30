<?php

namespace LaravelEnso\Currencies\App\Http\Controllers\Currencies;

use Illuminate\Routing\Controller;
use LaravelEnso\Currencies\App\Http\Requests\Currencies\ValidateCurrencyRequest;
use LaravelEnso\Currencies\App\Models\Currency;

class Update extends Controller
{
    public function __invoke(ValidateCurrencyRequest $request, Currency $currency)
    {
        $currency->update($request->validated());

        return ['message' => __('The currency was successfully updated')];
    }
}
