<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\AddUserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index(){
        $users=User::all();
        return view('admin.users.listuser',compact('users'));
    }
    public function add(){
        return view('admin.users.adduser');
    }
    public function store(AddUserRequest $req){
        $user=new User();
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $user->fullname=$req->full;
        $user->address=$req->address;
        $user->phone=$req->phone;
        $user->level=$req->level;
        $user->save();
        return redirect()->route('user.index')->with('thongbao','Thêm user thành công');
    }
    public function edit($id){
        $user=User::find($id);
        return view('admin.users.edituser',compact('user'));
    }
    public function update($id,AddUserRequest $req){
        $user=User::find($id);
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $user->fullname=$req->full;
        $user->address=$req->address;
        $user->phone=$req->phone;
        $user->level=$req->level;
        $user->save();
        return redirect()->route('user.index')->with('thongbao','Sửa user thành công');
    }
    public function delete($id){
        $user=User::find($id)->delete();
        return redirect()->route('user.index')->with('thongbao','Đã xóa user');
    }
}
