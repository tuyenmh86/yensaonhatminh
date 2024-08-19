<div class="header bg-white">
    <!-- Top Bar -->
    <div class="top-navbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col">
                    {{-- <ul class="inline-links d-lg-inline-block d-flex justify-content-between">
                        <li class="dropdown" id="lang-change">
                            @php
                                if(Session::has('locale')){
                                    $locale = Session::get('locale', Config::get('app.locale'));
                                }
                                else{
                                    $locale = 'en';
                                }
                            @endphp
                            <a href="" class="dropdown-toggle top-bar-item" data-toggle="dropdown">
                                <img src="{{ asset('frontend/images/icons/flags/'.$locale.'.png') }}" class="flag"><span class="language">{{ \App\Language::where('code', $locale)->first()->name }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                @foreach (\App\Language::all() as $key => $language)
                                    <li class="dropdown-item @if($locale == $language) active @endif">
                                        <a href="#" data-flag="{{ $language->code }}"><img src="{{ asset('frontend/images/icons/flags/'.$language->code.'.png') }}" class="flag"><span class="language">{{ $language->name }}</span></a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="dropdown" id="currency-change">
                            @php
                                $code = \App\Currency::findOrFail(\App\BusinessSetting::where('type', 'home_default_currency')->first()->value)->code;
                                if(Session::has('currency_code')){
                                    $currency_code = Session::get('currency_code', $code);
                                }
                                else{
                                    $currency_code = $code;
                                }
                            @endphp
                            <a href="" class="dropdown-toggle top-bar-item" data-toggle="dropdown">
                                {{ \App\Currency::where('code', $currency_code)->first()->name }} {{ (\App\Currency::where('code', $currency_code)->first()->symbol) }}
                            </a>
                            <ul class="dropdown-menu">
                                @foreach (\App\Currency::where('status', 1)->get() as $key => $currency)
                                    <li class="dropdown-item @if($currency_code == $currency->code) active @endif">
                                        <a href="" data-currency="{{ $currency->code }}">{{ $currency->name }} ({{ $currency->symbol }})</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul> --}}
                </div>

                <div class="col-5 text-right d-none d-lg-block">
                    <ul class="inline-links">
                        <li>
                            <a href="{{ route('orders.track') }}" class="top-bar-item">{{__('Track Order')}}</a>
                        </li>
                        @auth
                        <li>
                            <a href="{{ route('dashboard') }}" class="top-bar-item">{{__('My Profile')}}</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" class="top-bar-item">{{__('Logout')}}</a>
                        </li>
                        @else
                        <li>
                            <a href="{{ route('user.login') }}" class="top-bar-item">{{__('Login')}}</a>
                        </li>
                        <li>
                            <a href="{{ route('user.registration') }}" class="top-bar-item">{{__('Registration')}}</a>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Top Bar -->

    <!-- mobile menu -->
    <div class="mobile-side-menu d-lg-none">
        <div class="side-menu-overlay opacity-0" onclick="sideMenuClose()"></div>
        <div class="side-menu-wrap opacity-0">
            <div class="side-menu closed">
                <div class="side-menu-header ">
                    <div class="side-menu-close" onclick="sideMenuClose()">
                        <i class="la la-close"></i>
                    </div>

                    {{-- @auth
                        <div class="widget-profile-box px-3 py-4 d-flex align-items-center">
                                <div class="image " style="background-image:url('{{ Auth::user()->avatar_original }}')"></div>
                                <div class="name">{{ Auth::user()->name }}</div>
                        </div>
                        <div class="side-login px-3 pb-3">
                            <a href="{{ route('logout') }}">{{__('Sign Out')}}</a>
                        </div>
                    @else
                        <div class="widget-profile-box px-3 py-4 d-flex align-items-center">
                                <div class="image " style="background-image:url('{{ asset('frontend/images/icons/user-placeholder.jpg') }}')"></div>
                        </div>
                        <div class="side-login px-3 pb-3">
                            <a href="{{ route('user.login') }}">{{__('Sign In')}}</a>
                            <a href="{{ route('user.registration') }}">{{__('Registration')}}</a>
                        </div>
                    @endauth --}}
                </div>
                <div class="side-menu-list px-3">
                    <ul class="side-user-menu">
                        <li>
                            <a href="{{ route('home') }}">
                                <i class="la la-home"></i>
                                <span>{{__('Home')}}</span>
                            </a>
                        </li>

                        {{-- <li>
                            <a href="{{ route('dashboard') }}">
                                <i class="la la-dashboard"></i>
                                <span>{{__('Dashboard')}}</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('purchase_history.index') }}">
                                <i class="la la-file-text"></i>
                                <span>{{__('Purchase History')}}</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('compare') }}">
                                <i class="la la-refresh"></i>
                                <span>{{__('Compare')}}</span>
                                @if(Session::has('compare'))
                                    <span class="badge" id="compare_items_sidenav">{{ count(Session::get('compare'))}}</span>
                                @else
                                    <span class="badge" id="compare_items_sidenav">0</span>
                                @endif
                            </a>
                        </li> --}}
                        {{-- <li>
                            <a href="{{ route('cart') }}">
                                <i class="la la-shopping-cart"></i>
                                <span>{{__('Cart')}}</span>
                                @if(Session::has('cart'))
                                    <span class="badge" id="cart_items_sidenav">{{ count(Session::get('cart'))}}</span>
                                @else
                                    <span class="badge" id="cart_items_sidenav">0</span>
                                @endif
                            </a>
                        </li> --}}
                        {{-- <li>
                            <a href="{{ route('wishlists.index') }}">
                                <i class="la la-heart-o"></i>
                                <span>{{__('Wishlist')}}</span>
                            </a>
                        </li> --}}

                        {{-- @if (\App\BusinessSetting::where('type', 'wallet_system')->first()->value == 1)
                            <li>
                                <a href="{{ route('wallet.index') }}">
                                    <i class="la la-dollar"></i>
                                    <span>{{__('My Wallet')}}</span>
                                </a>
                            </li>
                        @endif

                        <li>
                            <a href="{{ route('profile') }}">
                                <i class="la la-user"></i>
                                <span>{{__('Manage Profile')}}</span>
                            </a>
                        </li> --}}
                        @foreach (\App\Category::where('top',1)->get() as $key => $category)
                        <li>
                        <a href="{{ $category->link() }}" class="text-truncate">
                            {{-- <img class="cat-image" src="{{ asset($category->icon) }}" width="13"> --}}
                            <span>{{ __($category->name) }}</span>
                        </a>
                    </li>
                    @endforeach
                    </ul>
                    {{-- @if (Auth::check() && Auth::user()->user_type == 'seller')
                        <div class="sidebar-widget-title py-0">
                            <span>{{__('Shop Options')}}</span>
                        </div>
                        <ul class="side-seller-menu">
                            <li>
                                <a href="{{ route('seller.products') }}">
                                    <i class="la la-diamond"></i>
                                    <span>{{__('Products')}}</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('orders.index') }}">
                                    <i class="la la-file-text"></i>
                                    <span>{{__('Orders')}}</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('shops.index') }}">
                                    <i class="la la-cog"></i>
                                    <span>{{__('Shop Setting')}}</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('payments.index') }}">
                                    <i class="la la-cc-mastercard"></i>
                                    <span>{{__('Payment History')}}</span>
                                </a>
                            </li>
                        </ul>
                        <div class="sidebar-widget-title py-0">
                            <span>{{__('Earnings')}}</span>
                        </div>
                        <div class="widget-balance py-3">
                            <div class="text-center">
                                <div class="heading-4 strong-700 mb-4">
                                    @php
                                        $orderDetails = \App\OrderDetail::where('seller_id', Auth::user()->id)->where('created_at', '>=', date('-30d'))->get();
                                        $total = 0;
                                        foreach ($orderDetails as $key => $orderDetail) {
                                            if($orderDetail->order->payment_status == 'paid'){
                                                $total += $orderDetail->price;
                                            }
                                        }
                                    @endphp
                                    <small class="d-block text-sm alpha-5 mb-2">{{__('Your earnings (current month)')}}</small>
                                    <span class="p-2 bg-base-1 rounded">{{ single_price($total) }}</span>
                                </div>
                                <table class="text-left mb-0 table w-75 m-auto">
                                    <tbody>
                                        <tr>
                                            @php
                                                $orderDetails = \App\OrderDetail::where('seller_id', Auth::user()->id)->get();
                                                $total = 0;
                                                foreach ($orderDetails as $key => $orderDetail) {
                                                    if($orderDetail->order->payment_status == 'paid'){
                                                        $total += $orderDetail->price;
                                                    }
                                                }
                                            @endphp
                                            <td class="p-1 text-sm">
                                                {{__('Total earnings')}}:
                                            </td>
                                            <td class="p-1">
                                                {{ single_price($total) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            @php
                                                $orderDetails = \App\OrderDetail::where('seller_id', Auth::user()->id)->where('created_at', '>=', date('-60d'))->where('created_at', '<=', date('-30d'))->get();
                                                $total = 0;
                                                foreach ($orderDetails as $key => $orderDetail) {
                                                    if($orderDetail->order->payment_status == 'paid'){
                                                        $total += $orderDetail->price;
                                                    }
                                                }
                                            @endphp
                                            <td class="p-1 text-sm">
                                                {{__('Last Month earnings')}}:
                                            </td>
                                            <td class="p-1">
                                                {{ single_price($total) }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif --}}
                    {{-- <div class="sidebar-widget-title py-0">
                        <span>Categories</span>
                    </div> --}}
                    {{-- <ul class="side-seller-menu">
                        @foreach (\App\Category::where('top',1)->get() as $key => $category)
                            <li>
                            <a href="{{ route('products.category', $category->id) }}" class="text-truncate">
                                <img class="cat-image" src="{{ asset($category->icon) }}" width="13">
                                <span>{{ __($category->name) }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- end mobile menu -->

    <div class="position-relative logo-bar-area pt-3 pb-3">
        <div class="container">
            <div class="row no-gutters align-items-center">
                <div class="col-lg-3 col-md-3 col-sm-1 col-xs-1 col-1">
                    <div class="d-flex">
                        <div class="d-block d-lg-none mobile-menu-icon-box">
                            <!-- Navbar toggler  -->
                            <a href="" onclick="sideMenuOpen(this)">
                                <div class="hamburger-icon">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                        </div>

                        <!-- Brand/Logo -->
                        <a class="navbar-brand w-100 d-xs-none" href="{{ route('home') }}">
                            @php
                                $generalsetting = \App\GeneralSetting::first();
                            @endphp
                            @if($generalsetting->logo != null)
                                <img src="{{ asset($generalsetting->logo) }}" class="" alt="{{$generalsetting->site_name}}">
                            @else
                                <img src="{{ asset('frontend/images/logo/logo.png') }}" class="" alt="active shop">
                            @endif
                        </a>

                        {{-- @if(Route::currentRouteName() != 'home' && Route::currentRouteName() != 'categories.all')
                            <div class="d-none d-xl-block category-menu-icon-box">
                                <div class="dropdown-toggle navbar-light category-menu-icon" id="category-menu-icon">
                                    <span class="navbar-toggler-icon"></span>
                                </div>
                            </div>
                        @endif --}}
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-11 col-xs-11 col-11 position-static">
                    
                    <div class="main-nav-area d-none d-lg-block">
                        <nav class="navbar navbar-expand-lg navbar--bold navbar--style-2 navbar-light bg-default">
                            <div class="container">
                                <div class="collapse navbar-collapse" id="navbar_main">
                                    <!-- Navbar links -->
                                    <ul class="navbar-nav">
                                        @foreach (\App\Search::orderBy('count', 'desc')->get()->take(5) as $key => $search)
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('suggestion.search', $search->query) }}">{{ $search->query }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            
            
        </div>
        
    </div>
    <div class="row no-gutters align-items-center nav-main-2">
        
        <div class="main-nav-area-2 d-none d-lg-block p-2">
            <nav class="navbar navbar-expand-lg navbar--bold navbar--style-2 navbar-light bg-default">
                <div class="container">
                    <div class="d-block mobile-menu-icon-box">
                        <!-- Navbar toggler  -->
                        <a class="nav-link" href="" onclick="sideMenuOpen(this)">
                            <div class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="navbar_main">
                        <!-- Navbar links -->
                        
                        <ul class="navbar-nav">
                            @foreach(\App\Category::where('top',1)->get() as $category)
                            <li class="nav-item"> <a class="nav-link" href="{{$category->link()}}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>

        {{-- <div class="hover-category-menu" id="hover-category-menu">
            <div class="container">
                <div class="row no-gutters position-relative">
                    <div class="col-lg-3 position-static">
                        <div class="category-sidebar" id="category-sidebar">
                            <div class="all-category">
                                <span>{{__('CATEGORIES')}}</span>
                                <a href="{{ route('categories.all') }}" class="d-inline-block">See All ></a>
                            </div>
                            <ul class="categories">
                                @foreach (\App\Category::all()->take(11) as $key => $category)
                                    @php
                                        $brands = array();
                                    @endphp
                                    <li>
                                        <a href="{{ route('products.category', $category->id) }}">
                                            <img class="cat-image" src="{{ asset($category->icon) }}" width="30">
                                            <span class="cat-name">{{ __($category->name) }}</span>
                                        </a>
                                        @if(count($category->subcategories)>0)
                                            <div class="sub-cat-menu c-scrollbar">
                                                <div class="sub-cat-main row no-gutters">
                                                    <div class="col-9">
                                                        <div class="sub-cat-content">
                                                            <div class="sub-cat-list">
                                                                <div class="card-columns">
                                                                    @foreach ($category->subcategories as $subcategory)
                                                                        <div class="card">
                                                                            <ul class="sub-cat-items">
                                                                                <li class="sub-cat-name"><a href="{{ route('products.subcategory', $subcategory->id) }}">{{ __($subcategory->name) }}</a></li>
                                                                                @foreach ($subcategory->subsubcategories as $subsubcategory)
                                                                                    @php
                                                                                        foreach (json_decode($subsubcategory->brands) as $brand) {
                                                                                            if(!in_array($brand, $brands)){
                                                                                                array_push($brands, $brand);
                                                                                            }
                                                                                        }
                                                                                    @endphp
                                                                                    <li><a href="{{ route('products.subsubcategory', $subsubcategory->id) }}">{{ __($subsubcategory->name) }}</a></li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <div class="sub-cat-featured">
                                                                <ul class="sub-cat-featured-list inline-links d-flex">
                                                                    <li class="col">
                                                                        <a href="" >
                                                                            <span class="featured-name">New arrival plus size</span>
                                                                            <span class="featured-img">
                                                                                <img src="{{ asset('frontend/images/girls/1.png') }}" class="img-fluid">
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="col">
                                                                        <a href="" >
                                                                            <span class="featured-name">Sweater Collection</span>
                                                                            <span class="featured-img">
                                                                                <img src="{{ asset('frontend/images/girls/2.png') }}" class="img-fluid">
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="col">
                                                                        <a href="" >
                                                                            <span class="featured-name">High Quality Formal Dresses</span>
                                                                            <span class="featured-img">
                                                                                <img src="{{ asset('frontend/images/girls/3.png') }}" class="img-fluid">
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-3">
                                                        <div class="sub-cat-brand">
                                                            <ul class="sub-brand-list">
                                                                @foreach ($brands as $brand_id)
                                                                    @if(\App\Brand::find($brand_id) != null)
                                                                        <li class="sub-brand-item">
                                                                            <a href="{{ route('products.brand', $brand_id) }}" ><img src="{{ asset(\App\Brand::find($brand_id)->logo) }}" class="img-fluid"></a>
                                                                        </li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div> --}}

