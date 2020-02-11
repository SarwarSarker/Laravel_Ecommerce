<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use PDF;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $orders=Order::orderby('id')->get();
        return view('backend.pages.orders.index',compact('orders'));
    }
    public function show($id)
    {
        $order=Order::find($id);
        $order->is_seen_by_admin = 1;
        $order->save();
        return view('backend.pages.orders.show',compact('order'));
    }
    public function completed($id)
    {
        $order=Order::find($id);
        if($order->is_completed){
            $order->is_completed = 0;
        }else{
            $order->is_completed = 1;
        }
        $order->save();
        session()->flash('success','Order Completed Status changed!');
        return back();
    }
    
    public function chargeUpdate(Request $request , $id)
    {
        $order=Order::find($id);
        $order->shipping_charge = $request->shipping_charge;
        $order->custom_discount = $request->custom_discount;
        
        $order->save();
        session()->flash('success','Order Charged and Discount changed!');
        return back();
    }
    public function paid($id)
    {
        $order=Order::find($id);
        if($order->is_paid){
            $order->is_paid = 0;
        }else{
            $order->is_paid = 1;
        }
        $order->save();
        session()->flash('success','Order Paid Status changed!');
        return back();
    }
    // Invoice generate
    public function generateInvoice($id){
        $order=Order::find($id);
        $pdf = PDF::loadView('backend.pages.orders.invoice',compact('order'));
        return $pdf->stream('invoice.pdf');
    }
    public function delete($id){
        $product =  Order::find($id);
        
        
        if(!is_null($product)){
            $product->delete();
        }
        session()->flash('success','Successfully Order Item deleted!');    
        return Redirect()->back(); 
        }
}