<?php

namespace LaravelEnso\Currencies\Http\Controllers\ExchangeRates;

use Illuminate\Routing\Controller;
use LaravelEnso\Currencies\Forms\Builders\ExchangeRate;

class Create extends Controller
{
    public function __invoke(ExchangeRate $form)
    {
        return ['form' => $form->create()];
    }
}
