@extends('frontend.l_out.master')
@section('title')
{{$product->title}} | Laravel Ecommerce
@endsection

@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section mb-4">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <center>
                    <h2 class="breadcrumb-header"> PRODUCT DETAILS</h2>
                </center>

            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->



<!-- ##### Single Product Details Area Start ##### -->
<section class="single_product_details_area d-flex align-items-center mx">

    <!-- Single Product Thumb -->
    <div class="single_product_thumb clearfix">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner">
                @php $i=1;
                @endphp
                @foreach($product->images as $row)
                <div class="carousel-item {{ $i == 1 ? 'active' : '' }}">
                    <img class="d-block w-100" src="{{asset('public/images/product/' .$row->image)}} "
                        alt="{{$row->title}}" width="580" height="680">
                </div>
                @php $i++;
                @endphp
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon text-dark" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>



    <!-- Single Product Description -->
    <div class="single_product_desc clearfix">

        <h2>{{$product->title}}</h2>

        <p class="product-price">{{$product->price}} Taka</p>
        <p class="product-desc"><strong>Category :</strong>
            <span class="badge badge-success ">{{$product->category->name}}</span> </p>
        <p class="product-desc"><strong>Brand :</strong> <span class="badge badge-danger">{{$product->brand->name}}</span>
        </p>
        <p class="product-desc"><strong>Availibility :</strong> <span class="badge badge-info">
                {{ $product->quantity < 1 ? 'No Item available' : $product->quantity . '  Item'}}</span> </p>

        <hr>
        <!-- Select Box -->
        <h5>Description</h5>
        <div class="select-box d-flex mt-50 mb-30">

            <p class="product-desc ">{{$product->description}}</p>
        </div>
        <!-- Cart & Favourite Box -->
        <div class="cart-fav-box d-flex align-items-center">
            <!-- Cart -->

            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button type="button" class="btn essence-btn" onclick="addToCart({{ $product->id }})">Add to Cart</button>

        </div>

    </div>





</section>
<!-- ##### Single Product Details Area End ##### -->


@endsection