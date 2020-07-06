<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class order_details extends Model
{
    use SoftDeletes;
    protected $appends=[];

    protected $fillable=['order_id'];

    public function order()
    {
        return $this->belongsTo('App\order');
    }
}
