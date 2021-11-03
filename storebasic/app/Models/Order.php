<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Orderdetail;
class Order extends Model
{
    //
    protected $table='orders';
    public function detail(){
        return $this->hasMany(Orderdetail::Class,'orders_id','id');
    }
}
