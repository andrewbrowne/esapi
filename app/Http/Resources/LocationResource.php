<?php

namespace App\Http\Resources;

use App\Model\Location;
use App\Model\Site;
use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
{
    /**
     * Transform the Location into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'location' => $this->location,
            'site_id' => $this->site_id,            
            'site' => Site::find($this->site_id)->site,
        ];
    }
}