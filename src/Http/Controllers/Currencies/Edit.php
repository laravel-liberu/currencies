<?php

namespace LaravelLiberu\Currencies\Http\Controllers\Currencies;

use Illuminate\Routing\Controller;
use LaravelLiberu\Currencies\Forms\Builders\Currency;
use LaravelLiberu\Currencies\Models\Currency as Model;

class Edit extends Controller
{
    public function __invoke(Model $currency, Currency $form)
    {
        return ['form' => $form->edit($currency)];
    }
}
