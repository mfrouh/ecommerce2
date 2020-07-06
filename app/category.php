<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class category extends Model
{
    use SoftDeletes;
    protected $appends=[];

    protected $fillable=['name','active','image'];

    public function products()
    {
        return $this->hasMany('App\product')->withTrashed();
    }
}
