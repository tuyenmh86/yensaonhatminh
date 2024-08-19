    @extends('frontend.layouts.app')

@section('content')

    <section class="gry-bg py-4 profile">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-3 col-sm-12 d-lg-block">
                    @include('frontend.inc.customer_side_nav')
                </div>
                <div class="col-lg-9">
                    <!-- Page title -->
                    <div class="page-title">
                        <div class="row align-items-center">
                            <div class="col-md-6 col-12">
                                <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                    {{__('Dashboard')}}
                                </h2>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="float-md-right">
                                    <ul class="breadcrumb">
                                        <li><a href="{{ route('home') }}">{{__('Home')}}</a></li>
                                        <li class="active"><a href="{{ route('dashboard') }}">{{__('Dashboard')}}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- dashboard content -->
                    <div class="">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-6">
                                <div class="dashboard-widget text-center green-widget mt-4 c-pointer">
                                    <a href="javascript:;" class="d-block">
                                        <i class="fa fa-shopping-cart"></i>
                                        @if(Session::has('cart'))
                                            <span class="d-block title">{{ count(Session::get('cart'))}} Product(s)</span>
                                        @else
                                            <span class="d-block title">0 Product</span>
                                        @endif
                                        <span class="d-block sub-title">in your cart</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="dashboard-widget text-center red-widget mt-4 c-pointer">
                                    <a href="javascript:;" class="d-block">
                                        <i class="fa fa-heart"></i>
                                        <span class="d-block title">{{ count(Auth::user()->wishlists)}} Product(s)</span>
                                        <span class="d-block sub-title">in your wishlist</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-6">
                                <div class="dashboard-widget text-center yellow-widget mt-4 c-pointer">
                                    <a href="{{route('products.userId',Auth::user()->id)}}" class="d-block">
                                        <i class="fa fa-building"></i>
                                        @php

                                            //$orders = \App\Order::where('user_id', Auth::user()->id)->get();
                                            //$total = 0;
                                            //foreach ($orders as $key => $order) {
                                            //    $total += count($order->orderDetails);
                                            //}
                                        @endphp
                                        <span class="d-block title"> Khóa học của bạn {{ count(\App\UserProduct::where('user_id',Auth::user()->id)->get()) }}</span>
                                        <span class="d-block sub-title">Khóa học đã thanh toán</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-box bg-white mt-4">
                                    <div class="form-box-title px-3 py-2 clearfix ">
                                        Thông tin của bạn
                                        <div class="float-right">
                                            <a href="{{ route('profile') }}" class="btn btn-link btn-sm">{{__('Edit')}}</a>
                                        </div>
                                    </div>
                                    <div class="form-box-content p-3">
                                        <p> Địa chỉ:
                                            {{ Auth::user()->address }}
                                            - {{ \App\Ward::find(Auth::user()->wards)->name }}
                                            - {{ \App\District::find(Auth::user()->district)->name }}
                                            - {{ \App\Province::find( Auth::user()->province)->name }}
                                        </p>
                                     {{--   <table>
                                            <tr>
                                                <td>{{__('Country')}}:</td>
                                                <td class="p-2">
                                                    @if (Auth::user()->country != null)
                                                        {{ \App\Country::where('code', Auth::user()->country)->first()->name }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tỉnh Thành phố:</td>
                                                <td class="p-2">{{ \App\Province::find( Auth::user()->province)->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Quận Huyện:</td>
                                                <td class="p-2">{{ \App\District::find(Auth::user()->district)->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Phường Xã:</td>
                                                <td class="p-2">{{ \App\Ward::find(Auth::user()->wards)->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Số nhà:</td>
                                                <td class="p-2">{{ Auth::user()->address }}</td>
                                            </tr>
                                        </table>--}}
                                    </div>
                                </div>
                            </div>
                            {{--<div class="col-md-7">
                                <div class="form-box bg-white mt-4">
                                    <div class="form-box-title px-3 py-2 clearfix ">
                                       <h1>Trở thành người giới thiệu khóa học</h1>
                                    </div>
                                    <div class="form-box-content p-3">
                                       <table>
                                           @foreach(\App\Product::where('published',1)->get() as $product)
                                           <tr>
                                               <td>{{$product->link().'?ref='.Auth::user()->id}}</td>
                                           </tr>
                                           @endforeach
                                       </table>
                                    </div>
                                </div>
                            </div>--}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
