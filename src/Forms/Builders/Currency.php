<?php

namespace LaravelLiberu\Currencies\Forms\Builders;

use LaravelLiberu\Currencies\Models\Currency as Model;
use LaravelLiberu\Forms\Services\Form;

class Currency
{
    private const TemplatePath = __DIR__.'/../Templates/currency.json';

    private Form $form;

    public function __construct()
    {
        $this->form = new Form($this->templatePath());
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Model $currency)
    {
        return $this->form->edit($currency);
    }

    protected function templatePath(): string
    {
        return self::TemplatePath;
    }
}
