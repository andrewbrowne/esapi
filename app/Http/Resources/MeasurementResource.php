<?php

namespace App\Http\Resources;

use App\Model\Unit;
use Illuminate\Http\Resources\Json\JsonResource;

class MeasurementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'measurement' => $this->measurement,
            'unit' => $this->unit,
            'abbreviation' => $this->abbreviation,
        ];
    }
}
