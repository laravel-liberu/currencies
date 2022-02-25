<?php

namespace LaravelEnso\Currencies\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidateCurrency extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'code' => [
                'string', 'required', 'exists:countries,currency_code',
                $this->unique('code'),
            ],
            'name' => 'string|max:255|required|'.$this->unique('name'),
            'symbol' => 'string|required',
            'is_default' => 'boolean',
        ];
    }

    protected function unique($attribute)
    {
        return Rule::unique('currencies', $attribute)
            ->ignore($this->route('currency'));
    }
}
