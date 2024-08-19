{{--<section class="awe-section-5">--}}
{{--    <div class="section_service lazy"--}}
{{--         data-src=""--}}
{{--         style=""--}}
{{--         data-was-processed="true">--}}
{{--        <div class="container">--}}
{{--            <div class="section_service_title text-center">--}}
{{--                <span>Cơ khí Hải Đông</span>--}}
{{--                <h3>Dịch vụ của chúng tôi</h3>--}}
{{--                <p>Với nhiều năm kinh nghiệm trong lĩnh vực gia công cơ khí, chúng tôi tự hào đang là giải pháp thi công cơ khí tốt nhất.</p>--}}
{{--            </div>--}}
{{--            <div class="row">--}}

{{--                @foreach (\App\CategoriesPost::where('homepage', 1)->where('published', 1)->where('featured',1)->get() as $key => $category)--}}
{{--                <div class="col-lg-4 col-md-6">--}}
{{--                    <div class="services-box">--}}
{{--                        <div class="icon">--}}
{{--                            <img class="lazy loaded"--}}
{{--                                 src="{{isset($category->icon)?asset($category->icon):asset($sitesetting->logo)}}"--}}
{{--                                 data-src="{{isset($category->icon)?asset($category->icon):asset($sitesetting->logo)}}"--}}
{{--                                 alt="{{$category->name}}" data-was-processed="true">--}}
{{--                        </div>--}}
{{--                        <h3>{{$category->name}}</h3>--}}
{{--                        <p>{{$category->description}}</p>--}}
{{--                        <a href="{{route('categories.CategoryPost',['alias'=>$category->alias])}}" title="Xem chi tiết">Xem chi tiết</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}


{{--<section class="awe-section-5">--}}
{{--    <div class="section_service lazy"--}}
{{--         data-src=""--}}
{{--         style=""--}}
{{--         data-was-processed="true">--}}
{{--        <div class="container">--}}
{{--            <div class="section_service_title text-center">--}}
{{--                <span>Cơ khí Hải Đông</span>--}}
{{--                <h3>Dịch vụ của chúng tôi</h3>--}}
{{--                <p>Với nhiều năm kinh nghiệm trong lĩnh vực gia công cơ khí, chúng tôi tự hào đang là giải pháp thi công cơ khí tốt nhất.</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
<section class="mb-4">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-lg-9">
                @foreach (\App\Category::where('parent_id', 0)->where('featured',1)->where('top',1)->get() as $key => $homeCategory)



                    <div class="p-4 bg-white shadow-sm">
                        <div class="section-title-1 clearfix">
                            <h3 class="heading-5 strong-700 mb-0 text-center text-warning padding-bottom-5">
                                <span class="mr-4">{{ $homeCategory->name }}</span>
                            </h3>
                            {{--                    <ul class="inline-links float-right nav d-none d-lg-inline-block">--}}
                            {{--                        @foreach (json_decode($homeCategory->subsubcategories) as $key => $subsubcategory)--}}

                            {{--                            @if (\App\Category::find($subsubcategory) != null)--}}
                            {{--                                <li class="@php if($key == 0) echo 'active'; @endphp">--}}
                            {{--                                    <a href="#subsubcat-{{ $subsubcategory }}" data-toggle="tab" class="d-block @php if($key == 0) echo 'active'; @endphp">{{ \App\Category::find($subsubcategory)->name }}</a>--}}
                            {{--                                </li>--}}
                            {{--                            @endif--}}

                            {{--                        @endforeach--}}
                            {{--                    </ul>--}}
                        </div>
                        <div class="tab-content">

                            {{--                    @foreach (\App\Category::where('parent_id', $homeCategory->id)->where('featured',1)->get() as $key => $subsubcategory)--}}
                            <div class="tab-pane fade show active" id="subsubcat-{{ $homeCategory->id }}">
                                <div class="row gutters-5 sm-no-gutters">
                                    @foreach (\App\Product::where('published', 1)->where('category_id', $homeCategory->id)->limit(6)->get() as $key => $product)
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                            <div class="product-box-2 bg-white alt-box my-2">
                                                <div class="position-relative overflow-hidden">
                                                    <a href="{{ $product->link()}}" class="d-block product-image h-100"
                                                       style="background-image:url('{{ asset($product->thumbnail_img) }}');"
                                                       tabindex="0">
                                                    </a>
                                                    {{--                                                    <div class="product-btns clearfix">--}}
                                                    {{--                                                        <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList({{ $product->id }})" tabindex="0">--}}
                                                    {{--                                                            <i class="la la-heart-o"></i>--}}
                                                    {{--                                                        </button>--}}
                                                    {{--                                                        <button class="btn add-compare" title="Add to Compare" onclick="addToCompare({{ $product->id }})" tabindex="0">--}}
                                                    {{--                                                            <i class="la la-refresh"></i>--}}
                                                    {{--                                                        </button>--}}
                                                    {{--                                                        <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal({{ $product->id }})" tabindex="0">--}}
                                                    {{--                                                            <i class="la la-eye"></i>--}}
                                                    {{--                                                        </button>--}}
                                                    {{--                                                    </div>--}}
                                                </div>
                                                <div class="p-3 border-top">
                                                    <h2 class="product-title p-0">
                                                        <a href="{{ $product->link()}}"
                                                           tabindex="0">{{ __($product->name) }}</a>
                                                    </h2>
                                                    <div class="star-rating mb-1">
                                                        {{ renderStarRating($product->rating) }}
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
                                {{--                                <div class="row gutters-5 sm-no-gutters float-right">--}}
                                {{--                                    <a href="{{\App\Category::find($subsubcategory)->link()}}">Xem thêm các sản phẩm {{\App\Category::find($subsubcategory)->name}}</a>--}}
                                {{--                                </div>--}}
                            </div>
                            {{--                    @endforeach--}}
                        </div>
                    </div>




                @endforeach
            </div>
            <div class="col-md-3 col-lg-3 ">
                <h3>Facebook</h3>
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fgroups%2F2021093778179596%2F&tabs=timeline&width=272px&height=400px&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=169231053723159" width="272px" height="400px" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
            </div>
        </div>
    </div>
</section>
