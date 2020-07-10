<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class variant extends Model
{
    protected $appends=[];

    protected $fillable=['name'];

    public function product()
    {
        return $this->belongsTo('App\product');
    }

    public function gallery()
    {
        return $this->morphMany('App\image', 'imageable');
    }
    
    public function valueables()
    {
        return $this->belongsToMany('App\valueable', 'variant_valueable','variant_id','valueable_id');
    }
}
