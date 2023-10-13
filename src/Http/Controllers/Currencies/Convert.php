<?php

namespace LaravelLiberu\Currencies\Http\Controllers\Currencies;

use Carbon\Carbon;
use Illuminate\Routing\Controller;
use LaravelLiberu\Currencies\Http\Requests\ValidateConversion;
use LaravelLiberu\Currencies\Models\Currency;
use LaravelLiberu\Currencies\Services\Conversion;

class Convert extends Controller
{
    public function __invoke(ValidateConversion $request)
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
