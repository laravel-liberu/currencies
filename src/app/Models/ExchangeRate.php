<?php

namespace LaravelEnso\Currencies\app\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Helpers\app\Traits\AvoidsDeletionConflicts;

class ExchangeRate extends Model
{
    use AvoidsDeletionConflicts;

    protected $fillable = ['from_id', 'to_id', 'conversion', 'date'];

    protected $dates = ['date'];

    protected $casts = ['date' => 'date:d-m-Y'];

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = isset($value)
            ? Carbon::parse($value)
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
