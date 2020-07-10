<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    use SoftDeletes;

    protected $fillable=['category_id','name','price','description','slug','active','offer'];

    protected $appends=['tags','rates','reviews','categorys','myimages','oneimage'];

    public function getCategorysAttribute()
    {
        return $this->belongsTo('App\category');
    }
    public function image()
    {
        return $this->morphOne('App\image', 'imageable');
    }
    public function gallery()
    {
        return $this->morphMany('App\image', 'imageable');
    }
    public function valueable()
    {
        return $this->hasMany('App\valueable');
    }
    public function variants()
    {
        return $this->hasMany('App\variant');
    }
    public function attributes()
    {
        return $this->belongsToMany('App\attribute', 'valueables','product_id','attribute_id' ); // works
    }
    public function category()
    {
        return $this->belongsTo('App\category')->withTrashed();
    }
    public function getReviewsAttribute()
    {
        return $this->hasMany('App\review');
    }
    public function getRatesAttribute()
    {
        return $this->hasMany('App\rate');
    }
    public function tags()
    {
        return $this->morphToMany('App\tag', 'taggable');
    }

}
