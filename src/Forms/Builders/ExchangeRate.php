<?php

namespace LaravelLiberu\Currencies\Forms\Builders;

use LaravelLiberu\Currencies\Models\ExchangeRate as Model;
use LaravelLiberu\Forms\Services\Form;

class ExchangeRate
{
    private const TemplatePath = __DIR__.'/../Templates/exchangeRate.json';

    private Form $form;

    public function __construct()
    {
        $this->form = new Form($this->templatePath());
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Model $rate)
    {
        return $this->form->edit($rate);
    }

    protected function templatePath(): string
    {
        return self::TemplatePath;
    }
}
