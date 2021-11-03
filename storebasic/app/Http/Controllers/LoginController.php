<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('admin.login');
    }
    public function login(LoginRequest $req){
        $email=$req->email;
        $password=$req->password;
        if(Auth::attempt(['email'=>$email,'password'=>$password])){
            return redirect()->route('admin');
        }else{
            return redirect()->back()->with('thogbao','Tên đăng nhập hoặc mật khẩu không đúng');
        }
    }
}
