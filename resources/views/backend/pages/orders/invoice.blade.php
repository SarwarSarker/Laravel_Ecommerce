<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice-{{$order->id}}</title>
    <style>
    .site_logo {
        padding-left: 70px;
    }

    .center {
        padding-top: 35px;
    }

    .site_address {
        padding-left: 470px;
        padding-top: -100px;

    }

    .invoice-header {
        background-color: #f5f7f7;
    }

    .main-left {
        border-left: 5px solid #ec5d01;
        padding-left: 20px;
        padding-top: 20px;
        border-top: 1px solid black;
    }

    .main-right {
        padding-left: 400px;
        padding-top: -170px;
        margin: 10px;
    }

    .main-right h1 {
        color: #ec5d01;
        font-size: 55px !important;
        font-family: serif;

    }

    .table {
        width: 100%;
    }

    .table th {
        text-align: center;
        font-size: 20px !important;

    }

    .table td {
        /* border: 1px solid #ddd; */
        text-align: center;
        padding: 12px;
    }

    .t-header {
        background-color: #ec5d01;

    }

    .bold {
        text-size: 50px;
    }

    .thank {
        padding-top: 20px;
        padding-left: 30px;
        color: #ec5d01;
    }

    .signature {
        padding-top: 20px;
        padding-left: 550px;
    }
    </style>
</head>

<body>

    <div class="invoice-header">
        <div class="float-left site_logo">
            <img src="{{asset('public/images/index_pic.png')}}" alt="" class="center">
        </div>
        <div class="float-right site_address">
            <h3>Lara E-commerce</h3>
            <p>Uttara, Sector No 13, Dhaka</p>
            <p>Phone : <a href="">987654332</a></p>
            <p>Email: <a href="">info@laracommerce.com</a></p>
        </div>
    </div>
    <div class="main-left">
        <p>Invoice to :</p>
        <h3> Name : {{ $order->name }}</h3>
        <p> Address : {{ $order->shipping_address }}</p>
        <p> Phone : {{ $order->phone_no }}</p>
        <p> Email : <a href="">{{ $order->email }}</a></p>

    </div>
    <div class="main-right">
        <h1>Invoice #{{ $order->id }}</h1>
        <p>{{ $order->created_at }}</p>
    </div>
    <div class="clearfix"></div>

    <hr>
    <div class="invoice-details">
        <h2>Orderer Items</h2>
        {{-- @if($order->carts->count() > 0 ) --}}
        <table class="table ">
            <thead class="t-header ">
                <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total Price</th>
                </tr>
            </thead>

            @php
            $total_price = 0 ;
            @endphp
            @foreach($order_details as $cart)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{$cart->product_name}}</td>
                <td>{{$cart->product_quantity}}</td>
                <td>{{$cart->product_price}} Taka</td>
                @php
                $total_price += $cart->product_price * $cart->product_quantity;
                @endphp
                <td>{{$cart->product_price * $cart->product_quantity}} Taka</td>

            </tr>
            @endforeach
            <tr>
                <td colspan="3"></td>
                <td>
                    <strong>Shipping Charge:</strong>
                </td>
                <td>
                    <strong> {{$order->shipping_charge}} Taka</strong>
                </td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td>
                    <strong>Discount: </strong>
                </td>
                <td>
                    <strong>{{$order->custom_discount}}.00 Taka</strong>
                </td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td style="color: #F81D2D;  font-size: large;"><strong>Total:</strong></td>
                <td style="color: #F81D2D;  font-size: large;">
                    <strong>{{$total_price + $order->shipping_charge + $order->custom_discount}}
                        Taka</strong>
                </td>
            </tr>
        </table>

        {{-- @endif --}}
    </div>

    <div class="thank">
        <p>Thanks for your Business!!!!!!</p>
    </div>


    <div class="signature">
        <p>--------------</p>
        <p><b>Signature</b></p>
    </div>


</body>

</html>