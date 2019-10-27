<?php

namespace LaravelEnso\Currencies\app\Http\Requests\ExchangeRates;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use LaravelEnso\Currencies\app\Models\Currency;
use LaravelEnso\Currencies\app\Models\ExchangeRate;

class ValidateExchangeRateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'from_id' => 'integer|required|exists:currencies,id|different:to_id',
            'to_id' => 'integer|required|exists:currencies,id',
            'conversion' => 'numeric|required',
            'date' => 'date|required',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->filled('date') && $this->exchangeRate()->first()) {
                $validator->errors()->add(
                    'date', __('This exchange rate is already defined for the specified date!')
                );
            }

            if ($this->missingDefault()) {
                collect(['from_id', 'to_id'])->each(function ($field) use ($validator) {
                    $validator->errors()->add(
                        $field, __('The exchange rate must use your default currency!')
                    );
                });
            }
        });
    }

    protected function exchangeRate()
    {
        $date = Carbon::createFromFormat(
            config('enso.config.dateFormat'), $this->get('date')
        );

        return ExchangeRate::whereToId($this->get('to_id'))
            ->whereFromId($this->get('from_id'))
            ->where('date', $date)
            ->where('id', '<>', optional($this->route('exchangeRate'))->id);
    }

    protected function missingDefault()
    {
        return collect([$this->get('to_id'), $this->get('from_id')])
            ->contains(Currency::default()->first()->id);
    }
}
