<?php

namespace App\Model;

use App\Model\Sensor;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sensor extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['sensor', 'min', 'max', 'site_id', 'input_id', 'location_id'];

    public function site()
    {
        return $this->belongsTo('App\Model\Site');
    }

    public function input()
    {
        return $this->belongsTo('App\Model\Input');
    }

    public function location()
    {
        return $this->belongsTo('App\Model\Location');
    }

    public function recordings()
    {
        return $this->hasMany('App\Model\Recording');
    }
}
