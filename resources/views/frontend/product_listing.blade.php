@extends('frontend.layouts.app')

@section('content')
@include('frontend.partials.subCategoryList')
    <section class="bg-white mt-4">
        
            <div class="container bg-white">
                <div class="row">
                    <div class="container">
                    <div class="row sm-no-gutters gutters-5">
                        @foreach ($products as $key => $product)
                                <div class="item-product p-2 m-2">
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
                                                @if($product->discount!='')
                                                    {{format_price(convert_price($product->unit_price-$product->discount )) }} <del>{{format_price($product->unit_price)}}</del>
                                                @else
                                                    @if($product->unit_price>0)
                                                    {{format_price(convert_price($product->unit_price)) }}
                                                    @else
                                                        Liên Hệ
                                                    @endif
                                                @endif
                                            </div>
                                        </figcaption>
                                    </a>
                                </div>
                        @endforeach
                    </div>
                    <nav aria-label="Center aligned pagination">
                        <ul class="pagination justify-content-center">
                            {{ $products->links() }}
                        </ul>
                    </nav>
                </div>
                
                   
            </div>
            <hr/>
        </div>
    </section>
    
    <section class="bg-white mt-4">
        <div class="container">
            @isset($category)
                <p class="p-3">{!! $category->description !!}</p>
            @endisset
        </div>
    </section>
@endsection
