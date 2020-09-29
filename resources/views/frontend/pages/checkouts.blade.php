@extends('frontend.l_out.master')

@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <center>
                    <h2 class="breadcrumb-header">Checkout</h2>
                </center>

            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-7">
                <!-- Billing Details -->
                <div class="billing-details">
                    <div class="section-title">
                        <h3 class="title">Billing address</h3>
                    </div>
                    <form method="POST" action="{{ route('checkouts.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name</label>

                            <input type="text" class="input @error('name') is-invalid @enderror" name="name"
                                value="{{ auth::check() ? Auth::user()->username : ''}}" required>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-group ">
                            <label for="email">E-Mail Address</label>

                            <input type="email" class="input @error('email') is-invalid @enderror" name="email"
                                value="{{ auth::check() ? Auth::user()->email : ''}}" required>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="form-group ">
                            <label for="phone">Phone No</label>

                            <input type="text" class="input @error('phone_no') is-invalid @enderror" name="phone_no"
                                value="{{ auth::check() ? Auth::user()->phone_no : ''}}" required>

                            @error('phone_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="form-group ">
                            <label for="shipping_address">Shipping Address</label>

                            <textarea class="input @error('shipping_address') is-invalid @enderror"
                                name="shipping_address" rows="3"
                                required>{{ auth::check() ? Auth::user()->shipping_address : ''}}</textarea>

                            @error('shipping_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="form-group ">
                            <label for="message">Additional Message(Optional)</label>

                            <textarea class="input @error('message') is-invalid @enderror" name="message"
                                rows="3"></textarea>

                            @error('message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label>
                                Select a Payment Method
                            </label>
                            <select class="form-control" id="payment" name="payment_method_id" required>
                                <option>Select a Payment Method Please</option>
                                @foreach($payments as $payment)
                                <option value="{{ $payment->short_name }}">{{ $payment->name }}</option>
                                @endforeach

                            </select>

                        </div>


                        <div class="form-group ">
                            @foreach($payments as $payment)
                            @if($payment->short_name == 'cash')
                            <div id="payment_{{$payment->short_name}}" class="hidden pay">
                                <div class="box">
                                    <h4>For cash is there nothing is necessary. Just click finish order..</h4>

                                    <center><small>You will get product in two or three Business days..</small></center>
                                </div>
                            </div>
                            @else
                            <div id="payment_{{$payment->short_name}}" class="hidden pay">
                                <div class="box">
                                    <h4>{{$payment->name}} payment</h4>
                                    <h4>{{$payment->name}} No: {{$payment->no}}</h4>
                                    <h4><strong>Account Type: {{$payment->type}}</strong></h4><br>
                                    <div class="alert alert-success">Please send the money to this {{$payment->name}}
                                        and write your transction code below there</div>

                                </div>

                            </div>
                            @endif
                            @endforeach
                            <input type="text" name="transaction_id" id="transaction_id" class="transction hidden"
                                placeholder="Enter transaction code">

                        </div>


                        <button type="submit" class="primary-btn order-submit">Order Now</button>
                    </form>
                </div>
                <!-- /Billing Details -->

            </div>

            <!-- Order Details -->
            <div class="col-md-5 order-details">
                <div class="section-title text-center">
                    <h3 class="title">Your Order</h3>
                </div>
                <div class="order-summary">
                    <div class="order-col">
                        <div><strong>PRODUCT</strong></div>
                        <div><strong>TOTAL(TAKA)</strong></div>
                    </div>
                    <div class="order-products">

                        @foreach(Cart::content() as $cart)
                        <div class="order-col">
                            <div>{{ $cart->name }} - <span style="color:red;">Item
                                    ({{ $cart->qty }})</span></div>
                            <div>{{ $cart->price * $cart->qty}}</div>
                        </div>
                        @endforeach
                    </div>
                    <div class="order-col">
                        {{-- <div>Shipping Cost</div>
                        <div><strong>{{App\Models\Order::orderBy('id','asc')->first()->shipping_charge}}</strong></div> --}}
                    </div>
                    <div class="order-col">
                        <div><strong>TOTAL</strong></div>
                        <div><strong
                                class="order-total">
                                {{-- {{ $total_price + App\Models\Order::orderBy('id','asc')->first()->shipping_charge}} --}}
                                {{Cart::subtotal()}}
                            </strong>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /Order Details -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

@endsection