@extends('frontend.layouts.app')

@section('content')

    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('home') }}">{{__('Home')}}</a></li>
                        <li><a href="{{ route('products') }}">khóa học của bạn</a></li>
                        @if(isset($category_id))
                            <li class="active"><a href="{{ route('products.category', $category_id) }}">{{ \App\Category::find($category_id)->name }}</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="gry-bg py-4">
        <div class="container">
            <div class="row">
                <div class="container p-3 bg-white">
                    <div class="row sm-no-gutters gutters-5">
                        @foreach ($products as $key => $product)
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-12">
                                <div class="product-card-1 mb-2">
                                    <figure class="product-image-container">
                                        <a href="{{ route('product.userCourse',$product->slug) }}" class="product-image d-block" style="background-image:url('{{ asset($product->thumbnail_img) }}');">
                                        </a>
                                        {{--                                                <button class="btn-quickview" onclick="showAddToCartModal({{ $product->id }})"><i class="la la-eye"></i></button>--}}
                                        @if (strtotime($product->created_at) > strtotime('-10 day'))
                                            <span class="product-label label-hot">{{__('New')}}</span>
                                        @endif
                                    </figure>
                                    <div class="product-details text-center">
                                        <h2 class="product-title text-truncate mb-0">
                                            <a href="{{ route('product.userCourse',$product->slug) }}">{{ __($product->name) }}</a>
                                        </h2>
                                        <div class="star-rating star-rating-sm mt-1 mb-2">
                                            {{ renderStarRating($product->rating) }}
                                        </div>
                                        <div class="product-card-1-action">
                                            <a href="{{route('product.userCourse',$product->slug)}}" type="button" class="paction add-cart btn btn-base-1 btn-icon-left">
                                                <i class="fa la mr-0 mr-sm-2"></i><span class="d-none d-sm-inline-block">Vào học</span>
                                            </a>
                                        </div><!-- End .product-action -->
                                    </div><!-- End .product-details -->
                                </div>
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
        </div>
    </section>

@endsection

@section('script')
    <script type="text/javascript">
        function filter(){
            $('#search-form').submit();
        }
        function rangefilter(arg){
            $('input[name=min_price]').val(arg[0]);
            $('input[name=max_price]').val(arg[1]);
            filter();
        }
    </script>
@endsection
