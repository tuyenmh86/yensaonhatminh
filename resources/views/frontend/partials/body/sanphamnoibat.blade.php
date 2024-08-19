<section class="section_product_noibat e-tabs not-dqtab ajax-tab-1" data-section="ajax-tab-1" data-view="grid_4">
    <div class="container">
        <div class="thumb-title row">
            <h2 class="col-lg-4 title-module">
                Sản phẩm nổi bật
            </h2>
            <ul class="col-lg-8 tabs tabs-title tab-desktop ajax clearfix">
               

                <li class="tab-link has-content current" data-tab="tab1" data-url="san-pham-noi-bat">
                    <span class="line-clamp line-clamp-1" title="Tất cả">
                        Tất cả
                    </span>
                </li>
                <li class="tab-link has-content" data-tab="tab-2" data-url="bo-tra">
                    <span class="line-clamp line-clamp-1" title="Bộ Trà">
                        Bộ Trà
                    </span>
                </li>
                <li class="tab-link has-content" data-tab="tab-3" data-url="ca-phe">
                    <span class="line-clamp line-clamp-1" title="Cà phê">
                        Cà phê
                    </span>
                </li>
                <li class="tab-link has-content" data-tab="tab-5" data-url="phu-kien-tra">
                    <span class="line-clamp line-clamp-1" title="Phụ kiện trà - cà phê">
                        Phụ kiện trà - cà phê
                    </span>
                </li>
            </ul>
        </div>
        <div class="tab-1 tab-content">
            <div class="row row-fix">
                @php
                    $product = \App\Product::find($flash_deal_product->product_id);
                @endphp
                
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 col-fix">
                    @if ($product != null)
                        <div class="product-action">
                            <div class="product-thumbnail">
                                <a class="image_thumb" href="{{$product->link()}}"
                                    title="{{$product->title}}">
                                    <img width="234" height="234" class="lazyload"
                                        src="{{asset($product->thumbnail_img)}}"
                                        data-src="{{asset($product->thumbnail_img)}}"
                                        alt="{{$product->description}}" data-was-processed="true">

                                </a>
                                @if($product->discount!=0)
                                <div class="smart">
                                    <span>Giảm
                                    {{number_format(100-((($product->unit_price-$product->discount)/$product->unit_price)*100),1)}}%
                                    </span>
                                    
                                </div>
                                @endif
                                
                                <div class="action">
                                    <button class="btn-cart btn-views add_to_cart " title="Thêm vào giỏ" onclick="showAddToCartModal({{ $product->id }})">
                                        <i class="fa la la-shopping-cart"></i>
                                    </button>
                                    
                                    <a href="javascript:void(0)" class="setWishlist btn-wishlist btn-views" data-wish="{{$product->id}}" tabindex="0" title="Thêm vào yêu thích" onclick="addToWishList({{ $product->id }})">
                                        <i class="fa la la-heart-o"></i>
                                    </a>
                                    
                                    <a title="Xem nhanh" href="{{$product->link()}}" data-handle="" class="quick-view btn-views" onclick="showAddToCartModal({{ $product->id }})">
                                        <i class="la la-eye"></i>
                                    </a>
                                </div>
                        
                            </div>
                            <div class="product-info">
                                <h3 class="product-name"><a class="line-clamp line-clamp-2" href="{{($product->link()) }}" title="{{ __($product->name) }}">{{ __($product->name) }}</a></h3>
                                <div class="price-box">
                                    @if($product->unit_price>0)
                                        @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                            <del class="old-prctoduct-price strong-400">{{ home_base_price($product->id) }}</del>
                                        @else
                                            <span class="product-price strong-600">{{ home_discounted_base_price($product->id) }}</span>
                                    
                                        @endif  
                                    @else
                                        <span class="product-price strong-600">Liên hệ</span>
                                    @endif
                        
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="see-more">
                <a title="Xem tất cả" href="/san-pham-noi-bat">Xem tất cả</a>
            </div>
        </div>
    </div>
</section>