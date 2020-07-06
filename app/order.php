<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class order extends Model
{
    use SoftDeletes;
    protected $appends=[];

    protected $fillable=[];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
