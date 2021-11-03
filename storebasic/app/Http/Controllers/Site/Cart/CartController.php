<?php

namespace App\Http\Controllers\Site\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Product;
use Cart;

class CartController extends Controller
{
    //
    public function cart(){
        $data['cart']=Cart::content();
        $data['total']=Cart::total(0,'','.');
        return view('site.carts.cart',$data);
    }
    public function addtocart(Request $req){
        $id_product=$req->id_product;
        $product=Product::find($id_product);
        if($req->has('quantity')){
            $qty=$req->quantity;
        }else{
            $qty=1;
        }
        Cart::add([
            'id' => $product->code, 'name' => $product->name, 'qty' => $qty, 'price' => $product->price, 'weight' => 0, 'options' => ['image' => $product->image]
        ]);
        return redirect()->route('site.cart');
    }
    public function checkout(){
        $data['cart']=Cart::content();
        $data['total']=Cart::total(0,'','.');
        return view('site.carts.checkout',$data);
    }
    public function postcheckout(Request $req){
        $order=new Order();
        $order->fullname=$req->fullname;
        $order->email=$req->email;
        $order->address=$req->address;
        $order->phone=$req->phone;
        $order->total=Cart::total(0,'','');
        $order->state=0;
        $order->save();
        foreach(Cart::content() as $row){
            $detail=new Orderdetail();
            $detail->name=$row->name;
            $detail->price=$row->price;
            $detail->code=$row->id;
            $detail->image=$row->options->image;
            $detail->quantity=$row->qty;
            $detail->orders_id=$order->id;
            $detail->save();
        }
        return redirect()->route('site.complete',$order->id);
    }
    public function complete($orderId) {
        $order=Order::find($orderId);
        return view('site.carts.complete',compact('order'));
    }
    public function delete($rowId){
        Cart::remove($rowId);
        return redirect()->route('site.cart');
    }
}
