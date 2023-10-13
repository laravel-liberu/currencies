<?php

namespace LaravelLiberu\Currencies\Http\Controllers\ExchangeRates;

use Illuminate\Routing\Controller;
use LaravelLiberu\Currencies\Forms\Builders\ExchangeRate;
use LaravelLiberu\Currencies\Models\ExchangeRate as Model;

class Edit extends Controller
{
    public function __invoke(Model $exchangeRate, ExchangeRate $form)
    {
        return ['form' => $form->edit($exchangeRate)];
    }
}
