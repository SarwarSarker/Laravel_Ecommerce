<div class="banner bgwhite p-t-40 p-b-40">
    <div class="container">
        <div class="row">
            @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id', NULL)->get() as $parent)
            @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id', $parent->id)->get() as $child)
            <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                <!-- block1 -->
                <div class="block1 hov-img-zoom pos-relative m-b-30">
                    <img src="{{asset('public/images/category/'. $child->image)}}" alt="IMG-BENNER" height="300 ">

                    <div class="block1-wrapbtn w-size2">
                        <!-- Button -->
                        <a href="{{route('categories.show',$child->id)}}"
                            class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                            {{$child->name}}
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            @endforeach

        </div>
    </div>
</div>