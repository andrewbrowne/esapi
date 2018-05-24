<?php

namespace App\Model;

use App\Model\Site;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Site extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['site'];

    public function client()
    {
        return $this->belongsTo('App\Model\Client');
    }

    public function sensors()
    {
        return $this->hasMany('App\Model\Sensor');
    }
}
