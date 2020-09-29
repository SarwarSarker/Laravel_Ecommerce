<header class="header1">
    <!-- Header desktop -->
    <div class="container-menu-header">
        <div class="topbar">
            <div class="topbar-social">
                <a href="#" class="topbar-social-item fa fa-facebook"></a>
                <a href="#" class="topbar-social-item fa fa-instagram"></a>
                <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
            </div>

            <span class="topbar-child1">
                Free shipping for standard order over $100
            </span>

            <div class="topbar-child2">
                <span class="topbar-email">

                </span>

                <div class="topbar-language rs1-select2">

                </div>
            </div>
        </div>

        <div class="wrap_header">
            <!-- Logo -->
            <a href="{{route('index')}}" class="logo">
                <img src="{{asset('public/asset/images/icons/idx.png')}}" alt="IMG-LOGO">
            </a>

            <!-- Menu -->
            <div class="wrap_menu">
                <nav class="menu">
                    <ul class="main_menu">
                        <li>
                            <a href="{{route('index')}}">Home</a>
                        </li>

                        <li>
                            <a href="{{route('product')}}">Shop</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Header Icon -->
            <div class="header-icons">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">

                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}"
                            class='img rounded-circle' style='height:40px'>
                        {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                        <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('user.dashbroad') }}">My Dashbroad</a>

                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest

                <span class="linedivide1"></span>


                <div class="header-wrapicon2">
                    <a href="{{ route('carts') }}">
                        <img src="{{asset('public/asset/images/icons/icon-header-02.png')}}"
                            class="header-icon1 js-show-header-dropdown" alt="ICON">
                        <span class="header-icons-noti" id="total">
                            {{-- {{ App\Models\Cart::totalItems() }} --}}
                            {{ Cart::count()}}
                        </span>

                    </a>

                    <!-- Header cart noti -->

                </div>
            </div>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap_header_mobile">
        <!-- Logo moblie -->
        <a href="{{route('index')}}" class="logo-mobile">
            <img src="{{asset('public/asset/images/icons/idx.png')}}" alt="IMG-LOGO">
        </a>

        <!-- Button show menu -->
        <div class="btn-show-menu">
            <!-- Header Icon mobile -->
            <div class="header-icons-mobile">
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">

                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}"
                            class='img rounded-circle' style='height:40px'>
                        {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                        <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('user.dashbroad') }}">My Dashbroad</a>

                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest

                <span class="linedivide2"></span>

                <div class="header-wrapicon2">
                    <a href="{{ route('carts') }}">
                        <img src="{{asset('public/asset/images/icons/icon-header-02.png')}}"
                            class="header-icon1 js-show-header-dropdown" alt="ICON">
                        <span class="header-icons-noti" id="total">
                            {{-- {{ App\Models\Cart::totalItems() }} --}}
                           {{ Cart::count()}}
                        </span>

                    </a>

                    <!-- Header cart noti -->

                </div>
            </div>

            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div class="wrap-side-menu">
        <nav class="side-menu">
            <ul class="main-menu">
               

                <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                    <div class="topbar-child2-mobile">
                        <span class="topbar-email">

                        </span>

                        <div class="topbar-language rs1-select2">

                        </div>
                    </div>
                </li>

                <li class="item-topbar-mobile p-l-10">
                    <div class="topbar-social-mobile">
                        <a href="#" class="topbar-social-item fa fa-facebook"></a>
                        <a href="#" class="topbar-social-item fa fa-instagram"></a>
                        <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                        <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                        <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
                    </div>
                </li> -->

                <li class="item-menu-mobile">
                    <a href="{{route('index')}}">Home</a>

                </li>

                <li class="item-menu-mobile">
                    <a href="{{route('product')}}">Shop</a>
                </li>
            </ul>
        </nav>
    </div>
</header>