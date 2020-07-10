<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rate extends Model
{
    protected $appends=[];

    protected $fillable=[];

    public function product()
    {
        return $this->belongsTo('App\product');
    }
}
