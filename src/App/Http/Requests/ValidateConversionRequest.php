<?php

namespace LaravelEnso\Currencies\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateConversionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'from' => 'required|numeric|exists:currencies,id',
            'to' => 'required|numeric|different:from|exists:currencies,id',
            'amount' => 'required|numeric|min:0.01',
            'date' => 'nullable|date',
        ];
    }
}
