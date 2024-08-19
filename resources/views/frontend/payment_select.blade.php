@extends('frontend.layouts.app')

@section('content')

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
                        <form action="{{ route('payment.checkout') }}" class="form-default" data-toggle="validator" role="form" method="POST">
                            @csrf
                                        <div class="container">
                                            <div class="row text-white text-left font-weight-bold">
                                                   <ul class="inline-links">\
                                                       @if(\App\BusinessSetting::where('type', 'cash_payment')->first()->value == 1)
                                                       
                                                           <li>
                                                               <label class="payment_option">
                                                                   <input type="radio" id="" name="payment_option" value="cash_on_delivery" checked>
                                                                    <img src="{{ asset('frontend/images/icons/cards/cod.jpg')}}" class="img-fluid" />
                                                               </label>
                                                           </li>
                                                       @endif
                                                   </ul>
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

    <script type="text/javascript">
        function use_wallet(){
            $('input[name=payment_option]').val('wallet');
            $('#checkout-form').submit();
        }

        function coupon_code_modal(){
            $('#coupon_code_modal').modal('show');
        }
    </script>

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


