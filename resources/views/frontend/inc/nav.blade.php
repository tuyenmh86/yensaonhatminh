<div class="header bg-black">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 logo d-none d-md-block">
                <a href="/" title="banner"><img class="logo-icon" src="{{ asset(\App\GeneralSetting::first()->logo)}}" title="banner" alt="banner" style="background: #FFFFFF;"></a>
            </div>
            <div class="col-lg-8 col-sm-8 col-md-8">
                <ul class="hotline-top">
                    <li>Hotline - Zalo : <a href="tel:{{App\GeneralSetting::first()->phone}}" title="{{App\GeneralSetting::first()->phone}}">{{App\GeneralSetting::first()->phone}}</a></li>
               {{--     <li>
                        <div>

                       Gb </div>
                    </li>--}}
                </ul>
                <div class="d-flex w-100">
                    <div class="search-box flex-grow-1 show">
                        <form action="{{ route('search') }}" method="GET">
                            <div class="d-flex position-relative">
                                <div class="d-lg-none search-box-back">
                                    <button class="" type="button"><i class="la la-search"></i>
                                    </button>
                                </div>
                                <div class="w-100">
                                    <input type="text" aria-label="Search" id="search" name="q" class="w-100"
                                           placeholder="Tôi muốn tìm sản phẩm ..." autocomplete="off">

                                </div>
                                <div class="form-group category-select d-none d-xl-block">
                                    <select class="form-control selectpicker" name="category_id">
                                        <option value="">{{__('All Categories')}}</option>
                                        @foreach (\App\Category::all() as $key => $category)
                                            <option value="{{ $category->id }}"
                                                    @isset($category_id)
                                                    @if ($category_id == $category->id)
                                                    selected
                                                @endif
                                                @endisset
                                            >{{ __($category->name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button class="d-none d-lg-block" type="submit">
                                    <i class="la la-search la-flip-horizontal"></i>
                                </button>
                                <div class="typed-search-box d-none">
                                    <div class="search-preloader">
                                        <div class="loader">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                    </div>
                                    <div class="search-nothing d-none">

                                    </div>
                                    <div id="search-content">

                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>


                    <div class="logo-bar-icons d-inline-block ml-auto">
                        <div class="d-inline-block d-lg-none">
                            <div class="nav-search-box">
                                <a href="#" class="nav-box-link">
                                    <i class="la la-search la-flip-horizontal d-inline-block nav-box-icon"></i>
                                </a>
                            </div>
                        </div>
                        {{--<div class="d-none d-lg-inline-block">
                            <div class="nav-compare-box" id="compare">
                                <a href="{{ route('compare') }}" class="nav-box-link">
                                    <i class="la la-refresh d-inline-block nav-box-icon"></i>
                                    <span class="nav-box-text d-none d-xl-inline-block">{{__('Compare')}}</span>
                                    @if(Session::has('compare'))
                                        <span class="nav-box-number">{{ count(Session::get('compare'))}}</span>
                                    @else
                                        <span class="nav-box-number">0</span>
                                    @endif
                                </a>
                            </div>
                        </div>--}}
                        {{--<div class="d-none d-lg-inline-block">
                            <div class="nav-wishlist-box" id="wishlist">
                                <a href="{{ route('wishlists.index') }}" class="nav-box-link">
                                    <i class="la la-heart-o d-inline-block nav-box-icon"></i>
                                    <span
                                        class="nav-box-text d-none d-xl-inline-block">{{__('Wishlist')}}</span>
                                    @if(Auth::check())
                                        <span class="nav-box-number">{{ count(Auth::user()->wishlists)}}</span>
                                    @else
                                        <span class="nav-box-number">0</span>
                                    @endif
                                </a>
                            </div>
                        </div>--}}
                        <div class="d-inline-block" data-hover="dropdown">
                            <div class="nav-cart-box dropdown" id="cart_items">
                                <a href="" class="nav-box-link" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">
                                    <i class="la la-shopping-cart d-inline-block nav-box-icon"></i>
                                    <span class="nav-box-text d-none d-xl-inline-block">{{__('Cart')}}</span>
                                    @if(Session::has('cart'))
                                        <span class="nav-box-number">{{ count(Session::get('cart'))}}</span>
                                    @else
                                        <span class="nav-box-number">0</span>
                                    @endif
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right px-0">
                                    <li>
                                        <div class="dropdown-cart px-0">
                                            @if(Session::has('cart'))
                                                @if(count($cart = Session::get('cart')) > 0)
                                                    <div class="dc-header">
                                                        <h3 class="heading heading-6 strong-700">{{__('Cart Items')}}</h3>
                                                    </div>
                                                    <div class="dropdown-cart-items c-scrollbar">
                                                        @php
                                                            $total = 0;
                                                        @endphp
                                                        @foreach($cart as $key => $cartItem)
                                                            @php
                                                                $product = \App\Product::find($cartItem['id']);
                                                                $total = $total + $cartItem['price']*$cartItem['quantity'];
                                                            @endphp
                                                            <div class="dc-item">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="dc-image">
                                                                        <a href="{{ route('product', $product->slug) }}">
                                                                            <img
                                                                                src="{{ asset($product->thumbnail_img) }}"
                                                                                class="img-fluid" alt="">
                                                                        </a>
                                                                    </div>
                                                                    <div class="dc-content">
                                                                                <span
                                                                                    class="d-block dc-product-name text-capitalize strong-600 mb-1">
                                                                                    <a href="{{ route('product', $product->slug) }}">
                                                                                        {{ __($product->name) }}
                                                                                    </a>
                                                                                </span>

                                                                        <span
                                                                            class="dc-quantity">x{{ $cartItem['quantity'] }}</span>
                                                                        <span
                                                                            class="dc-price">{{ single_price($cartItem['price']*$cartItem['quantity']) }}</span>
                                                                    </div>
                                                                    <div class="dc-actions">
                                                                        <button
                                                                            onclick="removeFromCart({{ $key }})">
                                                                            <i class="la la-close"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="dc-item py-3">
                                                        <span class="subtotal-text">{{__('Subtotal')}}</span>
                                                        <span
                                                            class="subtotal-amount">{{ single_price($total) }}</span>
                                                    </div>
                                                    <div class="py-2 text-center dc-btn">
                                                        <ul class="inline-links inline-links--style-3">
                                                            <li class="pr-3">
                                                                <a href="{{ route('cart') }}"
                                                                   class="link link--style-1 text-capitalize btn btn-base-1 px-3 py-1">
                                                                    <i class="la la-shopping-cart"></i> {{__('View cart')}}
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('checkout.shipping_info') }}"
                                                                   class="link link--style-1 text-capitalize btn btn-base-1 px-3 py-1 light-text">
                                                                    <i class="la la-mail-forward"></i> {{__('Checkout')}}
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                @else
                                                    <div class="dc-header">
                                                        <h3 class="heading heading-6 strong-700">{{__('Your Cart is empty')}}</h3>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="dc-header">
                                                    <h3 class="heading heading-6 strong-700">{{__('Your Cart is empty')}}</h3>
                                                </div>
                                            @endif
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- mobile menu -->
    <div class="mobile-side-menu d-none d-lg-none">
        <div class="side-menu-overlay opacity-0" onclick="sideMenuClose()"></div>
        <div class="side-menu-wrap opacity-0">
            <div class="side-menu closed">
                <div class="side-menu-header ">
                    <div class="side-menu-close" onclick="sideMenuClose()">
                        <i class="la la-close"></i>
                    </div>

                    @auth
                        <div class="widget-profile-box px-3 py-4 d-flex align-items-center">
                            <div class="image "
                                 style="background-image:url('{{ Auth::user()->avatar_original }}')"></div>
                            <div class="name">{{ Auth::user()->name }}</div>
                        </div>
                        <div class="side-login px-3 pb-3">
                            <a href="{{ route('logout') }}">{{__('Sign Out')}}</a>
                        </div>
                    @else
                        <div class="widget-profile-box px-3 py-4 d-flex align-items-center">
                            <div class="image "
                                 style="background-image:url('{{ asset('frontend/images/icons/user-placeholder.jpg') }}')"></div>
                        </div>
                        <div class="side-login px-3 pb-3">
                            <a href="{{ route('user.login') }}">{{__('Sign In')}}</a>
                            <a href="{{ route('user.registration') }}">{{__('Registration')}}</a>
                        </div>
                    @endauth
                </div>
                <div class="side-menu-list px-3">
                    <ul class="side-user-menu">
                        <li>
                            <a href="{{ route('home') }}">
                                <i class="la la-home"></i>
                                <span>TRANG CHỦ</span>
                            </a>
                        </li>
                        <li>
                            @foreach(\App\Category::where('id',73)->get() as $category)
                                <a href="{{$category->link()}}" class="nav-link" title="{{$category->name}}">
                                {{$category->name}}
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach($category->children as $lv2)
                                        <li class="nav-item">
                                            <a href="{{$lv2->link()}}" class="nav-link" title="{{$lv2->name}}">{{$lv2->name}}
                                            </a>
                                            <ul class="dropdown-menu">
                                                @foreach($lv2->children as $lv3)
                                                    <li class="nav-item-lv2"><a class="nav-link" href={{$lv3->link()}} title="{{$lv3->name}}">{{$lv3->name}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                {{--@foreach(\App\Category::where('parent_id',0)->where('top',1)->get() as $key=>$product_cate)

                                    <li class="nav-item">
                                        <a href="{{$product_cate->link()}}" class="nav-link" title="{{$product_cate->name}}">{{$product_cate->name}}
                                        </a>
                                        @if(count($product_cate->children) >0)
                                            <ul class="dropdown-menu">
                                                @foreach($product_cate->children as $child)
                                                    <li class="nav-item-lv2"><a class="nav-link" href={{$child->link()}} title="{{$child->name}}">{{$child->name}}</a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach--}}
                                </ul>
                            @endforeach
                        </li>
                        @foreach(\App\Page::where('top-menu',1)->where('published',1)->get() as $key=>$page)
                            <li class=" nav-item has-childs">
                                <a href="{{$page->link()}}" class="nav-link" title="{{$page->name}}">{{$page->name}}
                                </a>
                            </li>
                        @endforeach

                        @foreach (\App\CategoriesPost::where('headmenu', 1)->where('published',1)->get() as $key => $headmenu)
                            <li class="nav-item"><a class="nav-link" href={{$headmenu->link()}} title="{{$headmenu->name}}">{{$headmenu->name}}</a></li>
                        @endforeach
                        <li class="nav-item "><a class="nav-link" href="{{route('lien-he')}}" title="Liên hệ">Liên hệ</a></li>

                        {{--<li>
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
                        </li>--}}

                        {{--                        <li>--}}
                        {{--                            <a href="{{ route('compare') }}">--}}
                        {{--                                <i class="la la-refresh"></i>--}}
                        {{--                                <span>{{__('Compare')}}</span>--}}
                        {{--                                @if(Session::has('compare'))--}}
                        {{--                                    <span class="badge" id="compare_items_sidenav">{{ count(Session::get('compare'))}}</span>--}}
                        {{--                                @else--}}
                        {{--                                    <span class="badge" id="compare_items_sidenav">0</span>--}}
                        {{--                                @endif--}}
                        {{--                            </a>--}}
                        {{--                        </li>--}}
                        <li>
                            <a href="{{ route('cart') }}">
                                <i class="la la-shopping-cart"></i>
                                <span>{{__('Cart')}}</span>
                                @if(Session::has('cart'))
                                    <span class="badge" id="cart_items_sidenav">{{ count(Session::get('cart'))}}</span>
                                @else
                                    <span class="badge" id="cart_items_sidenav">0</span>
                                @endif
                            </a>
                        </li>
                        {{--<li>
                            <a href="{{ route('wishlists.index') }}">
                                <i class="la la-heart-o"></i>
                                <span>{{__('Wishlist')}}</span>
                            </a>
                        </li>--}}

{{--
                        @if (\App\BusinessSetting::where('type', 'wallet_system')->first()->value == 1)
                            <li>
                                <a href="{{ route('wallet.index') }}">
                                    <i class="la la-dollar"></i>
                                    <span>{{__('My Wallet')}}</span>
                                </a>
                            </li>
                        @endif
--}}

                   {{--     <li>
                            <a href="{{ route('profile') }}">
                                <i class="la la-user"></i>
                                <span>{{__('Manage Profile')}}</span>
                            </a>
                        </li>
--}}
                    </ul>
                    {{--                    @if (Auth::check() && Auth::user()->user_type == 'seller')
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
                                        @endif--}}
{{--                    <div class="sidebar-widget-title py-0">--}}
{{--                        <span>Categories</span>--}}
{{--                    </div>--}}
{{--                    <ul class="side-seller-menu">--}}
{{--                        @foreach (\App\Category::all() as $key => $category)--}}
{{--                            <li>--}}
{{--                                <a href="{{ route('products.category', $category->id) }}" class="text-truncate">--}}
{{--                                    <img class="cat-image" src="{{ asset($category->icon) }}" width="13">--}}
{{--                                    <span>{{ __($category->name) }}</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
                </div>
            </div>
        </div>
    </div>
    <!-- end mobile menu -->
    <!-- Navbar -->
{{--    <nav class="menu navbar navbar-expand-lg navbar-light bg-dark">
            <a class="navbar-brand" href="#"><img src="{{ asset('uploads/logo/logo_benthanh.png') }}" class="d-block d-sm-none d-md-none d-lg-none" alt="{{\App\GeneralSetting::first()->sitename}}" style="max-height: 50px"></a>
            <button class="navbar-toggler" style="position: absolute;top:20px;right:20px;" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                --}}{{--            <span class="navbar-toggler-icon"></span>--}}{{--
                --}}{{--            <span class="sr-only">Toggle navigation</span>--}}{{--
                --}}{{--            <span class="icon-bar"></span>--}}{{--
                --}}{{--            <span class="icon-bar"></span>--}}{{--
                --}}{{--            <span class="icon-bar"></span>--}}{{--
                <i class="btn-mobile fa fa-align-right" style="font-size: 28px; color:#FFF;background-color: #ff1313;"></i>
            </button>

        <div class="container">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Trang Chủ <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('gioithieu')}}" title="Giới thiệu">Giới thiệu</a></li>
                    <li class="nav-item"><a class="nav-link" href="" title="khuyến mãi">Khuyến mãi</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('duan')}}" title="Dự án thực hiện">Dự án thực hiện</a></li>
--}}{{--                    <li class="nav-item"><a class="nav-link" href="" title="Catalogue">Catalogue</a></li>--}}{{--
                    <li class="nav-item"><a class="nav-link" href="{{route('tuyendung')}}" title="tuyển dụng">Tuyển dụng</a></li>
                    <li class="nav-item dropdown">
                        @foreach(\App\Category::where('id',73)->get() as $category)
                            <a href="#" class="nav-link dropdown-toggle" title="{{$category->name}}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{$category->name}}
                            </a>
                            @foreach(\App\SubCategory::where('category_id',$category->id)->get() as $lv2)
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{$lv2->link()}}">{{$lv2->name}}</a>
                                </div>
                            @endforeach
                        @endforeach
                    </li>
                    @foreach (\App\CategoriesPost::where('headmenu', 1)->where('published',1)->get() as $key => $headmenu)
                        <li class="nav-item"><a class="nav-link" href={{$headmenu->link()}} title="{{$headmenu->name}}">{{$headmenu->name}}</a></li>
                    @endforeach
                    <li class="nav-item"><a class="nav-link" href="{{route('lien-he')}}" title="Liên hệ">Liên hệ</a></li>

                </ul>
            </div>
        </div>

    </nav>--}}
    <div id="menu_area" class="menu-area">
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-light navbar-expand-lg mainmenu">
                    <a class="navbar-brand" href="#"><img src="{{ asset(\App\GeneralSetting::first()->logo)}}" class="d-block d-sm-none d-md-none d-lg-none" alt="{{\App\GeneralSetting::first()->sitename}}" style="max-height: 50px"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
{{--                        <span class="navbar-toggler-icon"></span>--}}
                        <i class="btn-mobile fa fa-align-right" style="font-size: 28px; color:#FFF;background-color: #ff1313;"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="/">Trang Chủ <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{route('gioithieu')}}" title="Giới thiệu">Giới thiệu</a></li>
                            <?php
                            $mcategory = \App\Category::where('id',73)->first();
                            ?>
                            @if(!empty($mcategory))
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="{{route('products.category',$mcategory->id)}}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$mcategory->name}}</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @foreach( $mcategory->subcategories as $subcategory)
                                            <li class="dropdown">
                                                <a class="dropdown-toggle" href="{{route('products.subcategory',$subcategory->id)}}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$subcategory->name}}</a>
                                                @if(!empty($subcategory))
                                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                        @foreach($subcategory->subsubcategories as $subsubcategories)
                                                            <li><a href="{{route('products.subsubcategory',$subsubcategories->id)}}">{{$subsubcategories->name}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                            <li class="nav-item"><a class="nav-link" href="{{route('tintuc')}}" title="Tin tức">Tin tức</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('khuyenmai')}}" title="khuyến mãi">Khuyến mãi</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('duan')}}" title="Dự án thực hiện">Dự án thực hiện</a></li>
                            {{--                    <li class="nav-item"><a class="nav-link" href="" title="Catalogue">Catalogue</a></li>--}}
{{--                            <li class="nav-item"><a class="nav-link" href="{{route('tuyendung')}}" title="tuyển dụng">Tuyển dụng</a></li>--}}
                            <li class="nav-item"><a class="nav-link" href="{{route('lien-he')}}" title="Liên hệ">Liên hệ</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>

</div>
