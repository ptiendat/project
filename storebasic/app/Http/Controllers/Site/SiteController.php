<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
class SiteController extends Controller
{
    //
    public function index(){
            $data['featured']=Product::where('featured',1)->get();
            $data['news']=Product::orderBy('id','DESC')->get();
        return view('site.index',$data);
    }
    public function contact(){
        return view('site.contact');
    }
    public function about(){
        return view('site.about');
    }
}
