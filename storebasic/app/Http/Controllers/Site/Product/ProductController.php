<?php

namespace App\Http\Controllers\Site\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    //
    public function detail($id){

        $data['product']=Product::find($id);
        $data['productlq']=Product::where('categories_id',$data['product']->categories_id)->where('id','<>',$data['product']->id)->get();
        
        return view('site.products.detail',$data); 
    }
    public function shop(){
        $data=cache()->remember('data',now()->addDay(),function(){
            $data['categories']=Category::all();
            $data['products']=Product::all();
        });
        // $data['categories']=Category::all();
        // $data['products']=Product::all();
        return view('site.products.shop',$data);
    }
    public function filter(Request $req){
        $data['categories']=Category::all();
         $data['products']=Product::whereBetween('price',[$req->start,$req->end])->get();
         return view('site.products.shop',$data);
    }
    public function filter_id($id){
        $data['categories']=Category::all();
        $data['products']=Product::where('categories_id',$id)->get();
        return view('site.products.shop',$data);
    }
}
