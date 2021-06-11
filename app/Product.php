<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "tbl_product";
    protected $primaryKey = "product_id";

    public function sizes(){
    	 return $this->belongsToMany('App\Size', 'tbl_size_product', 'product_id', 'size_id')->withPivot('quantity');;
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }
    public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    }
    public function brand()
    {
        return $this->belongsTo('App\Brand','brand_id');
    }
}
