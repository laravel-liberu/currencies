<?php

namespace LaravelEnso\Currencies\App\Http\Controllers\Currencies;

use Illuminate\Routing\Controller;
use LaravelEnso\Currencies\App\Http\Requests\ValidateCurrencyRequest;
use LaravelEnso\Currencies\App\Models\Currency;

class Update extends Controller
{
    public function __invoke(ValidateCurrencyRequest $request, Currency $currency)
    {
        $currency->update($request->validated());

        if ($currency->is_default && $currency->wasChanged('is_default')) {
            Currency::where('id', '<>', $currency->id)
                ->update(['is_default' => false]);
        }

        return ['message' => __('The currency was successfully updated')];
    }
}
