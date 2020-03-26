<?php

namespace LaravelEnso\Currencies\App\Models;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Helpers\App\Traits\AvoidsDeletionConflicts;
use LaravelEnso\Tables\App\Traits\TableCache;

class ExchangeRate extends Model
{
    use AvoidsDeletionConflicts, TableCache;

    protected $fillable = ['from_id', 'to_id', 'conversion', 'date'];

    protected $dates = ['date'];

    public function from()
    {
        return $this->belongsTo(Currency::class, 'from_id');
    }

    public function to()
    {
        return $this->belongsTo(Currency::class, 'to_id');
    }
}
