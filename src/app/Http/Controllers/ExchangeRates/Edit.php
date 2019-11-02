<?php

namespace LaravelEnso\Currencies\app\Http\Controllers\ExchangeRates;

use Illuminate\Routing\Controller;
use LaravelEnso\Currencies\app\Forms\Builders\ExchangeRateForm;
use LaravelEnso\Currencies\app\Models\ExchangeRate;

class Edit extends Controller
{
    public function __invoke(ExchangeRate $exchangeRate, ExchangeRateForm $form)
    {
        return ['form' => $form->edit($exchangeRate)];
    }
}
