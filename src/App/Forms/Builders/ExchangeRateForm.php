<?php

namespace LaravelEnso\Currencies\App\Forms\Builders;

use LaravelEnso\Currencies\App\Models\ExchangeRate;
use LaravelEnso\Forms\App\Services\Form;

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
