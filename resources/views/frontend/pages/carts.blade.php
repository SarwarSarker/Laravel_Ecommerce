@extends('frontend.l_out.master')


@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section mb-4">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <center>
                    <h2 class="breadcrumb-header"> CART</h2>
                </center>

            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->
<!-- Slide1 -->
@if(Cart::count() > 0)
<section class="cart bgwhite p-t-70 p-b-100">

    <div class="container">
        <!-- Cart item -->
        <div class="container-table-cart pos-relative">
            <div class="wrap-table-shopping-cart bgwhite">
                <table class="table-shopping-cart">
                    <tr class="table-head">
                        <th class="column-1">Image</th>
                        <th class="column-2">Product</th>
                        <th class="column-4 p-l-70">Quantity</th>
                        <th class="column-3">Price</th>
                        <th class="column-5">Total Price</th>
                        <th class="column-6">Action</th>
                    </tr>
                    @php
                    $total_price = 0 ;
                    @endphp
                    @foreach(Cart::content() as $cart)

                    <tr class="table-row">
                        <td class="column-1">
                            <div class="cart-img-product b-rad-4 o-f-hidden">
                                
                                <img src="{{asset('public/images/product/'. $cart->options->image)}}"alt="IMG-PRODUCT">
                            </div>
                        </td>
                        <td class="column-2">{{$cart->name}}</td>
                        <td class="column-4">
                            <div class="flex-w ">
                                <form class="form-inline" action="{{ route('carts.update',$cart->rowId) }}" method="post">
                                    @csrf
                                    &ensp;
                                    <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                        <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                    </button>
                                    <input type="number" class="size8 m-text18 t-center num-product"
                                        name="qty" value="{{$cart->qty}}">
                                    <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                        <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                    </button>&ensp;
                                    <button type="submit" class="btn btn-success">Update</button>
                                </form>

                            </div>
                        </td>
                        <td class="column-3">{{$cart->price}} Taka</td>
                        <td class="column-5">{{$cart->price * $cart->qty}} Taka</td>
                        <td class="column-6">
                            <form class="form-inline" action="{{ route('carts.delete',$cart->rowId) }}" method="post">
                                @csrf
                                <input type="hidden" name="rowId">
                                <button type="submit" class="btn btn-danger" id="delete">Delete</button>
                            </form>
                        </td>
                    </tr>

                    @endforeach

                </table>
            </div>
        </div>


        <!-- Total -->
        <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
            <h5 class="m-text20 p-b-24">
                Cart Totals
            </h5>

            <!--  -->
            <div class="flex-w flex-sb-m p-t-26 p-b-30">
                <span class="m-text22 w-size19 w-full-sm">
                    Total :
                </span>

                <span class="m-text21 w-size20 w-full-sm">
                    {{Cart::subtotal()}} Taka
                </span>
            </div>

            <div class="size15 trans-0-4">
                <!-- Button -->
                <a href="{{ route('product') }}"><button class="flex-c-m sizefull bg9 bo-rad-23 hov1 s-text1 trans-0-4">
                        Continue Shopping
                    </button></a>
            </div><br>
            <div class="size15 trans-0-4">
                <!-- Button -->
                <a href="{{ route('checkouts') }}"><button
                        class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                        Proceed to Checkout
                    </button></a>
            </div>
        </div>
    </div>
</section>
@else
<div class="alert alert-warning" style="height:50%;">
    <div style="padding:60px;">
        <center>
            <h3><strong>There is No Item in your Cart</strong></h3>
            <br>
            <a href="{{ route('product') }}"><button class="btn btn-success btn-lg">
                    Continue Shopping
                </button></a>
        </center>
    </div>
</div>
@endif

@endsection