<?php

namespace App\Model;

use App\Model\Location;
use App\Model\Site;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['location', 'site_id'];

    public function sensors()
    {
        return $this->hasMany('App\Model\Sensor');
    }
}
