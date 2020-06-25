<?php

namespace LaravelEnso\Currencies\Forms\Builders;

use LaravelEnso\Currencies\Models\Currency;
use LaravelEnso\Forms\Services\Form;

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
