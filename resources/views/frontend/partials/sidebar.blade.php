<div class="leftbar p-r-20 p-r-0-sm">
    <!--  -->
    @php
    $categories= App\Models\Category::orderBy('id','asc')->where('parent_id', NULL)->get();
    @endphp
    <h4 class="m-text14 p-b-7">
        Categories
    </h4>

    <ul class="p-b-54">
        <div class="panel-group category-products" id="accordian">
            <!--category-productsr-->
            <div class="panel panel-default">
                @foreach($categories as $parent)
                @php
                $sub_categories=App\Models\Category::orderBy('id','asc')->where('parent_id',$parent->id)->get();
                @endphp
                <div class="panel-heading">

                    <h4 class="panel-title">

                        <a data-toggle="collapse" data-parent="#accordian" href="#main-{{$parent->id}}">
                            @if(count($sub_categories)>0)
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            @endif
                            <!-- <span class="badge pull-right"><i class="fa fa-plus"></i></span> -->

                            @if(count($sub_categories)>0)
                            {{$parent->name}}
                            @else
                            <a href="{{route('categories.show',$parent->id)}}">{{$parent->name}}</a>
                            @endif

                        </a>
                    </h4>
                </div>

                <div class="panel-collapse collapse" id="main-{{$parent->id}}">
                    <div class="card card-body border-0">
                        @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id', $parent->id)->get() as
                        $child)
                        <div class="panel-body ">
                            <a href="{{route('categories.show',$child->id )}} " class="s-text13  
						@if (Route::is('categories.show'))
							@if ($child->id == $category->id)
							active1
							@endif
						@endif
				        "> {{$child->name}} </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
            <!--/category-productsr-->
    </ul>

    <!--  -->
    <form class="form-inline my-2 my-lg-0" action="{{route('search')}}" method="get">
        <div class="search-product pos-relative bo4 of-hidden">

            <input class="s-text7 size6 p-l-23 p-r-50" style="border: none !important; " type="text" name="search"
                placeholder="Search Products...">

            <button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
                <i class="fs-12 fa fa-search" aria-hidden="true"></i>
            </button>
        </div>
    </form>




    <!-- new -->

    <!-- new -->

</div>