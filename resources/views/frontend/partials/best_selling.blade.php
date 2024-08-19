

@if (\App\BusinessSetting::where('type', 'best_selling')->first()->value == 1)
<section class="mb-2">
   <div class="container">
      <div class="p-1 bg-white shadow-sm">
         <div class="section-title-1 clearfix">
            <h3 class="heading-5 strong-700 mb-0 float-left">
               <span class="mr-4">{{__('Best Selling')}}</span>
            </h3>
            {{-- 
            <ul class="inline-links float-right">
               <li><a class="active">{{__('Top 20')}}</a></li>
            </ul>
            --}}
         </div>
         <div class="caorusel-box">
            <div class="slick-carousel" data-slick-items="5" data-slick-lg-items="5" data-slick-md-items="4"
               data-slick-sm-items="2" data-slick-xs-items="2" data-slick-dots="true" data-slick-rows="2">
               @foreach (filter_products(\App\Product::where('published', 1)->orderBy('num_of_sale', 'desc'))->limit(20)->get() as $key => $product)
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
               @endforeach
            </div>
         </div>
      </div>
   </div>
</section>
@endif
{{-- <div class="p-2">
   <div class="row no-gutters product-box-2 align-items-center">
      <div class="col-xs-6 col-6">
         <div class="position-relative overflow-hidden h-100">
            <a href="{{ route('product', $product->slug) }}"
               class="d-block product-image h-100"
               style="background-image:url('{{ asset($product->thumbnail_img) }}');">
            </a>
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
         </div>
      </div>
      <div class="col-xs-6 col-6 border-left">
         <div class="p-3">
            <h2 class="product-title mb-0 p-0 text-truncate-2">
               <a href="{{ route('product', $product->slug) }}">{{ $product->name}}</a>
            </h2>
            <div class="star-rating star-rating-sm mb-2">
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
               <div class="float-right">
                  <button class="add-to-cart btn" title="Add to Cart"
                     onclick="showAddToCartModal ({{ $product->id }})">
                  <i class="la la-shopping-cart"></i>
                  </button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
 --}}
