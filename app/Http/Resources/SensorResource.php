<?php

namespace App\Http\Resources;

use App\Model\Sensor;
use App\Model\Input;
use App\Model\Location;
use Illuminate\Http\Resources\Json\JsonResource;

class InputResource extends JsonResource
{
    /**
     * Transform the Sensor into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'sensor' => $this->unit,
            'min' => $this->min,
            'max' => $this->max,
            'site_id' => $this->site_id,
            'input_id' => $this->input_id,
            'location_id' => $this->location_id
        ];
    }
}