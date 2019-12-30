<?php

namespace LaravelEnso\Currencies\App\Http\Controllers\ExchangeRates;

use Illuminate\Routing\Controller;
use LaravelEnso\Currencies\App\Forms\Builders\ExchangeRateForm;
use LaravelEnso\Currencies\App\Models\ExchangeRate;

class Edit extends Controller
{
    public function __invoke(ExchangeRate $exchangeRate, ExchangeRateForm $form)
    {
        return ['form' => $form->edit($exchangeRate)];
    }
}
