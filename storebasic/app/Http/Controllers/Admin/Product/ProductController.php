<?php

namespace App\Http\Controllers\Admin\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\AddProductRequest;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Http\Requests\EditProductRequest;

class ProductController extends Controller
{
    //
    public function index(){
        $products=Product::all();
        return view('admin.products.listproduct',compact('products'));
    }
    public function add(){
        $data['cates']=Category::all();
        return view('admin.products.addproduct',$data);
    }
    public function store(AddProductRequest $req){
        $product=new Product();
        $slug=Str::slug($req->name,'-');
        $product->name=$req->name;
        $product->code=$req->code;
        $product->slug=$slug;
        $product->price=$req->price;
        $product->featured=$req->featured;
        $product->state=$req->state;
        $product->info=$req->info;
        $product->describer=$req->describer;
        $product->categories_id=$req->parent_id;
        if($req->hasFile('img')){
            $file=$req->file('img');
            $filename=$slug.'.'.$file->getClientOriginalExtension();
            $path=public_path().'/uploads';
            $file->move($path,$filename);
            $product->image=$filename;
        }else{
            $product->image='no-img.jpg';
        }
        $product->save();
        return redirect()->route('product.index')->with('thongbao','Thêm sản phẩm thành công');
    }
    public function edit($id){
        $data['product']=Product::find($id);
        $data['cates']=Category::all();
        return view('admin.products.editproduct',$data);
    }
    public function update($id,AddProductRequest $req){
        $product=Product::find($id);
        $slug=Str::slug($req->name,'-');
        $product->name=$req->name;
        $product->code=$req->code;
        $product->slug=$slug;
        $product->price=$req->price;
        $product->featured=$req->featured;
        $product->state=$req->state;
        $product->info=$req->info;
        $product->describer=$req->describer;
        $product->categories_id=$req->parent_id;
        if($req->hasFile('img')){
            $file=$req->file('img');
            $filename=$slug.'.'.$file->getClientOriginalExtension();
            $path=public_path().'/uploads';
            $file->move($path,$filename);
            $product->image=$filename;
        }
        $product->save();
        return redirect()->route('product.index')->with('thongbao','Sửa sản phẩm thành công');
    }
    public function delete($id){
        $product=Product::find($id)->delete();
        return redirect()->back()->with('thongbao','Xóa sản phẩm thành công');
    }
}
