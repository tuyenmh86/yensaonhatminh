@extends('frontend.layouts.app')

@section('content')
{{--<link href="https://pay.vnpay.vn/lib/vnpay/vnpay.css" rel="stylesheet" />--}}
{{--<script src="https://pay.vnpay.vn/lib/vnpay/vnpay.js"></script>--}}

    <div id="page-content">
        <section class="slice-xs sct-color-2 border-bottom">
            <div class="container container-sm">
                <div class="row cols-delimited">
                    <div class="col-4">
                        <div class="icon-block icon-block--style-1-v5 text-center">
                            <div class="block-icon mb-0">
                                <i class="icon-hotel-restaurant-105"></i>
                            </div>
                            <div class="block-content d-none d-md-block">
                                <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">1. {{__('My Cart')}}</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="icon-block icon-block--style-1-v5 text-center">
                            <div class="block-icon mb-0">
                                <i class="icon-finance-067"></i>
                            </div>
                            <div class="block-content d-none d-md-block">
                                <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">2. {{__('Shipping info')}}</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="icon-block icon-block--style-1-v5 text-center active">
                            <div class="block-icon c-gray-light mb-0">
                                <i class="icon-finance-059"></i>
                            </div>
                            <div class="block-content d-none d-md-block">
                                <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">3. {{__('Payment')}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-3 gry-bg">
            <div class="container">
                <div class="row cols-xs-space cols-sm-space cols-md-space">
                    <div class="col-lg-8">
{{--                        @if (Auth::check() && \App\BusinessSetting::where('type', 'coupon_system')->first()->value == 1)--}}
{{--                            <div class="card">--}}
{{--                                <button type="submit" class="btn btn-base-1" onclick="coupon_code_modal()">{{__('Apply Coupon code')}}</button>--}}
{{--                            </div>--}}
{{--                        @endif--}}
                        <form action="{{ route('payment.checkout') }}" class="form-default" data-toggle="validator" role="form" method="POST">
                            @csrf
                                        <div class="container">
                                            {{--<div class="row">
                                                <h4> Đơn hàng của bạn đã đặt thành công. Bạn Vui lòng chuyển khoản vào 1 trong các số tài khoản sau:</h4>
                                                <p>Lưu ý: Nội dung chuyển khoản: Tên facebook của bạn </p>
                                            </div>
                                            <div class="row text-white text-left font-weight-bold">
                                                <div class="col-md-3 col-sm-6 col-xs-12 border-light" style="border: 1px solid #FFFFF">
                                                    <ul class="bank-info">
                                                        <li>Ngân hàng Vietcombank</li>
                                                        <li>0461000514475</li>
                                                        <li>TRẦN THỊ HẰNG</li>
                                                        <li>Chi Nhánh: Sóng Thần Bình Dương</li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                    <ul class="bank-info">
                                                        <li>Ngân hàng Agribank</li>
                                                        <li>4301205061571</li>
                                                        <li>TRẦN THỊ HẰNG</li>
                                                        <li>Chi Nhánh : Quy Nhơn Bình Định</li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                    <ul class="bank-info">
                                                        <li>Ngân hàng ACB</li>
                                                        <li>9844367</li>
                                                        <li>TRẦN THỊ HẰNG</li>
                                                        <li>Nhánh: PGD Nguyễn Sơn, Hồ Chí Minh </li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                    <ul class="bank-info">
                                                        <li>Ví Momo</li>
                                                        <li>0377034538</li>
                                                        <li>TRẦN THỊ HẰNG</li>
                                                    </ul>
                                                </div>
                                               <div>--}}
                                                   <ul class="inline-links">
                                                       {{--                                        @if (\App\BusinessSetting::where('type', 'vnpay_payment')->first()->value == 1)--}}
                                                       {{--                                            <li>--}}
                                                       {{--                                                <label class="payment_option">--}}
                                                       {{--                                                    <input type="radio" id="vnpay" name="payment_option" value="vnpay" checked>--}}
                                                       {{--                                                    <span>--}}
                                                       {{--                                                        <img src="{{ asset('frontend/images/icons/cards/vnpay-logo.jpg')}}" class="img-fluid">--}}
                                                       {{--                                                    </span>--}}
                                                       {{--                                                </label>--}}
                                                       {{--                                            </li>--}}
                                                       {{--                                        @endif--}}
                                                       {{--                                        @if (\App\BusinessSetting::where('type', 'paypal_payment')->first()->value == 1)--}}
                                                       {{--                                            <li>--}}
                                                       {{--                                                <label class="payment_option">--}}
                                                       {{--                                                    <input type="radio" id="" name="payment_option" value="paypal" checked>--}}
                                                       {{--                                                    <span>--}}
                                                       {{--                                                        <img src="{{ asset('frontend/images/icons/cards/paypal.png')}}" class="img-fluid">--}}
                                                       {{--                                                    </span>--}}
                                                       {{--                                                </label>--}}
                                                       {{--                                            </li>--}}
                                                       {{--                                        @endif--}}
                                                       {{--                                        @if(\App\BusinessSetting::where('type', 'stripe_payment')->first()->value == 1)--}}
                                                       {{--                                            <li>--}}
                                                       {{--                                                <label class="payment_option">--}}
                                                       {{--                                                    <input type="radio" id="" name="payment_option" value="stripe" checked>--}}
                                                       {{--                                                    <span>--}}
                                                       {{--                                                        <img src="{{ asset('frontend/images/icons/cards/stripe.png')}}" class="img-fluid">--}}
                                                       {{--                                                    </span>--}}
                                                       {{--                                                </label>--}}
                                                       {{--                                            </li>--}}
                                                       {{--                                        @endif--}}
                                                       {{--                                        @if(\App\BusinessSetting::where('type', 'sslcommerz_payment')->first()->value == 1)--}}
                                                       {{--                                            <li>--}}
                                                       {{--                                                <label class="payment_option">--}}
                                                       {{--                                                    <input type="radio" id="" name="payment_option" value="sslcommerz" checked>--}}
                                                       {{--                                                    <span>--}}
                                                       {{--                                                        <img src="{{ asset('frontend/images/icons/cards/sslcommerz.png')}}" class="img-fluid">--}}
                                                       {{--                                                    </span>--}}
                                                       {{--                                                </label>--}}
                                                       {{--                                            </li>--}}
                                                       {{--                                        @endif--}}
                                                       @if(\App\BusinessSetting::where('type', 'cash_payment')->first()->value == 1)
                                                           <li>
                                                               <label class="payment_option">
                                                                   <input type="radio" id="" name="payment_option" value="cash_on_delivery" checked>
                                                                   <span>
                                                        <img src="{{ asset('frontend/images/icons/cards/cod.c')}}" class="img-fluid">
                                                    </span>
                                                               </label>
                                                           </li>
                                                       @endif
                                                   </ul>
                                                   {{--                                    @if (Auth::check())--}}
                                                   {{--                                        <div class="text-center mt-4">--}}
                                                   {{--                                            or--}}
                                                   {{--                                            <div class="h5">Your wallet balance : <strong>{{ single_price(Auth::user()->balance) }}</strong></div>--}}
                                                   {{--                                            <button onclick="use_wallet()" class="btn btn-base-1" @if(Auth::user()->balance < $total) disabled @endif>Use your Wallet</button>--}}
                                                   {{--                                        </div>--}}
                                                   {{--                                    @endif--}}
                                               </div>

                                        </div>
                                        <div class="row align-items-center pt-4">
                                            <div class="col-6">
                                                <a href="{{ route('home') }}" class="link link--style-3">
                                                    <i class="ion-android-arrow-back"></i>
                                                    {{__('Return to shop')}}
                                                </a>
                                            </div>
                                            <div class="col-6 text-right">
                                                <button type="submit" class="btn btn-styled btn-base-1">{{__('Complete Order')}}</button>
                                            </div>
                                        </div>
                        </form>
                    </div>

                    <div class="col-lg-4 ml-lg-auto">
                        @include('frontend.partials.cart_summary')
                    </div>
                </div>
            </div>
        </section>

        <div class="modal fade" id="coupon_code_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
                <div class="modal-content position-relative">
                    <div class="modal-header">
                        <h5 class="modal-title strong-600 heading-5">{{__('Apply Coupon Code')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="" action="{{ route('checkout.apply_coupon_code') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body gry-bg px-3 pt-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control mb-3" name="code" placeholder="Code" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('cancel')}}</button>
                            <button type="submit" class="btn btn-base-1">{{__('Apply')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

{{--
    <script type="text/javascript">
        function use_wallet(){
            $('input[name=payment_option]').val('wallet');
            $('#checkout-form').submit();
        }

        function coupon_code_modal(){
            $('#coupon_code_modal').modal('show');
        }
    </script> --}}

        <script type="text/javascript">
         $('#vnpay').click(function () {
            // var postData = $("#frmCreateOrder").serialize();
            // var submitUrl = {{route('vnpay.post')}};

            $.ajax({
                type: "POST",
                url:  "{{route('vnpay.post')}}",
                data: {_token: '{{csrf_token()}}'},
                dataType: 'JSON',
                success: function (x) {
                    if (x.code === '00') {
                        if (window.vnpay)
                        {
                            vnpay.open({ width: 768, height: 600, url: x.data });
                        }
                        else
                        {
                            window.location = x.data;
                        }
                     console.log(x.vnp_Amount);
                     // return false;

                    } else {
                        alert("Error:" + x.Message);
                    }
                }
            });
            return false;
        });

        </script>
@endsection


