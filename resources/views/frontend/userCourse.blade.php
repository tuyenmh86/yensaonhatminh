@extends('frontend.layouts.app')

@section('meta_title'){{ $product->meta_title }}@stop

@section('meta_description'){{ $product->meta_description }}@stop

@section('meta_keywords'){{ $product->tags }}@stop

@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $product->meta_title }}">
    <meta itemprop="description" content="{{ $product->meta_description }}">
    <meta itemprop="image" content="{{ asset($product->meta_img) }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="{{ $product->meta_title }}">
    <meta name="twitter:description" content="{{ $product->meta_description }}">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="{{ asset($product->meta_img) }}">
    <meta name="twitter:data1" content="{{ single_price($product->unit_price) }}">
    <meta name="twitter:label1" content="Price">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $product->meta_title }}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="{{ route('product', $product->slug) }}"/>
    <meta property="og:image" content="{{ asset($product->meta_img) }}"/>
    <meta property="og:description" content="{{ $product->meta_description }}"/>
    <meta property="og:site_name" content="{{ env('APP_NAME') }}"/>
    <meta property="og:price:amount" content="{{ single_price($product->unit_price) }}"/>
@endsection
@section('style')
    <style>
        .btn {
            position: relative;
            font-size: 0.875rem;
            font-family: "Open Sans", sans-serif;
            font-style: normal;
            text-align: center;
            border-radius: 2px;
            outline: none;
            -webkit-transition: all 0.2s linear;
            transition: all 0.2s linear;
        }

        .btn {
            white-space: nowrap;
            height: 65px;
        }

        .btn {
            font-weight: 400;
        }

        .btn {
            display: inline-block;
            line-height: 1.25;
            text-align: center;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: 1px solid transparent;
            padding: .5rem 1rem;
            font-size: 1rem;
            -webkit-transition: all .2s ease-in-out;
            -o-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
        }

        .btn-request {
            background-color: #ff6a00;
        }

        .btn-big {
            position: relative;
            width: 100%;
            text-align: left;
            color: #fff;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            padding: 10px 15px 10px 65px;
            margin-top: 10px;
        }


        .btn-seller {

            background-color: #363636;

        }

        .btn-big span {
            display: block;
            color: #f1f1f1;
            padding-top: 3px;
        }

        .btn-big .info-text {
            font-size: 150%;
            color: #ebfa48;
            padding-top: 0;
        }
    </style>
@endsection
@section('content')
    <!-- SHOP GRID WRAPPER -->
    @php
        $sitesetting = \App\GeneralSetting::first();
    @endphp
    <section class="product-details-area">
        <div class="container">

            <div class="bg-white">
                <!-- Product gallery and Description -->
                <div class="row no-gutters cols-xs-space cols-sm-space cols-md-space">
                    <div class="col-lg-6">
                            <div id="lesson_video_content" class="product-gal sticky-top d-flex flex-row-reverse">
                            <video id="lesson_course" width="100%" height="500px;" controls controlsList="nodownload" autoplay>
                                <source id="lesson_video_url" class="lesson_video" src="">
                            </video>

                        </div>
                    </div>

                    <div class="col-lg-6">
                        <!-- Product description -->
                        <div class="product-description-wrapper">
                            <!-- Product title -->
                            <h2 class="product-title">
                                {{ __($product->name) }}
                            </h2>
                            <div class="row">
                                <div class="col-6">
                                    <!-- Rating stars -->
                                    <div class="rating mb-1">
                                        @php
                                            $total = 0;
                                            $total += $product->reviews->count();
                                        @endphp
                                        <span class="star-rating">
                                            {{ renderStarRating($product->rating) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="u-list-course" id="u-list-course">
                                        <div class="content">
                                            <div class="panel-group" id="accordion">
                                                <div class="panel panel-default">
                                                    {{-- Phần học--}}
                                                    @foreach(\App\ProductSession::where('product_id',$product->id)->orderBy('pos','asc')->get() as $keyCourse=>$courseSession)
                                                        <div class="panel-heading">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h4 class="panel-title">
                                                                        <a data-toggle="collapse"
                                                                           data-parent="#accordion"
                                                                           href="#collapse{{$keyCourse}}"
                                                                           class="" aria-expanded="true">
                                                                            <i class="fa fa-minus-square"
                                                                               aria-hidden="true"></i>
                                                                            {{$courseSession->name}}</a>
                                                                    </h4>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{--Bài học--}}
                                                        <div id="collapse{{$keyCourse}}"
                                                             class="panel-collapse"
                                                             aria-expanded="true" style="">
                                                            <div class="panel-body">
                                                                <div class="col">
                                                                    <div class="container-fluid">
                                                                        @foreach(\App\ProductLesson::where('session_id',$courseSession->id)->orderBy('pos','asc')->get() as $keyLesson=>$lesson)

                                                                            <div class="row">
                                                                                <div
                                                                                    class="col-xs-5 col-md-8">
                                                                                    <div class="title">
                                                                                            <a href="javascript:void(0);" onclick="showVideoModal({{$lesson->id}})">
                                                                                            <i class="fa fa-play-circle"
                                                                                               aria-hidden="false"></i>
                                                                                            {{$lesson->name}}
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xs-4 col-md-2">
                                                                                    <div class="link">
                                                                                        &nbsp;
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xs-3 col-md-2">
                                                                                    <div class="time">
                                                                                        {{$lesson->duration}}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="gry-bg">
        <div class="container">
            <div class="my-4 bg-white p-3">
                <div class="section-title-1">
                    <h3 class="heading-5 strong-700 mb-0">
                        <span class="mr-4">Khóa học của bạn</span>
                    </h3>
                </div>
                <div class="caorusel-box">
                    <div class="slick-carousel" data-slick-items="4" data-slick-xl-items="4" data-slick-lg-items="4"
                         data-slick-md-items="4" data-slick-sm-items="2" data-slick-xs-items="1" data-slick-rows="2">
                        @foreach (filter_products(\App\Product::where('category_id', $product->category_id)->where('id', '!=', $product->id))->limit(10)->get() as $key => $related_product)
                            <div class="col-xl-12">
                                <div class="product-box-2 bg-white alt-box my-2">
                                    <div class="position-relative overflow-hidden">
                                        <a href="{{$related_product->link()}}" class="d-block product-image h-100"
                                           style="background-image:url('{{ asset($product->thumbnail_img) }}');"
                                           tabindex="0">
                                        </a>
                                        <div class="product-btns clearfix">
                                            <button class="btn add-wishlist" title="Add to Wishlist"
                                                    onclick="addToWishList({{ $related_product->id }})" tabindex="0">
                                                <i class="la la-heart-o"></i>
                                            </button>
                                            <button class="btn add-compare" title="Add to Compare"
                                                    onclick="addToCompare({{ $related_product->id }})" tabindex="0">
                                                <i class="la la-refresh"></i>
                                            </button>
                                            <button class="btn quick-view" title="Quick view"
                                                    onclick="showAddToCartModal({{ $related_product->id }})"
                                                    tabindex="0">
                                                <i class="la la-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="p-3 border-top">
                                        <h2 class="product-title p-0 text-truncate">
                                            <a href="{{ $related_product->link() }}"
                                               tabindex="0">{{ __($related_product->name) }}</a>
                                        </h2>
                                        <div class="star-rating mb-1">
                                            {{ renderStarRating($related_product->rating) }}
                                        </div>
                                        <div class="clearfix">
                                            <div class="price-box float-left">
                                                @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                                    <del
                                                        class="old-product-price strong-400">{{ home_base_price($product->id) }}</del>
                                                @endif
                                                <span
                                                    class="product-price strong-600">{{ home_discounted_base_price($product->id) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script type="text/javascript">
        function getVideoUrl(id) {
            $.post('{{ route('lesson.getVideoUrl') }}', {_token: '{{ csrf_token() }}', id: id}, function (data) {
                if (data != 0) {
                    // $('video source.lesson_video').attr('src','');
                    $('video source.lesson_video').attr('src',data.video_url);
                    $("video")[0].load();
                    $('video').get(0).play();
                } else {
                     showFrontendAlert('warning', 'Chưa có video cho bài học này');
                }
            });
        }

        $(document).ready(function () {

            // getVariantPrice();

            $('#share').share({
                networks: ['facebook', 'twitter', 'linkedin', 'tumblr', 'in1', 'stumbleupon', 'digg'],
                theme: 'square'
            });
        });

    </script>
@endsection
