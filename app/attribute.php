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
    public function products()
    {
        return $this->belongsToMany('App\product');
    }
    public function values()
    {
        return $this->belongsToMany('App\value', 'valueables','attribute_id','value_id' ); // works
    }


}
