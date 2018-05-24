<?php

namespace App\Http\Resources;

use App\Model\Input;
use App\Model\Measurement;
use Illuminate\Http\Resources\Json\JsonResource;

class InputResource extends JsonResource
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
            'input' => $this->unit,
            'measurement_id' => $this->measurement_id,            
            'measurement' => Measurement::find($this->measurement_id)->measurement,
        ];
    }
}