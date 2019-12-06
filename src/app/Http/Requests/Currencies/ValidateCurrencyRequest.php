<?php

namespace LaravelEnso\Currencies\app\Http\Requests\Currencies;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidateCurrencyRequest extends FormRequest
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
                $this->unique('code')
            ],
            'name' => 'string|max:255|required|'.$this->unique('name'),
            'symbol' => 'string|required',
            'is_default' => 'boolean',
        ];
    }

    protected function unique($attribute)
    {
        return Rule::unique('currencies', $attribute)
            ->ignore(optional($this->route('currency'))->id);
    }

    public function withValidator($validator)
    {
        \Log::info($this->code);
        \Log::info($validator->errors()->all());
    }
}
