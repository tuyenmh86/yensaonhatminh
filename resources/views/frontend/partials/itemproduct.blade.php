
      @foreach($products as $product)
            <div class="item-product p-2 m-2">
        @if($product->discount>0)
        <div class="product-sale-tags">
            <span>{{number_format(100-((($product->unit_price-$product->discount)/$product->unit_price)*100),1)}}%</span>
        </div>
        @endif
        <a href="{{$product->link()}}">
            <div class="img">
                <picture>
                    <img class="lazyload img-responsive transition" src="{{ asset($product->thumbnail_img) }}" alt="{{$product->name}}" data-original="{{ asset($product->thumbnail_img) }}">
                </picture>
            </div>
            <figcaption>
                <h4 class="title-h2 line-clamp">{{$product->name}}</h4>
                <div class="price">
                    @if($product->unit_price>0)
                    {{-- @if($product->discount!='')
                    {{format_price(convert_price($product->unit_price-$product->discount )) }} <del>{{format_price($product->unit_price)}}</del>
                    @else --}}
                    {{format_price(convert_price($product->unit_price)) }}
                    {{-- @endif --}}
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
