<?php

namespace LaravelEnso\Currencies\app\Models;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Helpers\app\Traits\AvoidsDeletionConflicts;
use LaravelEnso\Helpers\app\Traits\DateAttributes;
use LaravelEnso\Tables\app\Traits\TableCache;

class ExchangeRate extends Model
{
    use AvoidsDeletionConflicts, DateAttributes, TableCache;

    protected $fillable = ['from_id', 'to_id', 'conversion', 'date'];

    protected $dates = ['date'];

    protected $casts = ['date' => 'date:d-m-Y'];

    public function from()
    {
        return $this->belongsTo(Currency::class, 'from_id');
    }

    public function to()
    {
        return $this->belongsTo(Currency::class, 'to_id');
    }

    public function setDateAttribute($value)
    {
        $this->fillDateAttribute('date', $value);
    }
}
