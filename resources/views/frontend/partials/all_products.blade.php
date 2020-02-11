 <!-- Product -->

 <div class="row">
     @foreach($product as $row)
     <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
         <!-- Block2 -->
         <div class="block2">
             <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                 @php $i = 1; @endphp
                 @foreach($row->images as $image)
                 @if($i > 0)
                 <img src="{{asset('public/images/product/'. $image->image)}}" alt="{{$row->title}}" height="400">
                 @endif
                 @php $i--; @endphp
                 @endforeach

                 <div class="block2-overlay trans-0-4">
                     <!-- <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
										</a> -->

                     <div class="block2-btn-addcart w-size1 trans-0-4">
                         <!-- Button -->
                         @include('frontend.partials.cart_button')
                     </div>
                 </div>
             </div>

             <div class="block2-txt p-t-20">
                 <a href="{{route('product.show',$row->slug)}}" class="block2-name dis-block s-text3 p-b-5">
                     {{$row->title}}
                 </a>

                 <span class="block2-price m-text6 p-r-5">
                     Taka - {{$row->price}}
                 </span>
             </div>
         </div>
     </div>
     @endforeach
 </div>