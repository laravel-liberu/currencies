<?php

namespace LaravelLiberu\Currencies\Http\Controllers\ExchangeRates;

use Illuminate\Routing\Controller;
use LaravelLiberu\Currencies\Http\Requests\ValidateExchangeRate;
use LaravelLiberu\Currencies\Models\ExchangeRate;

class Update extends Controller
{
    public function __invoke(ValidateExchangeRate $request, ExchangeRate $exchangeRate)
    {
        $exchangeRate->update($request->validated());

        return ['message' => __('The exchange rate was successfully updated')];
    }
}
