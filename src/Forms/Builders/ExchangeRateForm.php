<?php

namespace LaravelEnso\Currencies\Forms\Builders;

use LaravelEnso\Currencies\Models\ExchangeRate;
use LaravelEnso\Forms\Services\Form;

class ExchangeRateForm
{
    private const TemplatePath = __DIR__.'/../Templates/exchangeRate.json';

    private Form $form;

    public function __construct()
    {
        $this->form = new Form(self::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(ExchangeRate $rate)
    {
        return $this->form->edit($rate);
    }
}
