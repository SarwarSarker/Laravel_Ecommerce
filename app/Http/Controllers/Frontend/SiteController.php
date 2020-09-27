<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Slider;


class SiteController extends Controller
{
    
    public function index()
    {
        $slider= Slider::orderby('priority','asc')->get();
        $product=Product::orderby('id','desc')->get();
        return view('frontend.pages.index',compact('product','slider'));
    }
    public function contact()
    {
        return view('frontend.pages.contact');
    }
    
    
    
}
