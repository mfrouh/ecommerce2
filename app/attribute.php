<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class attribute extends Model
{
    use SoftDeletes;
    protected $appends=[];

    protected $fillable=['name'];
    
    public function valueable()
    {
        return $this->hasMany('App\valueable');
    }


}
