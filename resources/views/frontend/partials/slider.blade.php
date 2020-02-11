<section class="slide1">
    <div class="wrap-slick1">
        <div class="slick1">

            @foreach($slider as $row)
            <div class="item-slick1 item1-slick1 "
                style="background-image: url({{asset('public/images/slider/'. $row->image)}}); height:570px; width:1920px;">
                <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170 ">
                    <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15 text-dark"
                        data-appear="fadeInDown">
                        {{$row->title}}
                    </span>

                    <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37 text-dark"
                        data-appear="fadeInUp">
                        {{$row->button_text}}
                    </h2>

                    <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
                        <!-- Button -->
                        <a href="{{ route('product')}}" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                            Shop Now
                        </a>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</section>