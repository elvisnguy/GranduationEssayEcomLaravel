<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable =[
        "customer_id",'shipping_id','payment_id','order_total','order_status',' '
    ];

    protected $table = "tbl_order";
    protected $primaryKey = "order_id";

    public function details(){
    	 return $this->hasMany('App\OrderDetail', 'order_id');
    }
    public function customer(){
        return $this->hasOne('App\Customer', 'customer_id', 'customer_id');
    }
     public function shipping(){
        return $this->hasOne('App\Shipping', 'shipping_id', 'shipping_id');
    }
     public function payment(){
        return $this->hasOne('App\Payment', 'payment_id', 'payment_id');
    }
     public function coupon(){
        return $this->hasOne('App\Coupon', 'coupon_id', 'coupon_id');
    }
   
   
}
