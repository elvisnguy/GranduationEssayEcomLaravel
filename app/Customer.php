<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "tbl_customers";
    protected $primaryKey = "customer_id";

     protected $fillable = [
        'customer_password'
    ];
    public function orders()
    {
        return $this->hasMany('\App\Order', "customer_id",  "customer_id"	);
    }
}
