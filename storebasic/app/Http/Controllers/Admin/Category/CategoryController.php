<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;       
use Illuminate\Support\Str;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\EditCategoryRequest;

class CategoryController extends Controller
{
    //
    public function index(){
        $cates=Category::all();
        return view('admin.categories.category',compact('cates'));
    }
    public function add(AddCategoryRequest $req){
        $category=new Category();
        $slug=Str::slug($req->name,'-');
        $category->name=$req->name;
        $category->slug=$slug;
        $category->parent_id=$req->parent_id;
        $category->save();
        return redirect()->back()->with('thongbao','Thêm danh mục thành cong');
    }
    public function edit($id){
        $cates=Category::all();
        $cate=Category::find($id);
        return view('admin.categories.editcategory',compact('cates','cate'));
    }
    public function update($id,EditCategoryRequest $req){
        $category=Category::find($id);
        $slug=Str::slug($req->name,'-');
        $category->name=$req->name;
        $category->slug=$slug;
        $category->parent_id=$req->parent_id;
        $category->save();
        return redirect()->back()->with('thongbao','sửa danh mục thành cong');
    }
    public function delete($id){
        $category=Category::find($id)->delete();
        return redirect()->back()->with('thongbao','xóa danh mục thành cong');
    }
}
