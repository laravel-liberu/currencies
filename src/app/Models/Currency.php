<?php

namespace LaravelEnso\Currencies\app\Models;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Tables\app\Traits\TableCache;
use LaravelEnso\Helpers\app\Traits\AvoidsDeletionConflicts;

class Currency extends Model
{
    use AvoidsDeletionConflicts, TableCache;

    protected $fillable = ['short_name', 'name', 'symbol', 'is_default'];

    protected $casts = ['is_default' => 'boolean'];

    public function scopeDefault($query)
    {
        return $query->whereIsDefault(true);
    }

    public function scopeForeign($query)
    {
        return $query->whereIsDefault(false);
    }
}
