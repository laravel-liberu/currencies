<?php

namespace LaravelLiberu\Currencies\Http\Controllers\Currencies;

use Illuminate\Routing\Controller;
use LaravelLiberu\Currencies\Http\Requests\ValidateCurrency;
use LaravelLiberu\Currencies\Models\Currency;

class Update extends Controller
{
    public function __invoke(ValidateCurrency $request, Currency $currency)
    {
        $currency->update($request->validated());

        if ($currency->is_default && $currency->wasChanged('is_default')) {
            Currency::where('id', '<>', $currency->id)
                ->update(['is_default' => false]);
        }

        return ['message' => __('The currency was successfully updated')];
    }
}
