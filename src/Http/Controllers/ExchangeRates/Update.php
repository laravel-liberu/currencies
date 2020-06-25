<?php

namespace LaravelEnso\Currencies\Http\Controllers\ExchangeRates;

use Illuminate\Routing\Controller;
use LaravelEnso\Currencies\Http\Requests\ValidateExchangeRateRequest;
use LaravelEnso\Currencies\Models\ExchangeRate;

class Update extends Controller
{
    public function __invoke(ValidateExchangeRateRequest $request, ExchangeRate $exchangeRate)
    {
        $exchangeRate->update($request->validated());

        return ['message' => __('The exchange rate was successfully updated')];
    }
}
