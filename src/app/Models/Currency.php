<?php

namespace LaravelEnso\Currencies\app\Models;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

class Currency extends Model
{
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

    public function delete()
    {
        try {
            parent::delete();
        } catch (\Exception $e) {
            throw new ConflictHttpException(__(
                'The currency is being used in the system and cannot be deleted'
            ));
        }
    }
}
