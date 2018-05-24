<?php

namespace App\Model;

use App\Model\Input;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Input extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['input', 'measurement_id'];

    public function sensors()
    {
        return $this->hasMany('App\Model\Sensor');
    }

    public function measurement()
    {
        return $this->belongsTo('App\Model\Measurement');
    }
}
