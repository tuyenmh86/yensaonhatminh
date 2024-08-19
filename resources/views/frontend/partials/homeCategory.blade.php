
  @foreach (\App\HomeCategory::where('status', 1)->get() as $key_home => $homeCategory)
        <section class="mb-4">
            <div class="container">
                <div class="bg-white shadow-sm">
                    <div class="section-title-1 clearfix p-1 mb-1">
                        <h3 class="heading-5 strong-700 mb-0 float-left">
                            <span class="mr-4"><a title="{{ $homeCategory->category->name}}" href="{{ $homeCategory->category->link() }}">{{ $homeCategory->category->name}}</a> </span>
                            
                        </h3>
                         @if(json_decode($homeCategory->subcategories)!=null)
                            <ul class="inline-links float-right nav d-none d-lg-inline-block">
                                @foreach (json_decode($homeCategory->subcategories) as $key => $subcategory)
                                    @if(\App\SubCategory::find($subcategory)!= null)
                                        <li class="@php if($key == 0) echo 'active'; @endphp">
                                            <a href="#subcat-{{ $subcategory }}" data-toggle="tab"
                                               class="d-block @php if($key == 0) echo 'active'; @endphp">{{ \App\SubCategory::find($subcategory)->name }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <div class="tab-content">
                        <div class="row gutters-5 sm-no-gutters">
                            @if($homeCategory->category->banner!=null)
                            <div class="pt-2 col-lg-3 col-md-3 d-none d-md-block d-sm-none{{-- @php if($key_home%2 == 0) echo 'order-2'; @endphp --}}">
                                <a href="{{ $homeCategory->banner_url }}" target="_blank" class="banner-container">
                                    <img src="{{ asset($homeCategory->category->banner) }}" alt="" class="img-fluid">
                                </a>
                            </div>
                            @endif
                            <div class="@if($homeCategory->category->banner!=null) col-lg-9 col-md-9 @else container @endif">
                                @if(json_decode($homeCategory->subcategories)!=null)
                                    @foreach (json_decode($homeCategory->subcategories) as $key => $subcategory)
                                        @if (\App\SubCategory::find($subcategory) != null)
                                            <div class="tab-pane fade @php if($key == 0) echo 'show active'; @endphp"
                                                 id="subsubcat-{{ $subcategory }}">
                                                <div class="row">
                                                    @foreach (filter_products(\App\Product::where('published', 1)->where('subcategory_id', $subcategory))->limit(8)->get() as $key => $product)
                                                        <div class="col-xl-3 col-lg-3 col-md-4 col-6">
                                                            {{-- <div class="product-box-2 bg-white alt-box my-2">
                                                                <div class="position-relative overflow-hidden">
                                                                    <a href="{{ route('product', $product->slug) }}"
                                                                       class="d-block product-image h-100"
                                                                       style="background-image:url('{{ asset($product->thumbnail_img) }}');"
                                                                       tabindex="0">
                                                                    </a>
                                                                    <div class="product-btns clearfix">
                                                                        <button class="btn add-wishlist"
                                                                                title="Add to Wishlist"
                                                                                onclick="addToWishList({{ $product->id }})"
                                                                                tabindex="0">
                                                                            <i class="la la-heart-o"></i>
                                                                        </button>
                                                                        <button class="btn add-compare"
                                                                                title="Add to Compare"
                                                                                onclick="addToCompare({{ $product->id }})"
                                                                                tabindex="0">
                                                                            <i class="la la-refresh"></i>
                                                                        </button>
                                                                        <button class="btn quick-view" title="Quick view"
                                                                                onclick="showAddToCartModal({{ $product->id }})"
                                                                                tabindex="0">
                                                                            <i class="la la-eye"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="p-3 border-top">
                                                                    <h2 class="product-title p-0 text-truncate">
                                                                        <a href="{{ route('product', $product->slug) }}"
                                                                           tabindex="0">{{$product->name}}</a>
                                                                    </h2>
                                                                    <div class="star-rating mb-1">
                                                                        {{ renderStarRating($product->rating) }}
                                                                    </div>
                                                                    <div class="clearfix">
                                                                        <div class="price-box float-left">
                                                                            @if($product->unit_price>0)
                                                                                @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                                                                    <del
                                                                                        class="old-prctoduct-price strong-400">{{ home_base_price($product->id) }}</del>
                                                                                @endif
                                                                                <span
                                                                                    class="product-price strong-600">{{ home_discounted_base_price($product->id) }}</span>
                                                                            @else
                                                                                <span class="product-price strong-600">Liên hệ</span>
                                                                            @endif

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> --}}
                                                            <div class="item-product p-0">
                  {{-- 
                  <div class="product-btns">
                     <button class="btn add-wishlist" title="Add to Wishlist"
                        onclick="addToWishList({{ $product->id }})">
                     <i class="la la-heart-o"></i>
                     </button>
                     <button class="btn add-compare" title="Add to Compare"
                        onclick="addToCompare({{ $product->id }})">
                     <i class="la la-refresh"></i>
                     </button>
                     <button class="btn quick-view" title="Quick view"
                        onclick="showAddToCartModal({{ $product->id }})">
                     <i class="la la-eye"></i>
                     </button>
                  </div>
                  --}}
                  @if($product->discount>0)
                  <div class="product-sale-tags">
                     <span>{{number_format(100-((($product->unit_price-$product->discount)/$product->unit_price)*100),1)}}%</span>
                  </div>
                  @endif
                  <a href="{{ route('product', $product->slug) }}">
                     <div class="img">
                        <picture>
                           <img class="lazyload img-responsive transition" src="{{ asset($product->thumbnail_img) }}" alt="{{$product->name}}" data-original="{{ asset($product->thumbnail_img) }}">
                        </picture>
                     </div>
                     <figcaption>
                        <h4 class="title-h2 line-clamp">{{$product->name}}</h4>
                        <div class="price">
                           @if($product->unit_price>0)
                           @if($product->discount!='')
                           {{format_price(convert_price($product->unit_price-$product->discount )) }} <del>{{format_price($product->unit_price)}}</del>
                           @else
                           {{format_price(convert_price($product->unit_price)) }}
                           @endif
                           @else
                          <a href="http://zalo.me/{{\App\GeneralSetting::first()->zalo}}" class="zalo">
                            <i class="fa fa-commenting-o" aria-hidden="true"></i>
                            <span>Liên hệ</span>
                          </a>
                          @endif 
                        </div>
                  </figcaption>
                  </a>
               </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="row" style="text-align: center;">
                                                    <p class="bg-white" style="width:100%;text-align: center;">
                                                        <a class="btn btn-warning" href="{{\App\SubCategory::find($subcategory)->link()}}">Xem thêm</a>
                                                    </p>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                <div class="row">
                                    <div class="container">
                                        <div class="caorusel-box">
            <div class="slick-carousel" data-slick-items="5" data-slick-lg-items="4" data-slick-md-items="3"
               data-slick-sm-items="2" data-slick-xs-items="2" data-slick-dots="true" data-slick-rows="2">
                                        @foreach (filter_products(\App\Product::where('published', 1)->where('category_id', $homeCategory->category_id))->limit(12)->get() as $key => $product)
                                            <div class="item-product p-0">
                  {{-- 
                  <div class="product-btns">
                     <button class="btn add-wishlist" title="Add to Wishlist"
                        onclick="addToWishList({{ $product->id }})">
                     <i class="la la-heart-o"></i>
                     </button>
                     <button class="btn add-compare" title="Add to Compare"
                        onclick="addToCompare({{ $product->id }})">
                     <i class="la la-refresh"></i>
                     </button>
                     <button class="btn quick-view" title="Quick view"
                        onclick="showAddToCartModal({{ $product->id }})">
                     <i class="la la-eye"></i>
                     </button>
                  </div>
                  --}}
                  @if($product->discount>0)
                  <div class="product-sale-tags">
                     <span>{{number_format(100-((($product->unit_price-$product->discount)/$product->unit_price)*100),1)}}%</span>
                  </div>
                  @endif
                  <a href="{{ route('product', $product->slug) }}">
                     <div class="img">
                        <picture>
                           <img class="lazyload img-responsive transition" src="{{ asset($product->thumbnail_img) }}" alt="{{$product->name}}" data-original="{{ asset($product->thumbnail_img) }}">
                        </picture>
                     </div>
                     <figcaption>
                        <h4 class="title-h2 line-clamp">{{$product->name}}</h4>
                        <div class="price">
                           @if($product->unit_price>0)
                           @if($product->discount!='')
                           {{format_price(convert_price($product->unit_price-$product->discount )) }} <del>{{format_price($product->unit_price)}}</del>
                           @else
                           {{format_price(convert_price($product->unit_price)) }}
                           @endif
                           @else
                          <a href="http://zalo.me/{{\App\GeneralSetting::first()->zalo}}" class="zalo">
                            <i class="fa fa-commenting-o" aria-hidden="true"></i>
                            <span>Zalo: {{\App\GeneralSetting::first()->zalo}}</span>
                          </a>
                          @endif 
                        </div>
                  </figcaption>
                  </a>
               </div>
                                            {{-- <div class="product-box-2 bg-white alt-box my-2">
                                                <div class="position-relative overflow-hidden">
                                                    <a href="{{ route('product', $product->slug) }}"
                                                       class="d-block product-image"
                                                       style="background-image:url('{{ asset($product->thumbnail_img) }}');"
                                                       tabindex="0">
                                                    </a>
                                                    <div class="product-btns clearfix">
                                                        <button class="btn add-wishlist"
                                                                title="Add to Wishlist"
                                                                onclick="addToWishList({{ $product->id }})"
                                                                tabindex="0">
                                                            <i class="la la-heart-o"></i>
                                                        </button>
                                                        <button class="btn add-compare"
                                                                title="Add to Compare"
                                                                onclick="addToCompare({{ $product->id }})"
                                                                tabindex="0">
                                                            <i class="la la-refresh"></i>
                                                        </button>
                                                        <button class="btn quick-view" title="Quick view"
                                                                onclick="showAddToCartModal({{ $product->id }})"
                                                                tabindex="0">
                                                            <i class="la la-eye"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="p-1 border-top">
                                                    <h2 class="product-title p-0 text-truncate">
                                                        <a href="{{ route('product', $product->slug) }}"
                                                           tabindex="0">{{$product->name}}</a>
                                                    </h2>
                                                   <div class="star-rating mb-1">
                                                        {{ renderStarRating($product->rating) }}
                                                    </div>
                                                    <div class="clearfix">
                                                        <div class="price-box float-left">
                                                            @if($product->unit_price>0)
                                                                @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                                                    <del
                                                                        class="old-prctoduct-price strong-400">{{ home_base_price($product->id) }}</del>
                                                                @endif
                                                                <span
                                                                    class="product-price strong-600">{{ home_discounted_base_price($product->id) }}</span>
                                                            @else
                                                                <span class="product-price strong-600">Liên hệ</span>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        @endforeach
                                        </div>
                                    </div>
                                    
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
