@foreach(\App\Category::where('featured',1)->get() as $home_category)
      <div class="row">
        <div class="title-content">
            <i class="fa fa-lightbulb-o" aria-hidden="true"></i> {{$home_category->name}}
            <a class="btn btn-primary" style="float: right" href="{{$home_category->link()}}" title="{{$home_category->name}}">
                <i class="fa fa-angle-double-right" aria-hidden="true"></i> Xem thêm</a>
        </div>
      </div>
    <div class="row">
        @foreach (\App\Product::where('published', 1)->where('featured', '1')->where('category_id',$home_category->id)->limit(12)->get() as $key => $product)
            <div class="col-md-3 col-lg-3 col-6">

            <div class="item-product ">
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
                                    <span>Đặt hàng zalo: {{\App\GeneralSetting::first()->zalo}}</span>
                                </a>
                            @endif
                        </div>
                    </figcaption>
                </a>
            </div>
            </div>
        @endforeach
    </div>

  @endforeach