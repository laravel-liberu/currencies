<?php

namespace LaravelEnso\Currencies\app\Forms\Builders;

use LaravelEnso\Currencies\app\Models\Currency;
use LaravelEnso\Forms\app\Services\Form;

class CurrencyForm
{
    private const TemplatePath = __DIR__.'/../Templates/currency.json';

    private $form;

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
