<?php

namespace LaravelEnso\Currencies\Http\Controllers\ExchangeRates;

use Illuminate\Routing\Controller;
use LaravelEnso\Currencies\Http\Requests\ValidateExchangeRate;
use LaravelEnso\Currencies\Models\ExchangeRate;

class Update extends Controller
{
    public function __invoke(ValidateExchangeRate $request, ExchangeRate $exchangeRate)
    {
        $exchangeRate->update($request->validated());

        return ['message' => __('The exchange rate was successfully updated')];
    }
}
