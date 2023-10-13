<?php

namespace LaravelLiberu\Currencies\Http\Controllers\Currencies;

use Illuminate\Routing\Controller;
use LaravelLiberu\Currencies\Forms\Builders\Currency;

class Create extends Controller
{
    public function __invoke(Currency $form)
    {
        return ['form' => $form->create()];
    }
}
