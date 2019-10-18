<?php

namespace LaravelEnso\Currencies\app\Http\Controllers\ExchangeRates;

use Illuminate\Routing\Controller;
use LaravelEnso\Currencies\app\Models\ExchangeRate;
use LaravelEnso\Currencies\app\Http\Requests\ExchangeRates\ValidateExchangeRateRequest;

class Update extends Controller
{
    public function __invoke(ValidateExchangeRateRequest $request, ExchangeRate $exchangeRate)
    {
        $exchangeRate->update($request->validated());

        return ['message' => __('The exchange rate was successfully updated')];
    }
}
