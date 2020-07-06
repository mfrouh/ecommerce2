<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class offer extends Model
{
    use SoftDeletes;
    protected $appends=[];

    protected $fillable=['product_id','type','value','start_offer','end_offer'];

    public function product()
    {
        return $this->belongsTo('App\product')->withTrashed();
    }

}
