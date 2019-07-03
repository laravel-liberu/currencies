<?php

namespace LaravelEnso\Currencies\app\Models;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Helpers\app\Traits\AvoidsDeletionConflicts;

class Currency extends Model
{
    use AvoidsDeletionConflicts;

    protected $fillable = ['name', 'symbol', 'is_default'];

    protected $casts = ['is_default' => 'boolean'];

    public function fromExchanges()
    {
        return $this->hasMany(ExchangeRate::class, 'from_id');
    }

    public function toExchanges()
    {
        return $this->hasMany(ExchangeRate::class, 'to_id');
    }

    public function scopeDefault($query)
    {
        return $query->whereIsDefault(true);
    }
}
