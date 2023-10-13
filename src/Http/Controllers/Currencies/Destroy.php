<?php

namespace LaravelLiberu\Currencies\Http\Controllers\Currencies;

use Illuminate\Routing\Controller;
use LaravelLiberu\Currencies\Models\Currency;

class Destroy extends Controller
{
    public function __invoke(Currency $currency)
    {
        $currency->delete();

        return [
            'message' => __('The currency was successfully deleted'),
            'redirect' => 'administration.currencies.index',
        ];
    }
}
