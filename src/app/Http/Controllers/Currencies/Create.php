<?php

namespace LaravelEnso\Currencies\app\Http\Controllers\Currencies;

use Illuminate\Routing\Controller;
use LaravelEnso\Currencies\app\Forms\Builders\CurrencyForm;

class Create extends Controller
{
    public function __invoke(CurrencyForm $form)
    {
        return ['form' => $form->create()];
    }
}
