<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    //
    public function index(){
        $time=Carbon::now('Asia/Ho_Chi_Minh')->month;
        $order=Order::where('state',0)->get();
        $order_time=DB::table('orders')->where('state',1)->whereMonth('created_at',Carbon::now('Asia/Ho_Chi_Minh'))->get();
        return view('admin.index',compact('order','time','order_time'));
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
