<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class valueable extends Model
{
    use SoftDeletes;
    
    public function product()
    {
        return $this->belongsTo('App\product');
    }
    public function value()
    {
        return $this->belongsTo('App\value');
    }
    public function attribute()
    {
        return $this->belongsTo('App\attribute');
    }
    public function variants()
    {
        return $this->belongsToMany('App\variant');
    }
}
