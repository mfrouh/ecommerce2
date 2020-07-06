<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class review extends Model
{
    use SoftDeletes;
    protected $appends=[];

    protected $fillable=[];

    public function product()
    {
        return $this->belongsTo('App\product');
    }
}
