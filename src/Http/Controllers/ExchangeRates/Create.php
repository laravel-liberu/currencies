<?php

namespace LaravelEnso\Currencies\Http\Controllers\ExchangeRates;

use Illuminate\Routing\Controller;
use LaravelEnso\Currencies\Forms\Builders\ExchangeRateForm;

class Create extends Controller
{
    public function __invoke(ExchangeRateForm $form)
    {
        return ['form' => $form->create()];
    }
}
