<?php

namespace LaravelLiberu\Currencies\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use LaravelLiberu\Helpers\Traits\AvoidsDeletionConflicts;
use LaravelLiberu\Tables\Traits\TableCache;

class ExchangeRate extends Model
{
    use AvoidsDeletionConflicts, HasFactory, TableCache;

    protected $guarded = ['id'];

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
