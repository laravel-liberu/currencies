<?php

namespace LaravelEnso\Currencies\app\Http\Controllers\Currencies;

use Illuminate\Routing\Controller;
use LaravelEnso\Currencies\app\Models\Currency;
use LaravelEnso\Currencies\app\Http\Requests\Currencies\ValidateCurrencyUpdate;

class Update extends Controller
{
    public function __invoke(ValidateCurrencyUpdate $request, Currency $currency)
    {
        $currency->update($request->validated());

        return ['message' => __('The currency was successfully updated')];
    }
}
