<?php

namespace App\Model;

use App\Model\Measurement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Measurement extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['measurement', 'unit', 'abbreviation'];

    public function inputs()
    {
        return $this->hasMany('App\Model\Input');
    }
}
