<?php

namespace LaravelEnso\Currencies\App\Http\Controllers\ExchangeRates;

use Illuminate\Routing\Controller;
use LaravelEnso\Currencies\App\Forms\Builders\ExchangeRateForm;

class Create extends Controller
{
    public function __invoke(ExchangeRateForm $form)
    {
        return ['form' => $form->create()];
    }
}
