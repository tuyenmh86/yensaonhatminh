<section class="section_flashsale">
    <div class="container">
            <div class="title">
                <h2 class="title-module">
                    <span class="dot"></span> <a href="{{route('san-pham-choi-dot')}}" title="sản phẩm làng nghề chổi đót">Sản phẩm chổi đót Thạnh Hoà</a>
                </h2>
            </div>
            <div class="flash-deal-box ">
                <div class="caorusel-box">  
                    <div class="slick-carousel" data-slick-items="4" data-slick-xl-items="4" data-slick-lg-items="4"  data-slick-md-items="3" data-slick-sm-items="2" data-slick-xs-items="2">
                    @foreach ($products as $key => $product)
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
                    @endforeach
        
                </div>
            </div>
    
    
        </div>
    </div>
    
</section>

<style type="text/css">
    .section_flashsale {
  background-color:#f3eee4;
  background-image:url(//bizweb.dktcdn.net/100/485/241/themes/911577/assets/background_module.png?1705379189922);
  padding:40px 0 30px;
  margin-bottom:40px
}

.section_flashsale .title {
  display:flex;
  justify-content:space-between;
  align-items:center;
  margin-bottom:25px
}
@media (max-width: 767px) {
  .section_flashsale .title {
    flex-direction:column
  }
}
.section_flashsale .title .title-module {
  display:flex;
  align-items:center
}
.section_flashsale .title .title-module .dot {
  width:15px;
  height:15px;
  background:red;
  border-radius:50%;
  position:relative;
  display:inline-block;
  margin-right:20px
}
.section_flashsale .title .title-module .dot:after {
  content:"";
  border-radius:100%;
  display:block;
  width:15px;
  height:15px;
  position:absolute;
  background-color:transparent;
  animation:pulseSmall2 1.25s linear infinite
}
@keyframes pulseSmall2 {
  0% {
    box-shadow: 0 0 0 0 rgba(255, 0, 0, 0.3);
  }
  70% {
    box-shadow: 0 0 0 10px rgba(255, 0, 0, 0);
  }
  100% {
    box-shadow: 0 0 0 0 rgba(255, 0, 0, 0);
  }
}
.section_flashsale .title .thump-flash {
  display:flex;
  align-items:center
}
.section_flashsale .count-down {
  display: inline-flex;
  font-size: 18px;
  padding: 0;
  background: transparent;
  margin-bottom: 0;
  align-items: center;
  position: relative;
}
@media (max-width: 767px) {
  .section_flashsale .title .thump-flash {
    flex-direction:column
  }
}
@media (max-width: 767px) {
  .section_flashsale .title .thump-flash .button-control {
    margin-top:10px
  }
}
.section_flashsale .title .thump-flash .button-control .section-flashsale-prev {
  display:inline-block;
  margin:0 5px 0 20px
}
.section_flashsale .title .thump-flash .button-control .section-flashsale-next {
  display:inline-block
}
.section_flashsale .title .thump-flash .button-control svg path {
  fill:#ca6f04
}
.section_flashsale .count-down {
  display:inline-flex;
  font-size:18px;
  padding:0;
  background:transparent;
  margin-bottom:0;
  align-items:center;
  position:relative
}
@media (max-width: 767px) {
  .section_flashsale .count-down {
    top:0;
    margin-top:10px
  }
}
.section_flashsale .count-down .timer-view {
  display:inline-block;
  text-align:center;
  margin-bottom:0
}
.section_flashsale .count-down .timer-view .block-timer {
  background:#FF3030;
  border-radius:6px;
  display:inline-block;
  color:#fff;
  margin:0px 3px;
  line-height:15px;
  padding:5px;
  min-width:40px
}
.section_flashsale .count-down .timer-view .block-timer p {
  padding-top:0px;
  margin-bottom:0;
  display:block;
  font-size:14px
}
.section_flashsale .count-down .timer-view .block-timer p b {
  font-size:17px;
  display:block
}
.section_flashsale .count-down span {
  display:none
}
.section_flashsale .see-more {
  text-align:center;
  position:relative;
  margin-top:10px;
  font-size:16px;
  margin-bottom:0
}
.section_flashsale .see-more a {
  background-color:#ca6f04;
  background-size:170%;
  color:#fff;
  padding:8px 32px;
  border:0;
  display:inline-block;
  font-size:16px;
  text-transform:uppercase;
  font-weight:600;
  border-radius:40px;
  overflow:hidden;
  position:relative
}
.section_flashsale .see-more a:hover {
  background-color:#985403;
  box-shadow:0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19)
}
.section_flashsale .product-action .product-thumbnail {
  background:#fff
}

.product-action {
  border-radius:5px;
  position:relative
}
@media (min-width: 1025px) {
  .product-action:hover .action {
    opacity: 1;
  }
}
.product-action .product-thumbnail {
  position:relative;
  background:#f3eee4;
  border-radius:10px
}
.product-action .product-thumbnail .image_thumb {
  position:relative;
  overflow:hidden;
  width:100%;
  display:flex;
  -o-justify-content:center;
  -moz-justify-content:center;
  -webkit-justify-content:center;
  -os-justify-content:center;
  -o-display:flex;
  -moz-display:flex;
  -webkit-display:flex;
  -os-display:flex;
  align-items:center;
  position:relative;
  height:auto !important;
  padding-bottom:100%
}
.product-action .product-thumbnail .image_thumb img {
  /* width:auto !important;
  max-height:100%; */
  width:100%;
  height:100%;
  position:absolute;
  top:0;
  bottom:0;
  left:0;
  right:0;
  margin:auto;
  will-change:opacify;
  transform:scale(1);
  transition:all 0.5s ease
}
.product-action .product-info {
  padding:10px 0
}
.product-action .product-info .price-box {
  margin-bottom:5px;
  position:relative;
  color:red;
  font-weight:700;
  font-size:16px;
  text-align:left
}
@media (max-width: 500px) {
  .product-action .product-info .price-box {
    min-height:44px
  }
}
.product-action .product-info .price-box .compare-price {
  color:#666;
  text-decoration:line-through;
  display:inline-block;
  margin-left:10px;
  font-weight:400;
  font-size:14px
}
@media (max-width: 500px) {
  .product-action .product-info .price-box .compare-price {
    display:block;
    margin-left:0;
    font-size:12px
  }
}
.product-action .product-info .product-name {
  font-size:16px;
  text-align:left
}
@media (max-width: 767px) {
  .product-action .product-info .product-name {
    font-size:14px
  }
}
.product-action .action {
  position:absolute;
  right:10px;
  top:10px;
  -webkit-transform:translateY(0%);
  -moz-transform:translateY(0%);
  -ms-transform:translateY(0%);
  -o-transform:translateY(-50%);
  transform:translateY(0%);
  -webkit-transition:all 0.5s;
  -moz-transition:all 0.5s;
  -o-transition:all 0.5s;
  transition:all 0.5s;
  opacity:0;
  z-index:2
}
@media (max-width: 1025px) {
  .product-action .action {
    opacity:1
  }
}
.product-action .action svg{
  width:18px;
  height:18px
}
.product-action .action .btn-views {
  border:0;
  padding:9px 10px;
  border-radius:5px;
  color:#fff;
  margin-bottom:10px;
  background:#ca6f04;
  -webkit-transform:scale(0);
  -moz-transform:scale(0);
  -ms-transform:scale(0);
  -o-transform:scale(0);
  transform:scale(0);
  opacity:0;
  -webkit-transition:all 0.4s ease-in-out;
  -moz-transition:all 0.4s ease-in-out;
  -ms-transition:all 0.4s ease-in-out;
  -o-transition:all 0.4s ease-in-out;
  transition:all 0.4s ease-in-out;
  display:flex
}

@media (max-width: 1025px) {
  .product-action .action .btn-views {
    display:none
  }
}
.product-action .action .btn-views path {
  fill:#fff
}
.product-action .action .btn-views:hover {
  background:#fa8a07
}
.product-action .action .btn-views.btn-wishlist.active {
  background:#ca6f04
}
.product-action .action .btn-views.btn-wishlist.active path {
  fill:red
}
.product-action .smart {
  position:absolute;
  top:0px;
  left:0px;
  text-align:center;
  width:90px;
  height:40px;
  font-size:12px;
  color:white;
  z-index:5;
  line-height:28px;
  padding:0 5px;
  background-image:url(//bizweb.dktcdn.net/100/485/241/themes/911577/assets/union.png?1705566794693);
  background-repeat:no-repeat;
  background-size:contain
}
.product-action .smart span {
  position:relative;
  font-size:13px;
  font-weight:700
}
@media (min-width: 1025px) {
  .product-action:hover .product-thumbnail .scale_hover .image1 {
    opacity:0
  }
  .product-action:hover .product-thumbnail .scale_hover .image2 {
    opacity:1;
    overflow:hidden;
    transform:scale(1.2);
    visibility:visible
  }
  .product-action:hover .action {
    opacity:1
  }
  .product-action:hover .action .btn-views {
    webkit-transform:scale(1);
    -moz-transform:scale(1);
    -ms-transform:scale(1);
    -o-transform:scale(1);
    transform:scale(1);
    opacity:1
  }
}
</style>