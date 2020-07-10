<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class value extends Model
{
    use SoftDeletes;
    public function valueable()
    {
        return $this->hasMany('App\valueable');
    }
    public function attributes()
    {
        return $this->belongsToMany('App\attribute');
    }
}
