<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = "tbl_order_details";
    protected $primaryKey = "order_details_id";

    
    public function product(){
        return $this->hasOne('App\Product', 'product_id', 'product_id');
    }
    public function size(){
        return $this->hasOne('App\Size', 'size_id', 'size_id');
    }
}
