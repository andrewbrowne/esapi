<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recording extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['sensor_id', 'value'];

    public function sensor()
    {
        return $this->belongsTo('App\Model\Sensor');
    }
}
