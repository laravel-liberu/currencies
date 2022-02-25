<?php

namespace LaravelEnso\Currencies\Http\Controllers\Currencies;

use Illuminate\Routing\Controller;
use LaravelEnso\Currencies\Forms\Builders\Currency;
use LaravelEnso\Currencies\Models\Currency as Model;

class Edit extends Controller
{
    public function __invoke(Model $currency, Currency $form)
    {
        return ['form' => $form->edit($currency)];
    }
}
