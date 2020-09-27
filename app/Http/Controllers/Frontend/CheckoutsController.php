<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Payment;
use App\Models\Order;
use App\Models\Cart;
use Auth;

class CheckoutsController extends Controller
{
    
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $payments = Payment::orderBy('priority','asc')->get();
        return view('frontend.pages.checkouts',compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'phone_no' => 'required',
            'shipping_address' => 'required',
            'payment_method_id' => 'required'
            ]);
 
            $order = new Order();
 
            ////Check transaction id is given or not
            if($request->payment_method_id != 'cash'){
                if($request->transaction_id == NULL || empty($request->transaction_id)){
                 $notification = array(
                     'message' => 'Sorry , Please give transaction ID for your Payment', 
                     'alert-type' => 'error'
                   );
                   return back()->with($notification);
                }
            }
 
            $order->name = $request->name;
            $order->email = $request->email;
            $order->phone_no = $request->phone_no;
            $order->shipping_address = $request->shipping_address;
            $order->message = $request->message;
            $order->transaction_id = $request->transaction_id;
            $order->ip_address = request()->ip();
            if(Auth::check()){
                $order->user_id = Auth::id();
            }

            $order->payment_id = Payment::where('short_name', $request->payment_method_id)->first()->id;
            $order->save();
            foreach(Cart::totalCarts() as $cart)
            {
               $cart->order_id = $order->id;
               $cart->save();
            }
            
            $notification = array(
            'message' => 'Your Order has taken Successfully !!.. Please wait for Admin confirmation...',
            'alert-type' => 'success'
            );
            return redirect()->route('index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
