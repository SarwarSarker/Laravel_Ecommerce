<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
class ProductsController extends Controller
{
    public function index()
    {
        $product=Product::orderby('id','desc')->paginate(9);
        return view('frontend.pages.products.index',compact('product'));
    }
    public function show($slug)
    {
        $product = Product::where('slug',$slug)->first();

        if(!is_null($product)){
            return view('frontend.pages.products.show',compact('product'));
        }else{
            $notification = array(
                'message' => 'Sorry , There is no product by  this URL!!', 
                'alert-type' => 'success'
              );
    
            return Redirect()->route('product')->with($notification);
        }
    }
    public function search(Request $request )
    {
        $search = $request->search;
        $product=Product::orWhere('title','like','%'.$search.'%')
        ->orWhere('description','like','%'.$search.'%')
        ->orWhere('price','like','%'.$search.'%')
        ->orderby('id','desc')
        ->paginate(9);
        return view('frontend.pages.products.search',compact('search','product'));
    }

}
