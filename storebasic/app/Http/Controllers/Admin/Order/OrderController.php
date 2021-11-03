<?php

namespace App\Http\Controllers\Admin\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Orderdetail;

class OrderController extends Controller
{
    //
    public function order(){
        $orders=Order::where('state',0)->get();
        return view('admin.orders.order',compact('orders'));
    }
    public function detailorder($id){
        $order=Order::find($id);
        return view('admin.orders.detailorder',compact('order'));
    }
    public function processed(){
        $orders=Order::where('state',1)->get();
        return view('admin.orders.processed',compact('orders'));
    }
    public function process($id){
        $order=Order::find($id);
        $order->state=1;
        $order->save();
        return redirect()->route('order.processed')->with('thongbao','Đã xử lý đơn hàng');
    }
}
