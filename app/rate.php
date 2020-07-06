<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class rate extends Model
{
    use SoftDeletes;
    protected $appends=[];

    protected $fillable=[];

    public function product()
    {
        return $this->belongsTo('App\product');
    }
}
