<?php

namespace LaravelEnso\Currencies\app\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Currency extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'symbol' => $this->symbol,
            'isDefault' => $this->is_default,
        ];
    }
}
