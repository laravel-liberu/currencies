<?php

namespace LaravelEnso\Currencies\app\Forms\Builders;

use LaravelEnso\Forms\app\Services\Form;
use LaravelEnso\Currencies\app\Models\ExchangeRate;

class ExchangeRateForm
{
    private const TemplatePath = __DIR__.'/../Templates/exchangeRate.json';

    private $form;

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
