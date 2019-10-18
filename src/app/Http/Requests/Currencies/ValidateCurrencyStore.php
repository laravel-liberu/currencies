<?php

namespace LaravelEnso\Currencies\app\Http\Requests\Currencies;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ValidateCurrencyStore extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'string|max:255|required|'.$this->uniqueName(),
            'symbol' => 'string|required',
            'is_default' => 'boolean',
        ];
    }

    protected function uniqueName()
    {
        return Rule::unique('currencies', 'name');
    }
}
