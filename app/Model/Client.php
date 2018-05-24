<?php

namespace App\Model;

use App\Model\Input;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['client'];

    public function sites()
    {
        return $this->hasMany('App\Model\Site');
    }
}
