<?php

namespace LaravelEnso\Currencies\app\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ExchangeRate extends Model
{
    protected $fillable = ['from_id', 'to_id', 'conversion', 'date'];

    protected $dates = ['date'];

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value
            ? Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d')
            : null;
    }

    public function from()
    {
        return $this->belongsTo(Currency::class, 'from_id');
    }

    public function to()
    {
        return $this->belongsTo(Currency::class, 'to_id');
    }
}
