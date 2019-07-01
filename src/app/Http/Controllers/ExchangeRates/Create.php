<?php

namespace LaravelEnso\Currencies\app\Http\Controllers\ExchangeRates;

use Illuminate\Routing\Controller;
use LaravelEnso\Currencies\app\Forms\Builders\ExchangeRateForm;

class Create extends Controller
{
    public function __invoke(ExchangeRateForm $form)
    {
        return ['form' => $form->create()];
    }
}
