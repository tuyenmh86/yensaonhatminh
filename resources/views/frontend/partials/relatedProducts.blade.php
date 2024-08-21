  <div class="my-4 bg-white">
                        <div class="section-title-1">
                            <h3 class="heading-5 strong-700 mb-0">
                                <span class="mr-4">{{__('Related products')}}</span>
                            </h3>
                        </div>
                        <div class="1caorusel-box">
                            <div class="responsive_slick_1row" data-slick-items="4" data-slick-xl-items="4" data-slick-lg-items="4"  data-slick-md-items="4" data-slick-sm-items="2" data-slick-xs-items="2"  data-slick-rows="1">
                                @foreach (filter_products(\App\Product::where('category_id', $product->category_id)->where('id', '!=', $product->id))->limit(10)->get() as $key => $related_product)
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
                  @if($related_product->discount>0)
                  <div class="product-sale-tags">
                     <span>{{number_format(100-((($related_product->unit_price-$related_product->discount)/$related_product->unit_price)*100),1)}}%</span>
                  </div>
                  @endif
                  <a href="{{ route('product', $related_product->slug) }}">
                     <div class="img">
                        <picture>
                           <img class="lazyload img-responsive transition" src="{{ asset($related_product->thumbnail_img) }}" alt="{{$related_product->name}}" data-original="{{ asset($related_product->thumbnail_img) }}">
                        </picture>
                     </div>
                     <figcaption>
                        <h4 class="title-h2 line-clamp">{{$related_product->name}}</h4>
                        <div class="price">
                           @if($related_product->unit_price>0)
                           @if($related_product->discount!='')
                           {{format_price(convert_price($related_product->unit_price-$related_product->discount )) }} <del>{{format_price($related_product->unit_price)}}</del>
                           @else
                           {{format_price(convert_price($related_product->unit_price)) }}
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
                                @endforeach
                                    {{-- @foreach (filter_products(\App\Product::where('category_id', $product->category_id)->where('id', '!=', $product->id))->get() as $key => $related_product)
                                        <div class="col-md-3 col-lg-3 col-6">
                                            <div class="item-product ">
                                                @if($related_product->discount!='')
                                                    <div class="product-sale-tags">
                                                        <span>{{number_format(100-((($related_product->unit_price-$related_product->discount)/$related_product->unit_price)*100),1)}}%</span>
                                                    </div>
                                                @endif
                                                <a href="{{ route('product', $related_product->slug) }}">
                                                    <div class="img">
                                                        <picture>
                                                            <img class="lazyload img-responsive transition" src="{{ asset($related_product->thumbnail_img) }}" alt="{{$related_product->name}}" data-original="{{ asset($related_product->thumbnail_img) }}">
                                                        </picture>
                                                    </div>
                                                    <figcaption>
                                                        <h4 class="title-h2 line-clamp">{{$related_product->name}}</h4>
                                                        <div class="price">
                                                            @if($related_product->discount!='')
                                                                {{format_price(convert_price($related_product->unit_price-$related_product->discount )) }} <del>{{format_price($related_product->unit_price)}}</del>
                                                            @else
                                                                {{format_price(convert_price($related_product->unit_price)) }}
                                                            @endif
                                                        </div>
                                                    </figcaption>
                                                </a>
                                            </div>
                                        </div>

                                    @endforeach --}}
                            </div>
                        </div>
                    </div>