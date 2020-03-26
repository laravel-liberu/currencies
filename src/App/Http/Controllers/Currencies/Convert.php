<?php

namespace LaravelEnso\Currencies\App\Http\Controllers\Currencies;

use Carbon\Carbon;
use Illuminate\Routing\Controller;
use LaravelEnso\Currencies\App\Http\Requests\ValidateConversionRequest;
use LaravelEnso\Currencies\App\Models\Currency;
use LaravelEnso\Currencies\App\Services\Conversion;

class Convert extends Controller
{
    public function __invoke(ValidateConversionRequest $request)
    {
        $date = $request->filled('date')
            ? Carbon::parse($request->get('date'))
            : Carbon::today();

        return (new Conversion())
            ->from(Currency::find($request->get('from')))
            ->to(Currency::find($request->get('to')))
            ->amount($request->get('amount'))
            ->date($date)
            ->handle();
    }
}
