<?php

namespace LaravelEnso\Currencies\App\Forms\Builders;

use LaravelEnso\Currencies\App\Models\Currency;
use LaravelEnso\Forms\App\Services\Form;

class CurrencyForm
{
    private const TemplatePath = __DIR__.'/../Templates/currency.json';

    private Form $form;

    public function __construct()
    {
        $this->form = new Form(self::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Currency $currency)
    {
        return $this->form->edit($currency);
    }
}
