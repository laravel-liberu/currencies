<?php

namespace LaravelEnso\Currencies\App\Http\Controllers\Currencies;

use Illuminate\Routing\Controller;
use LaravelEnso\Currencies\App\Forms\Builders\CurrencyForm;

class Create extends Controller
{
    public function __invoke(CurrencyForm $form)
    {
        return ['form' => $form->create()];
    }
}
