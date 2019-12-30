<?php

namespace LaravelEnso\Currencies\App\Http\Controllers\Currencies;

use Illuminate\Routing\Controller;
use LaravelEnso\Currencies\App\Forms\Builders\CurrencyForm;
use LaravelEnso\Currencies\App\Models\Currency;

class Edit extends Controller
{
    public function __invoke(Currency $currency, CurrencyForm $form)
    {
        return ['form' => $form->edit($currency)];
    }
}
