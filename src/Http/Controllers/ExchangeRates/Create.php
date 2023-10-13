<?php

namespace LaravelLiberu\Currencies\Http\Controllers\ExchangeRates;

use Illuminate\Routing\Controller;
use LaravelLiberu\Currencies\Forms\Builders\ExchangeRate;

class Create extends Controller
{
    public function __invoke(ExchangeRate $form)
    {
        return ['form' => $form->create()];
    }
}
