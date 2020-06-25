<?php

namespace LaravelEnso\Currencies\Http\Controllers\Currencies;

use Illuminate\Routing\Controller;
use LaravelEnso\Currencies\Forms\Builders\CurrencyForm;
use LaravelEnso\Currencies\Models\Currency;

class Edit extends Controller
{
    public function __invoke(Currency $currency, CurrencyForm $form)
    {
        return ['form' => $form->edit($currency)];
    }
}
