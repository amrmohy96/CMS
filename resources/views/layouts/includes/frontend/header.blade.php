<!-- Header -->
<header id="wn__header" class="oth-page header__area header__absolute sticky__header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-7 col-lg-2">
                <div class="logo">
                    <a href="{{route('frontend.index')}}">
                        <img src="{{asset('frontend/images/logo/logo.png')}}" alt="logo images">
                    </a>
                </div>
            </div>
            <div class="col-lg-8 d-none d-lg-block">
                <nav class="mainmenu__nav">
                    <ul class="meninmenu d-flex justify-content-start">
                        <li class="drop with--one--item"><a href="{{route('frontend.index')}}">Home</a></li>
                        <li class="drop"><a href="#">Pages</a>
                            <div class="megamenu dropdown">
                                <ul class="item item01">
                                    <li><a href="about.html">About Page</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="drop"><a href="javascript:void(0)">Blog</a>
                            <div class="megamenu dropdown">
                                <ul class="item item01">
                                    @foreach($global_categories as $category)
                                        <li>
                                            <a href="{{route('frontend.category',$category->slug)}}">{{$category->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        <li><a href="{{route('contact.form.show')}}">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-8 col-sm-8 col-5 col-lg-2">
                <ul class="header__sidebar__right d-flex justify-content-end align-items-center">
                    <li class="shop_search"><a class="search__active" href="#"></a></li>
                    <li class="shopcart">
                        <a class="cartbox_active" href="#">
                            <span class="product_qun">0</span>
                        </a>
                        <!-- Start Shopping Cart -->
                        <div class="block-minicart minicart__active">
                            <div class="minicart-content-wrapper">
                                <div class="single__items">
                                    <div class="miniproduct">
                                        <div class="item01 d-flex mt--20">
                                            <div class="thumb">
                                                <a href="product-details.html"><img
                                                        src="{{asset('assets/posts/default.jpg')}}" width="50"
                                                        height="50" alt="product images"></a>
                                            </div>
                                            <div class="content">
                                                <h6><a href="product-details.html">new comment on your post</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Shopping Cart -->
                    </li>
                    <li class="setting__bar__icon"><a class="setting__active" href="#"></a>
                        <div class="searchbar__content setting__block">
                            <div class="content-inner">


                                <div class="switcher-currency">
                                    <strong class="label switcher-label">
                                        <span>My Account</span>
                                    </strong>
                                    <div class="switcher-options">
                                        <div class="switcher-currency-trigger">
                                            <div class="setting__menu">
                                                @guest
                                                    <span>
                            <a href="{{ route('dashboard.login') }}">{{ __('Login') }}</a>
                        </span>
                                                    @if (Route::has('dashboard.register'))
                                                        <span>
                                <a href="{{ route('dashboard.register') }}">{{ __('Register') }}</a>
                            </span>
                                                    @endif
                                                @else
                                                    <span>
                                                        <a href="{{route('cms.dashboard')}}">dashboard</a>
                                                    </span>
                                                    <span>
                                                          <a href="{{ route('dashboard.logout') }}"
                                                             onclick="event.preventDefault();
                                                                                                     document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>
                                                    </span>

                                                    <form id="logout-form" action="{{ route('dashboard.logout') }}" method="POST"
                                                          class="d-none">
                                                        @csrf
                                                    </form>
                                                @endguest

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Start Mobile Menu -->
        <div class="row d-none">
            <div class="col-lg-12 d-none">
                <nav class="mobilemenu__nav">
                    <ul class="meninmenu">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#">Pages</a>
                            <ul>
                                <li><a href="about.html">About Page</a></li>
                                <li><a href="portfolio.html">Portfolio</a>
                                    <ul>
                                        <li><a href="portfolio.html">Portfolio</a></li>
                                        <li><a href="portfolio-details.html">Portfolio Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="my-account.html">My Account</a></li>
                                <li><a href="cart.html">Cart Page</a></li>
                                <li><a href="checkout.html">Checkout Page</a></li>
                                <li><a href="wishlist.html">Wishlist Page</a></li>
                                <li><a href="error404.html">404 Page</a></li>
                                <li><a href="faq.html">Faq Page</a></li>
                                <li><a href="team.html">Team Page</a></li>
                            </ul>
                        </li>
                        <li><a href="shop-grid.html">Shop</a>
                            <ul>
                                <li><a href="shop-grid.html">Shop Grid</a></li>
                                <li><a href="single-product.html">Single Product</a></li>
                            </ul>
                        </li>
                        <li><a href="blog.html">Blog</a>
                            <ul>
                                <li><a href="blog.html">Blog Page</a></li>
                                <li><a href="blog-details.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- End Mobile Menu -->
        <div class="mobile-menu d-block d-lg-none">
        </div>
        <!-- Mobile Menu -->
    </div>
</header>
<!-- //Header -->
<!-- Start Search Popup -->
<div class="box-search-content search_active block-bg close__top">
    <form id="search_mini_form" class="minisearch" action="#">
        <div class="field__search">
            <input type="text" placeholder="Search entire store here...">
            <div class="action">
                <a href="#"><i class="zmdi zmdi-search"></i></a>
            </div>
        </div>
    </form>
    <div class="close__wrap">
        <span>close</span>
    </div>
</div>
<!-- End Search Popup -->
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area bg-image--4">
</div>
<!-- End Bradcaump area -->


{{--<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">--}}
{{--    <div class="container">--}}
{{--        <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--            {{ config('app.name', 'Laravel') }}--}}
{{--        </a>--}}
{{--        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}

{{--        <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--            <!-- Left Side Of Navbar -->--}}
{{--            <ul class="navbar-nav mr-auto">--}}

{{--            </ul>--}}

{{--            <!-- Right Side Of Navbar -->--}}
{{--            <ul class="navbar-nav ml-auto">--}}
{{--                <!-- Authentication Links -->--}}
{{--
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}
