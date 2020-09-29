<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// use App\Models\Cart;
use app\Models\Order;
use App\Models\Product;
use App\Models\ProductImage;
use Cart;

use Auth;

class CartsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.pages.carts');
    }

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
      
        $notification = array(
            'message' => 'Product has added to Cart !!!', 
            'alert-type' => 'success'
          );
            return Redirect()->back()->with($notification);
            
        // $this->validate($request,[
        //     'product_id' => 'required'
        // ],
        //  [
        //      'product_id.required' => 'Please give a Product'
        //  ]);
        

        //  if(Auth::check())
        //  {
        //     $cart= Cart::where('user_id',Auth::id())
        //               ->where('product_id',$request->product_id)
        //               ->where('order_id', NULL)
        //               ->first();
        //  }else
        //  {
        //     $cart= Cart::where('ip_address', request()->ip())
        //     ->where('product_id',$request->product_id)
        //     ->where('order_id', NULL)
        //     ->first();
        //  }
        // if(!is_null($cart))
        // {
        //     $cart->increment('product_quantity');
        // }else{
        //     $cart = new Cart();
        //     if(Auth::check()){
        //         $cart->user_id = Auth::id();
        //     }
        //     $cart->ip_address = request()->ip();
        //     $cart->product_id = $request->product_id;
        //     $cart->save();
            
        //     }
        

        // $notification = array(
        //     'message' => 'Product has added to Cart !!!', 
        //     'alert-type' => 'success'
        //   );
        //     return Redirect()->back()->with($notification);
        // session()->flash('success','Product has added to Cart !!');
        // return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $qty = $request->qty;
        $update=  Cart::update($id, $qty);
        if ($update) {
            $notification = array(
                'message' => 'Successfully Cart Updated!',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => ' Cart not Updated!',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
        
        
        // $cart = Cart::find($id);

        // if(!is_null($cart))
        // {
        //     $cart->product_quantity = $request->product_quantity;
        //     $cart->save();
        //     $notification = array(
        //         'message' => 'Cart Item has Updated Successfully !!', 
        //         'alert-type' => 'success'
        //       );
    
        //     return Redirect()->back()->with($notification);
        // }else{
        //     $notification = array(
        //         'message' => 'Cart Item has not Updated  !!', 
        //         'alert-type' => 'danger'
        //       );
        //     return redirect()->route('carts')->with($notification);
        // }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        $notification = array(
            'message' => 'Successfully Cart Deleted!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
        // $cart = Cart::find($id);

        // if(!is_null($cart))
        // {
        //     $cart->delete();
        //     $notification = array(
        //         'message' => 'Cart Item has Deleted !!', 
        //         'alert-type' => 'success'
        //       );
    
        //     return Redirect()->back()->with($notification);
        // }else{
        //     $notification = array(
        //         'message' => 'Cart Item is not Deleted !!', 
        //         'alert-type' => 'danger'
        //       );
        //     return redirect()->route('carts')->with($notification);
        // }
        
    }
}
