<?php

namespace App\Http\Controllers\API;

use Auth;
use Cart;

use app\Models\Order;
use App\Models\Product;

use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartsController extends Controller
{
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products=Product::find($request->id);
        
        $product_image = ProductImage::where('product_id', $products->id)->first();
       
    	Cart::add([
    		'id'=>$request->id,
    		'qty'=>1,
    		'name'=>$products->title,
    		'price'=>$products->price,
    		'weight'=>0,
    		'options' => [
                'image' => $product_image->image
    		]
        ]);
            
         return json_encode(['status' => 'success', 'Message' => 'Item Added to the Cart!!', 'totalItems' => Cart::count()]);
        

    }

    
}