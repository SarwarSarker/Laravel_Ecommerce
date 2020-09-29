<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use Cart;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Order_details;
use App\Http\Controllers\Controller;

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

            $cartProducts= Cart::content();
            foreach($cartProducts as $cartProduct){
                $orderDetail= new Order_details;
                $orderDetail->order_id=$order->id;
                $orderDetail->product_id= $cartProduct->id;
                $orderDetail->product_name=$cartProduct->name;
                $orderDetail->product_price=$cartProduct->price;
                $orderDetail->product_quantity=$cartProduct->qty;
                $orderDetail->image=$cartProduct->options->image;
                $orderDetail->save();
            }
            
            Cart::destroy();

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
