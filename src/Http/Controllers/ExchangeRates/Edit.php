<?php

namespace LaravelEnso\Currencies\Http\Controllers\ExchangeRates;

use Illuminate\Routing\Controller;
use LaravelEnso\Currencies\Forms\Builders\ExchangeRate;
use LaravelEnso\Currencies\Models\ExchangeRate as Model;

class Edit extends Controller
{
    public function __invoke(Model $exchangeRate, ExchangeRate $form)
    {
        return ['form' => $form->edit($exchangeRate)];
    }
}
