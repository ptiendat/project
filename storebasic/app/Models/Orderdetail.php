<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
class Orderdetail extends Model
{
    //
    protected $table='Orderdetails';
    public function order(){
        return $this->belongsTo(Order::class,'orders_id','id');
    }
}
