@extends('backend.layout.master')
@section('content')

<div class="container" style="margin-top:30px;">
    <div class="row">
        <div class="col-sm-12">
            @include('backend.partials.messages')
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h4>View Order #LE{{ $order->id }}</h4>
                        </div>

                        <div class="card-body">

                            <div class="order_details">
                                <div class="row">
                                    <div class="col-md-6 border-right">
                                        <p>Orderer Name : {{ $order->name }}</p>
                                        <p>Orderer Phone : {{ $order->phone_no }}</p>
                                        <p>Orderer Email : {{ $order->email }}</p>
                                        <p>Shipping Address : {{ $order->shipping_address }}</p>
                                    </div>
                                    <div class="col-md-6 ">
                                        <p><strong>Payment Method : {{ $order->payment->name }}</strong></p>
                                        <p><strong> @if(!is_null($order->transaction_id) )
                                                Payment Transaction : {{ $order->transaction_id }}
                                                @else
                                                @endif
                                            </strong></p>
                                        <p></p>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="order_view">
                                <h2>Orderer Items</h2>
                                @if($order->carts->count() > 0 )
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Total Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php
                                        $total_price = 0 ;
                                        @endphp
                                        @foreach($order->carts as $cart)


                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>
                                                <div class="cart-img-product b-rad-4 o-f-hidden">
                                                    @if($cart->product->images->count() > 0 )
                                                    <img src="{{asset('public/images/product/'. $cart->product->images->first()->image)}}"
                                                        alt="IMG-PRODUCT">
                                                    @endif
                                                </div>
                                            </td>
                                            <td>{{$cart->product->title}}</td>
                                            <td>
                                                <form class="form-inline" action="{{ route('carts.update',$cart->id) }}"
                                                    method="post">
                                                    @csrf
                                                    <input type="number" class="size8 m-text18 t-center num-product"
                                                        name="product_quantity" value="{{$cart->product_quantity}}">
                                                    &ensp;
                                                    <button type="submit" class="btn btn-success">Update</button>
                                                </form>
                                            </td>
                                            <td>{{$cart->product->price}} Taka</td>
                                            @php
                                            $total_price += $cart->product->price * $cart->product_quantity;
                                            @endphp
                                            <td>{{$cart->product->price * $cart->product_quantity}} Taka</td>
                                            <td>
                                                <form class="form-inline" action="{{ route('carts.delete',$cart->id) }}"
                                                    method="post">
                                                    @csrf
                                                    <input type="hidden" name="cart_id">
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="4"></td>
                                            <td><strong>Total:</strong></td>
                                            <td> <strong>{{$total_price}} Taka</strong> </td>
                                        </tr>
                                </table>

                                </tbody>
                                @endif
                            </div>
                            <hr>
                            <div class="order_shipping">
                                <form action="{{ route('admin.orders.charge', $order->id)  }}" method="post">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for=""><strong>Shipping Charge</strong></label>
                                            <input type="number" class="form-control" name="shipping_charge"
                                                value="{{$order->shipping_charge}}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for=""><strong>Custom Discount</strong></label>
                                            <input type="number" class="form-control" name="custom_discount"
                                                value="{{$order->custom_discount}}">
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-info" value="Update">
                                    <a class="btn btn-success"
                                        href="{{ route('admin.orders.invoice', $order->id)  }}">Invoice</a>
                                </form>
                            </div>
                            <hr>

                            <form class="paid-btn" action="{{ route('admin.orders.completed', $order->id)  }}"
                                method="post">
                                @csrf
                                @if($order->is_completed)
                                <input type="submit" class="btn btn-danger" value="Cancel Order">
                                @else
                                <input type="submit" class="btn btn-info" value="Complete Order">
                                @endif
                            </form>


                            <form class="paid-btn" action="{{ route('admin.orders.paid', $order->id)  }}" method="post">
                                @csrf
                                @if($order->is_paid)
                                <input type="submit" class="btn btn-danger" value="Cancel Payment">
                                @else
                                <input type="submit" class="btn btn-info" value="Paid Order">
                                @endif
                            </form>


                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection