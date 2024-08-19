
@foreach (\App\HomeCategory::where('status', 1)->get() as $key => $homeCategory)

        <section class="awe-section-7">
    <div class="section_project">
        <div class="container">
            <div class="section_service_title text-center">
                <span>Cửa hàng</span>
                <h3><a href="san-pham-moi" title="Dụng cụ lau dọn nhà cửa">Dụng </a></h3>
                <p>Mua các vật dụng, dụng cụ lau dọn nhà cửa, với chất liệu bền đẹp, cao cấp, các vật dụng lau dọn nhà
                    cửa sẽ luôn giữ cho gia đình bạn thật sạch sẽ, gọn gàng.</p>
            </div>
            <div class="row">

                @foreach (\App\Product::where('published', 1)->where('category_id', $homeCategory->category->id)->limit(6)->get() as $key => $product)

                <div class="col-lg-3 col-md-3 col-6">

                    <div class="evo-product-block-item">
                        <div class="image">
                            <a class="primary_img" href="{{$product->link()}}"
                               title="{{$product->name}}">
                                <img class="img-responsive center-block lazy loaded"
                                     src="{{asset($product->featured_img)}}"
                                     data-src="{{asset($product->featured_img)}}"
                                     alt="{{$product->name}}"
                                     data-was-processed="true">
                            </a>

                        </div>
                        <div class="product-meta">
                            <h3><a href="{{$product->link()}}"
                                   title="{{$product->name}}">{{$product->name}}</a></h3>
{{--                            <div class="content_price">--}}


{{--                                <strong class="money">2.900.000đ</strong>--}}


{{--                            </div>--}}
{{--                            <form action="/cart/add" method="post" enctype="multipart/form-data"--}}
{{--                                  class="hidden-md variants form-nut-grid form-ajaxtocart has-validation-callback"--}}
{{--                                  data-id="product-actions-16048219">--}}


{{--                                <input type="hidden" name="variantId" value="28316317">--}}
{{--                                <a class="button ajax_addtocart add_to_cart"--}}
{{--                                   href="/bo-lau-nha-da-nang-bang-nhua-grandmaid-33l-horeca-trust"--}}
{{--                                   title="Thêm vào giỏ hàng">Thêm vào giỏ hàng</a>--}}
{{--                            </form>--}}
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>
</section>
@endforeach
