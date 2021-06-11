<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
     protected $table = "tbl_size";
    protected $primaryKey = "size_id";
    public function products(){
    	 return $this->belongsToMany('App\Product','tbl_size_product','size_id','product_id')->withPivot('quantity','id');
    }
}
