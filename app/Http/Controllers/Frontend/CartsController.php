<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cart;
use app\Models\Order;

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
        $this->validate($request,[
            'product_id' => 'required'
        ],
         [
             'product_id.required' => 'Please give a Product'
         ]);
        

         if(Auth::check())
         {
            $cart= Cart::where('user_id',Auth::id())
                      ->where('product_id',$request->product_id)
                      ->where('order_id', NULL)
                      ->first();
         }else
         {
            $cart= Cart::where('ip_address', request()->ip())
            ->where('product_id',$request->product_id)
            ->where('order_id', NULL)
            ->first();
         }
        if(!is_null($cart))
        {
            $cart->increment('product_quantity');
        }else{
            $cart = new Cart();
            if(Auth::check()){
                $cart->user_id = Auth::id();
            }
            $cart->ip_address = request()->ip();
            $cart->product_id = $request->product_id;
            $cart->save();
            
            }
        

        $notification = array(
            'message' => 'Product has added to Cart !!!', 
            'alert-type' => 'success'
          );
            return Redirect()->back()->with($notification);
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
        $cart = Cart::find($id);

        if(!is_null($cart))
        {
            $cart->product_quantity = $request->product_quantity;
            $cart->save();
        }else{
            return redirect()->route('carts');
        }
        $notification = array(
            'message' => 'Cart Item has Updated Successfully !!', 
            'alert-type' => 'success'
          );

        return Redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::find($id);

        if(!is_null($cart))
        {
            $cart->delete();
        }else{
            return redirect()->route('carts');
        }
        $notification = array(
            'message' => 'Cart Item has Deleted !!', 
            'alert-type' => 'success'
          );

        return Redirect()->back()->with($notification);
    }
}
