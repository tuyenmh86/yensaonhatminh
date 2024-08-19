@php
    $flash_deal = \App\FlashDeal::where('status', 1)->first();
@endphp
 @if($flash_deal != null && strtotime(date('d-m-Y')) >= $flash_deal->start_date && strtotime(date('d-m-Y')) <= $flash_deal->end_date || filter_products(\App\Product::where('published', 1)->where('todays_deal', '1'))->count()>0)
<section class="mb-4">
        <div class="container">
            <div class="p-0 bg-white">
                
                
                @if($flash_deal != null && strtotime(date('d-m-Y')) >= $flash_deal->start_date && strtotime(date('d-m-Y')) <= $flash_deal->end_date)
                    <div class="col-lg-12 d-lg-block"> 
                        <div class="section-title-1 clearfix">
                            <h3 class="heading-5 strong-700 mb-0 float-left">
                                <img src="{{ asset('img\flashsale.png') }}">
                                <span class="mr-4">{{$flash_deal->title}}</span>
                                {{-- <span class="badge badge-danger">{{__('Hot')}}</span> --}}
                            </h3>
                            <div class="countdown countdown--style-1 countdown--style-2-v1" data-countdown-date="{{ date('m/d/Y', $flash_deal->end_date) }}" data-countdown-label="show"></div>
                        </div>
                        <div class="flash-deal-box bg-white ">
                            <div class="caorusel-box">  
                                <div class="slick-carousel" data-slick-items="4" data-slick-xl-items="5" data-slick-lg-items="4"  data-slick-md-items="3" data-slick-sm-items="2" data-slick-xs-items="2">
                                @foreach ($flash_deal->flash_deal_products as $key => $flash_deal_product)
                                    @php
                                        $product = \App\Product::find($flash_deal_product->product_id);
                                    @endphp
                                    @if ($product != null)
                                        <div class="product-card-2 card card-product m-0 shop-cards shop-tech">
                                            <div class="card-body p-0">

                                                <div class="card-image">
                                                    <a href="{{ route('product', $product->slug) }}" class="d-block" style="background-image:url('{{ asset($product->flash_deal_img) }}');">
                                                    </a>
                                                </div>

                                                <div class="p-3">
                                                    <div class="price-box">
                                                        @if($product->unit_price>0)
                                                            @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                                                <del class="old-prctoduct-price strong-400">{{ home_base_price($product->id) }}</del>
                                                            @endif
                                                            <span class="product-price strong-600">{{ home_discounted_base_price($product->id) }}</span>
                                                        @else
                                                            <span class="product-price strong-600">Liên hệ</span>
                                                        @endif

                                                    </div>
                                                    <div class="star-rating star-rating-sm mt-1">
                                                        {{ renderStarRating($product->rating) }}
                                                    </div>
                                                    <h2 class="product-title p-0 text-truncate-2">
                                                        <a href="{{ route('product', $product->slug) }}">{{ __($product->name) }}</a>
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                            </div>

                        </div>
                       
                    </div>
                @else
                     @include('frontend.partials.todayDeals')
                @endif
            </div>
    </section>
    @endif