<?php

namespace LaravelEnso\Currencies\Http\Controllers\ExchangeRates;

use Illuminate\Routing\Controller;
use LaravelEnso\Currencies\Forms\Builders\ExchangeRateForm;
use LaravelEnso\Currencies\Models\ExchangeRate;

class Edit extends Controller
{
    public function __invoke(ExchangeRate $exchangeRate, ExchangeRateForm $form)
    {
        return ['form' => $form->edit($exchangeRate)];
    }
}
