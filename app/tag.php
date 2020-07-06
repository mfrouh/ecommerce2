<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tag extends Model
{
    use SoftDeletes;
    protected $appends=[];

    protected $fillable=[];

    public function products()
    {
        return $this->morphedByMany('App\product', 'taggable');
    }
}
