<?php

namespace LaravelEnso\Currencies\app\Http\Controllers\Currencies;

use Illuminate\Routing\Controller;
use LaravelEnso\Currencies\app\Models\Currency;
use LaravelEnso\Currencies\app\Forms\Builders\CurrencyForm;

class Edit extends Controller
{
    public function __invoke(Currency $currency, CurrencyForm $form)
    {
        return ['form' => $form->edit($currency)];
    }
}
