@extends('frontend.layouts.evo-services')

@section('content')
<div class="evo-themes">
    <section class="bread-crumb margin-bottom-10">
        <div class="container">
            <h3>Tất cả sản phẩm</h3>
            <ul class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                <li class="home"><a itemprop="url" href="/" title="Trang chủ"><span
                            itemprop="title">Trang chủ</span></a></li>


                <li><strong><span itemprop="title">Tất cả sản phẩm</span></strong></li>


            </ul>
        </div>
    </section>
    <div class="container padding-top-10">
        <div class="row">
            <aside class="sidebar left-content col-md-12 col-lg-3">
                <aside class="aside-item collection-category d-none d-sm-none d-md-none d-lg-block">
                    <div class="aside-title">Danh mục</div>
                    <div class="aside-content">

                        <ul class="navbar-pills nav-category">


                            <li class="nav-item ">
                                <a class="nav-link" href="/" title="Trang chủ">Trang chủ</a>
                            </li>


                            <li class="nav-item">
                                <a href="/gioi-thieu" class="nav-link" title="Giới thiệu">Giới thiệu</a>
                                <span class="Collapsible__Plus"></span>
                                <ul class="dropdown-menu">


                                    <li class="nav-item ">
                                        <a class="nav-link" href="/gioi-thieu" title="Về chúng tôi">Về chúng tôi</a>
                                    </li>


                                    <li class="nav-item ">
                                        <a class="nav-link" href="/he-thong-cua-hang" title="Hệ thống cửa hàng">Hệ thống
                                            cửa hàng</a>
                                    </li>


                                    <li class="nav-item ">
                                        <a class="nav-link" href="/cau-hoi-thuong-gap" title="Câu hỏi thường gặp">Câu
                                            hỏi thường gặp</a>
                                    </li>


                                </ul>
                            </li>


                            <li class="nav-item">
                                <a href="/collections/all" class="nav-link" title="Sản phẩm">Sản phẩm</a>
                                <span class="Collapsible__Plus"></span>
                                <ul class="dropdown-menu">


                                    <li class="nav-item ">
                                        <a class="nav-link" href="/san-pham-moi" title="Sản phẩm mới">Sản phẩm mới</a>
                                    </li>


                                </ul>
                            </li>


                            <li class="nav-item ">
                                <a href="/blogs/all" class="nav-link" title="Tin tức">Tin tức</a>
                                <span class="Collapsible__Plus"></span>
                                <ul class="dropdown-menu">


                                    <li class="nav-item ">
                                        <a class="nav-link" href="/dich-vu" title="Dịch vụ">Dịch vụ</a>
                                    </li>


                                    <li class="nav-item ">
                                        <a class="nav-link" href="/tuyen-dung" title="Tuyển dụng">Tuyển dụng</a>
                                    </li>


                                    <li class="dropdown-submenu nav-item ">
                                        <a class="nav-link" href="/tin-moi" title="Tin mới">Tin mới</a>
                                        <span class="Collapsible__Plus"></span>
                                        <ul class="dropdown-menu">


                                            <li class="nav-item ">
                                                <a class="nav-link" href="/tin-tuc-khuyen-mai"
                                                   title="Tin tức khuyến mãi">Tin tức khuyến mãi</a>
                                            </li>


                                            <li class="nav-item ">
                                                <a class="nav-link" href="/tin-noi-bat" title="Tin nổi bật">Tin nổi
                                                    bật</a>
                                            </li>


                                        </ul>
                                    </li>


                                </ul>
                            </li>


                            <li class="nav-item ">
                                <a class="nav-link" href="/lien-he" title="Liên hệ">Liên hệ</a>
                            </li>


                        </ul>

                    </div>
                </aside>
                <script src="//bizweb.dktcdn.net/100/367/318/themes/737653/assets/search_filter.js?1576815787127"
                        type="text/javascript"></script>

                <div class="aside-filter clearfix">
                    <div class="heading d-sm-block d-lg-none">Lọc sản phẩm
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                             y="0px" viewBox="0 0 490.656 490.656" style="enable-background:new 0 0 490.656 490.656;"
                             xml:space="preserve" width="25px" height="25px"><path
                                d="M487.536,120.445c-4.16-4.16-10.923-4.16-15.083,0L245.339,347.581L18.203,120.467c-4.16-4.16-10.923-4.16-15.083,0    c-4.16,4.16-4.16,10.923,0,15.083l234.667,234.667c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.136l234.667-234.667    C491.696,131.368,491.696,124.605,487.536,120.445z"
                                data-original="#000000" class="active-path" data-old_color="#000000"
                                fill="#141414"></path></svg>
                    </div>
                    <div class="aside-hidden-mobile">
                        <div class="filter-container">
                            <div class="filter-containers d-none">
                                <div class="filter-container__selected-filter" style="display: none;">
                                    <div class="filter-container__selected-filter-list clearfix">
                                        <ul></ul>
                                        <a href="javascript:void(0)" onclick="clearAllFiltered()"
                                           class="filter-container__clear-all" title="Bỏ hết">Bỏ hết</a>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>


                            <aside class="aside-item filter-vendor">
                                <div class="aside-title">Thương hiệu <i class="fas fa-minus"></i></div>
                                <div class="aside-content filter-group">
                                    <ul class="filter-vendor">


                                        <li class="filter-item filter-item--check-box filter-item--green ">
                                            <label data-filter="bosh" for="filter-bosh" class="bosh">
                                                <input type="checkbox" id="filter-bosh" onchange="toggleFilter(this)"
                                                       data-group="Hãng" data-field="vendor.filter_key" data-text="Bosh"
                                                       value="(&quot;Bosh&quot;)" data-operator="OR">
                                                <i class="fa"></i>

                                                Bosh

                                            </label>
                                        </li>


                                        <li class="filter-item filter-item--check-box filter-item--green ">
                                            <label data-filter="dewalt" for="filter-dewalt" class="dewalt">
                                                <input type="checkbox" id="filter-dewalt" onchange="toggleFilter(this)"
                                                       data-group="Hãng" data-field="vendor.filter_key"
                                                       data-text="DeWALT" value="(&quot;DeWALT&quot;)"
                                                       data-operator="OR">
                                                <i class="fa"></i>

                                                DeWALT

                                            </label>
                                        </li>


                                        <li class="filter-item filter-item--check-box filter-item--green ">
                                            <label data-filter="evo services" for="filter-evo-services"
                                                   class="evo-services">
                                                <input type="checkbox" id="filter-evo-services"
                                                       onchange="toggleFilter(this)" data-group="Hãng"
                                                       data-field="vendor.filter_key" data-text="Evo Services"
                                                       value="(&quot;Evo Services&quot;)" data-operator="OR">
                                                <i class="fa"></i>

                                                Evo Services

                                            </label>
                                        </li>


                                        <li class="filter-item filter-item--check-box filter-item--green ">
                                            <label data-filter="kachi" for="filter-kachi" class="kachi">
                                                <input type="checkbox" id="filter-kachi" onchange="toggleFilter(this)"
                                                       data-group="Hãng" data-field="vendor.filter_key"
                                                       data-text="Kachi" value="(&quot;Kachi&quot;)" data-operator="OR">
                                                <i class="fa"></i>

                                                Kachi

                                            </label>
                                        </li>


                                        <li class="filter-item filter-item--check-box filter-item--green ">
                                            <label data-filter="karcher" for="filter-karcher" class="karcher">
                                                <input type="checkbox" id="filter-karcher" onchange="toggleFilter(this)"
                                                       data-group="Hãng" data-field="vendor.filter_key"
                                                       data-text="Karcher" value="(&quot;Karcher&quot;)"
                                                       data-operator="OR">
                                                <i class="fa"></i>

                                                Karcher

                                            </label>
                                        </li>


                                        <li class="filter-item filter-item--check-box filter-item--green ">
                                            <label data-filter="lock&amp;lock" for="filter-lock-lock" class="lock-lock">
                                                <input type="checkbox" id="filter-lock-lock"
                                                       onchange="toggleFilter(this)" data-group="Hãng"
                                                       data-field="vendor.filter_key" data-text="Lock&amp;Lock"
                                                       value="(&quot;Lock&amp;Lock&quot;)" data-operator="OR">
                                                <i class="fa"></i>

                                                Lock&amp;Lock

                                            </label>
                                        </li>


                                        <li class="filter-item filter-item--check-box filter-item--green ">
                                            <label data-filter="microfiber tashuan" for="filter-microfiber-tashuan"
                                                   class="microfiber-tashuan">
                                                <input type="checkbox" id="filter-microfiber-tashuan"
                                                       onchange="toggleFilter(this)" data-group="Hãng"
                                                       data-field="vendor.filter_key" data-text="Microfiber Tashuan"
                                                       value="(&quot;Microfiber Tashuan&quot;)" data-operator="OR">
                                                <i class="fa"></i>

                                                Microfiber Tashuan

                                            </label>
                                        </li>


                                        <li class="filter-item filter-item--check-box filter-item--green ">
                                            <label data-filter="oem" for="filter-oem" class="oem">
                                                <input type="checkbox" id="filter-oem" onchange="toggleFilter(this)"
                                                       data-group="Hãng" data-field="vendor.filter_key" data-text="OEM"
                                                       value="(&quot;OEM&quot;)" data-operator="OR">
                                                <i class="fa"></i>

                                                OEM

                                            </label>
                                        </li>


                                        <li class="filter-item filter-item--check-box filter-item--green ">
                                            <label data-filter="trust" for="filter-trust" class="trust">
                                                <input type="checkbox" id="filter-trust" onchange="toggleFilter(this)"
                                                       data-group="Hãng" data-field="vendor.filter_key"
                                                       data-text="TRUST" value="(&quot;TRUST&quot;)" data-operator="OR">
                                                <i class="fa"></i>

                                                TRUST

                                            </label>
                                        </li>


                                        <li class="filter-item filter-item--check-box filter-item--green ">
                                            <label data-filter="vati" for="filter-vati" class="vati">
                                                <input type="checkbox" id="filter-vati" onchange="toggleFilter(this)"
                                                       data-group="Hãng" data-field="vendor.filter_key" data-text="Vati"
                                                       value="(&quot;Vati&quot;)" data-operator="OR">
                                                <i class="fa"></i>

                                                Vati

                                            </label>
                                        </li>


                                    </ul>
                                </div>
                            </aside>


                            <aside class="aside-item filter-price">
                                <div class="aside-title">Giá sản phẩm <i class="fas fa-minus"></i></div>
                                <div class="aside-content filter-group">
                                    <ul>


                                        <li class="filter-item filter-item--check-box filter-item--green">
							<span>
								<label for="filter-duoi-100-000d">
									<input type="checkbox" id="filter-duoi-100-000d" onchange="toggleFilter(this);"
                                           data-group="Khoảng giá" data-field="price_min" data-text="Dưới 100.000đ"
                                           value="(<100000)" data-operator="OR">
									<i class="fa"></i>
									Giá dưới 100.000đ
								</label>
							</span>
                                        </li>


                                        <li class="filter-item filter-item--check-box filter-item--green">
							<span>
								<label for="filter-100-000d-200-000d">
									<input type="checkbox" id="filter-100-000d-200-000d" onchange="toggleFilter(this)"
                                           data-group="Khoảng giá" data-field="price_min"
                                           data-text="100.000đ - 200.000đ" value="(>100000 AND <200000)"
                                           data-operator="OR">
									<i class="fa"></i>
									100.000đ - 200.000đ
								</label>
							</span>
                                        </li>


                                        <li class="filter-item filter-item--check-box filter-item--green">
							<span>
								<label for="filter-200-000d-300-000d">
									<input type="checkbox" id="filter-200-000d-300-000d" onchange="toggleFilter(this)"
                                           data-group="Khoảng giá" data-field="price_min"
                                           data-text="200.000đ - 300.000đ" value="(>200000 AND <300000)"
                                           data-operator="OR">
									<i class="fa"></i>
									200.000đ - 300.000đ
								</label>
							</span>
                                        </li>


                                        <li class="filter-item filter-item--check-box filter-item--green">
							<span>
								<label for="filter-300-000d-500-000d">
									<input type="checkbox" id="filter-300-000d-500-000d" onchange="toggleFilter(this)"
                                           data-group="Khoảng giá" data-field="price_min"
                                           data-text="300.000đ - 500.000đ" value="(>300000 AND <500000)"
                                           data-operator="OR">
									<i class="fa"></i>
									300.000đ - 500.000đ
								</label>
							</span>
                                        </li>


                                        <li class="filter-item filter-item--check-box filter-item--green">
							<span>
								<label for="filter-500-000d-1-000-000d">
									<input type="checkbox" id="filter-500-000d-1-000-000d" onchange="toggleFilter(this)"
                                           data-group="Khoảng giá" data-field="price_min"
                                           data-text="500.000đ - 1.000.000đ" value="(>500000 AND <1000000)"
                                           data-operator="OR">
									<i class="fa"></i>
									500.000đ - 1.000.000đ
								</label>
							</span>
                                        </li>
                                        <li class="filter-item filter-item--check-box filter-item--green">
							<span>
								<label for="filter-tren1-000-000d">
									<input type="checkbox" id="filter-tren1-000-000d" onchange="toggleFilter(this)"
                                           data-group="Khoảng giá" data-field="price_min" data-text="Trên 1.000.000đ"
                                           value="(>1000000)" data-operator="OR">
									<i class="fa"></i>
									Giá trên 1.000.000đ
								</label>
							</span>
                                        </li>


                                    </ul>
                                </div>
                            </aside>


                            <aside class="aside-item filter-type">
                                <div class="aside-title">Loại <i class="fas fa-minus"></i></div>
                                <div class="aside-content filter-group">
                                    <ul class="filter-type">


                                        <li class="filter-item filter-item--check-box filter-item--green">
                                            <label data-filter="bộ lau nhà" for="filter-bo-lau-nha">
                                                <input type="checkbox" id="filter-bo-lau-nha"
                                                       onchange="toggleFilter(this)" data-group="Loại"
                                                       data-field="product_type.filter_key" data-text="Bộ lau nhà"
                                                       value="(&quot;Bộ lau nhà&quot;)" data-operator="OR">
                                                <i class="fa"></i>
                                                Bộ lau nhà
                                            </label>
                                        </li>


                                        <li class="filter-item filter-item--check-box filter-item--green">
                                            <label data-filter="hộp dụng cụ" for="filter-hop-dung-cu">
                                                <input type="checkbox" id="filter-hop-dung-cu"
                                                       onchange="toggleFilter(this)" data-group="Loại"
                                                       data-field="product_type.filter_key" data-text="Hộp dụng cụ"
                                                       value="(&quot;Hộp dụng cụ&quot;)" data-operator="OR">
                                                <i class="fa"></i>
                                                Hộp dụng cụ
                                            </label>
                                        </li>


                                        <li class="filter-item filter-item--check-box filter-item--green">
                                            <label data-filter="máy cắt" for="filter-may-cat">
                                                <input type="checkbox" id="filter-may-cat" onchange="toggleFilter(this)"
                                                       data-group="Loại" data-field="product_type.filter_key"
                                                       data-text="Máy cắt" value="(&quot;Máy cắt&quot;)"
                                                       data-operator="OR">
                                                <i class="fa"></i>
                                                Máy cắt
                                            </label>
                                        </li>


                                        <li class="filter-item filter-item--check-box filter-item--green">
                                            <label data-filter="máy khoan" for="filter-may-khoan">
                                                <input type="checkbox" id="filter-may-khoan"
                                                       onchange="toggleFilter(this)" data-group="Loại"
                                                       data-field="product_type.filter_key" data-text="Máy khoan"
                                                       value="(&quot;Máy khoan&quot;)" data-operator="OR">
                                                <i class="fa"></i>
                                                Máy khoan
                                            </label>
                                        </li>


                                        <li class="filter-item filter-item--check-box filter-item--green">
                                            <label data-filter="máy mài" for="filter-may-mai">
                                                <input type="checkbox" id="filter-may-mai" onchange="toggleFilter(this)"
                                                       data-group="Loại" data-field="product_type.filter_key"
                                                       data-text="Máy mài" value="(&quot;Máy mài&quot;)"
                                                       data-operator="OR">
                                                <i class="fa"></i>
                                                Máy mài
                                            </label>
                                        </li>


                                        <li class="filter-item filter-item--check-box filter-item--green">
                                            <label data-filter="máy nén khí" for="filter-may-nen-khi">
                                                <input type="checkbox" id="filter-may-nen-khi"
                                                       onchange="toggleFilter(this)" data-group="Loại"
                                                       data-field="product_type.filter_key" data-text="Máy nén khí"
                                                       value="(&quot;Máy nén khí&quot;)" data-operator="OR">
                                                <i class="fa"></i>
                                                Máy nén khí
                                            </label>
                                        </li>


                                        <li class="filter-item filter-item--check-box filter-item--green">
                                            <label data-filter="máy phun rửa" for="filter-may-phun-rua">
                                                <input type="checkbox" id="filter-may-phun-rua"
                                                       onchange="toggleFilter(this)" data-group="Loại"
                                                       data-field="product_type.filter_key" data-text="Máy phun rửa"
                                                       value="(&quot;Máy phun rửa&quot;)" data-operator="OR">
                                                <i class="fa"></i>
                                                Máy phun rửa
                                            </label>
                                        </li>


                                        <li class="filter-item filter-item--check-box filter-item--green">
                                            <label data-filter="máy phun xịt" for="filter-may-phun-xit">
                                                <input type="checkbox" id="filter-may-phun-xit"
                                                       onchange="toggleFilter(this)" data-group="Loại"
                                                       data-field="product_type.filter_key" data-text="Máy phun xịt"
                                                       value="(&quot;Máy phun xịt&quot;)" data-operator="OR">
                                                <i class="fa"></i>
                                                Máy phun xịt
                                            </label>
                                        </li>


                                        <li class="filter-item filter-item--check-box filter-item--green">
                                            <label data-filter="máy thổi hơi nóng" for="filter-may-thoi-hoi-nong">
                                                <input type="checkbox" id="filter-may-thoi-hoi-nong"
                                                       onchange="toggleFilter(this)" data-group="Loại"
                                                       data-field="product_type.filter_key"
                                                       data-text="Máy thổi hơi nóng"
                                                       value="(&quot;Máy thổi hơi nóng&quot;)" data-operator="OR">
                                                <i class="fa"></i>
                                                Máy thổi hơi nóng
                                            </label>
                                        </li>


                                    </ul>
                                </div>
                            </aside>


                            <aside class="aside-item filter-tag-style-1 tag-filtster">
                                <div class="aside-title">Kích thước <i class="fas fa-minus"></i></div>
                                <div class="aside-content filter-group">
                                    <ul>


                                        <li class="filter-item filter-item--check-box filter-item--green">
							<span>
								<label for="filter-lon">
									<input type="checkbox" id="filter-lon" onchange="toggleFilter(this)"
                                           data-group="tag2" data-field="tags" data-text="Lớn" value="(Lớn)"
                                           data-operator="OR">
									<i class="fa"></i>
									Lớn
								</label>
							</span>
                                        </li>


                                        <li class="filter-item filter-item--check-box filter-item--green">
							<span>
								<label for="filter-nho">
									<input type="checkbox" id="filter-nho" onchange="toggleFilter(this)"
                                           data-group="tag2" data-field="tags" data-text="Nhỏ" value="(Nhỏ)"
                                           data-operator="OR">
									<i class="fa"></i>
									Nhỏ
								</label>
							</span>
                                        </li>


                                        <li class="filter-item filter-item--check-box filter-item--green">
							<span>
								<label for="filter-vua">
									<input type="checkbox" id="filter-vua" onchange="toggleFilter(this)"
                                           data-group="tag2" data-field="tags" data-text="Vừa" value="(Vừa)"
                                           data-operator="OR">
									<i class="fa"></i>
									Vừa
								</label>
							</span>
                                        </li>


                                    </ul>
                                </div>
                            </aside>


                        </div>
                    </div>
                </div>

            </aside>
            <section class="main_container collection col-md-12 col-lg-9">
                <h1 class="col-title d-none">Tất cả sản phẩm</h1>
                <div class="category-products products category-products-grids clearfix">
                    <div class="sort-cate clearfix hidden-xs">
                        <div class="sort-cate-left hidden-xs">
                            <h3>Xếp theo:</h3>
                            <ul>
                                <li class="btn-quick-sort alpha-asc d-none d-lg-block d-md-block">
                                    <a href="javascript:;" onclick="sortby('alpha-asc')" title="Tên A-Z"><i></i>Tên A-Z</a>
                                </li>
                                <li class="btn-quick-sort alpha-desc d-none d-lg-block d-md-block">
                                    <a href="javascript:;" onclick="sortby('alpha-desc')" title="Tên Z-A"><i></i>Tên Z-A</a>
                                </li>
                                <li class="btn-quick-sort position-desc">
                                    <a href="javascript:;" onclick="sortby('created-desc')" title="Hàng mới"><i></i>Hàng
                                        mới</a>
                                </li>
                                <li class="btn-quick-sort price-asc">
                                    <a href="javascript:;" onclick="sortby('price-asc')" title="Giá tăng dần"><i></i>Giá
                                        tăng dần</a>
                                </li>
                                <li class="btn-quick-sort price-desc">
                                    <a href="javascript:;" onclick="sortby('price-desc')" title="Giá giảm dần"><i></i>Giá
                                        giảm dần</a>
                                </li>
                            </ul>
                        </div>
                    </div>


                    <section class="products-view products-view-grid">
                        <div class="clearfix row">


                            <div class="col-6 col-sm-4 col-lg-4">

                                <div class="evo-product-block-item">
                                    <div class="image">
                                        <a class="primary_img"
                                           href="/bo-lau-nha-da-nang-bang-nhua-grandmaid-33l-horeca-trust"
                                           title="Bộ lau nhà đa năng bằng nhựa GRANDMAID 33L HORECA TRUST">
                                            <img class="img-responsive center-block lazy loaded"
                                                 src="//bizweb.dktcdn.net/thumb/large/100/367/318/products/00900d636dcc6a9b1459a8bfe7ffdec0.jpg?v=1571280012000"
                                                 data-src="//bizweb.dktcdn.net/thumb/large/100/367/318/products/00900d636dcc6a9b1459a8bfe7ffdec0.jpg?v=1571280012000"
                                                 alt="Bộ lau nhà đa năng bằng nhựa GRANDMAID 33L HORECA TRUST"
                                                 data-was-processed="true">
                                        </a>

                                    </div>
                                    <div class="product-meta">
                                        <h3><a href="/bo-lau-nha-da-nang-bang-nhua-grandmaid-33l-horeca-trust"
                                               title="Bộ lau nhà đa năng bằng nhựa GRANDMAID 33L HORECA TRUST">Bộ lau
                                                nhà đa năng bằng nhựa GRANDMAID 33L HORECA TRUST</a></h3>
                                        <div class="content_price">


                                            <strong class="money">2.900.000đ</strong>


                                        </div>
                                        <form action="/cart/add" method="post" enctype="multipart/form-data"
                                              class="hidden-md variants form-nut-grid form-ajaxtocart"
                                              data-id="product-actions-16048219">


                                            <input type="hidden" name="variantId" value="28316317">
                                            <a class="button ajax_addtocart add_to_cart"
                                               href="/bo-lau-nha-da-nang-bang-nhua-grandmaid-33l-horeca-trust"
                                               title="Thêm vào giỏ hàng">Thêm vào giỏ hàng</a>


                                        </form>
                                    </div>
                                </div>
                            </div>


                            <div class="col-6 col-sm-4 col-lg-4">

                                <div class="evo-product-block-item">
                                    <div class="image">
                                        <a class="primary_img"
                                           href="/combo-9-tam-van-san-go-vi-nhua-lot-ban-cong-san-vuon-loai-6-nan"
                                           title="Combo 9 tấm ván sàn gỗ vỉ nhựa lót ban công sân vườn - Loại 6 nan">
                                            <img class="img-responsive center-block lazy loaded"
                                                 src="//bizweb.dktcdn.net/thumb/large/100/367/318/products/a130a57aa4feb420df263b93bbb123e1.jpg?v=1571279929000"
                                                 data-src="//bizweb.dktcdn.net/thumb/large/100/367/318/products/a130a57aa4feb420df263b93bbb123e1.jpg?v=1571279929000"
                                                 alt="Combo 9 tấm ván sàn gỗ vỉ nhựa lót ban công sân vườn - Loại 6 nan"
                                                 data-was-processed="true">
                                        </a>

                                    </div>
                                    <div class="product-meta">
                                        <h3><a href="/combo-9-tam-van-san-go-vi-nhua-lot-ban-cong-san-vuon-loai-6-nan"
                                               title="Combo 9 tấm ván sàn gỗ vỉ nhựa lót ban công sân vườn - Loại 6 nan">Combo
                                                9 tấm ván sàn gỗ vỉ nhựa lót ban công sân vườn - Loại 6 nan</a></h3>
                                        <div class="content_price">


                                            <strong class="money">299.000đ</strong>


                                        </div>
                                        <form action="/cart/add" method="post" enctype="multipart/form-data"
                                              class="hidden-md variants form-nut-grid form-ajaxtocart"
                                              data-id="product-actions-16048187">


                                            <input type="hidden" name="variantId" value="28316284">
                                            <a class="button ajax_addtocart add_to_cart"
                                               href="/combo-9-tam-van-san-go-vi-nhua-lot-ban-cong-san-vuon-loai-6-nan"
                                               title="Thêm vào giỏ hàng">Thêm vào giỏ hàng</a>


                                        </form>
                                    </div>
                                </div>
                            </div>


                            <div class="col-6 col-sm-4 col-lg-4">

                                <div class="evo-product-block-item">
                                    <div class="image">
                                        <a class="primary_img" href="/bo-lau-nha-360-do-x17-cay-nhua-vati-tim"
                                           title="Bộ Lau Nhà 360 Độ X17 Cây Nhựa Vati - Tím">
                                            <img class="img-responsive center-block lazy loaded"
                                                 src="//bizweb.dktcdn.net/thumb/large/100/367/318/products/18211be092c1d74dc830d48a2188315f.jpg?v=1571279787000"
                                                 data-src="//bizweb.dktcdn.net/thumb/large/100/367/318/products/18211be092c1d74dc830d48a2188315f.jpg?v=1571279787000"
                                                 alt="Bộ Lau Nhà 360 Độ X17 Cây Nhựa Vati - Tím"
                                                 data-was-processed="true">
                                        </a>
                                        <span class="sale-box">- 33% </span>
                                    </div>
                                    <div class="product-meta">
                                        <h3><a href="/bo-lau-nha-360-do-x17-cay-nhua-vati-tim"
                                               title="Bộ Lau Nhà 360 Độ X17 Cây Nhựa Vati - Tím">Bộ Lau Nhà 360 Độ X17
                                                Cây Nhựa Vati - Tím</a></h3>
                                        <div class="content_price">


                                            <strong class="money">450.000đ</strong>

                                            <span>670.000đ</span>


                                        </div>
                                        <form action="/cart/add" method="post" enctype="multipart/form-data"
                                              class="hidden-md variants form-nut-grid form-ajaxtocart"
                                              data-id="product-actions-16048158">


                                            <input type="hidden" name="variantId" value="28316250">
                                            <a class="button ajax_addtocart add_to_cart"
                                               href="/bo-lau-nha-360-do-x17-cay-nhua-vati-tim"
                                               title="Thêm vào giỏ hàng">Thêm vào giỏ hàng</a>


                                        </form>
                                    </div>
                                </div>
                            </div>


                            <div class="col-6 col-sm-4 col-lg-4">

                                <div class="evo-product-block-item">
                                    <div class="image">
                                        <a class="primary_img" href="/combo-5-bong-lau-thay-the-cay-lau-nha-tu-vat"
                                           title="Combo 5 bông lau thay thế cây lau nhà tự vắt">
                                            <img class="img-responsive center-block lazy loaded"
                                                 src="//bizweb.dktcdn.net/thumb/large/100/367/318/products/833302ae556eeed25e6e49fb18f72d29.jpg?v=1571279715000"
                                                 data-src="//bizweb.dktcdn.net/thumb/large/100/367/318/products/833302ae556eeed25e6e49fb18f72d29.jpg?v=1571279715000"
                                                 alt="Combo 5 bông lau thay thế cây lau nhà tự vắt"
                                                 data-was-processed="true">
                                        </a>

                                    </div>
                                    <div class="product-meta">
                                        <h3><a href="/combo-5-bong-lau-thay-the-cay-lau-nha-tu-vat"
                                               title="Combo 5 bông lau thay thế cây lau nhà tự vắt">Combo 5 bông lau
                                                thay thế cây lau nhà tự vắt</a></h3>
                                        <div class="content_price">


                                            <strong class="money">130.000đ</strong>


                                        </div>
                                        <form action="/cart/add" method="post" enctype="multipart/form-data"
                                              class="hidden-md variants form-nut-grid form-ajaxtocart"
                                              data-id="product-actions-16048150">


                                            <input type="hidden" name="variantId" value="28316234">
                                            <a class="button ajax_addtocart add_to_cart"
                                               href="/combo-5-bong-lau-thay-the-cay-lau-nha-tu-vat"
                                               title="Thêm vào giỏ hàng">Thêm vào giỏ hàng</a>


                                        </form>
                                    </div>
                                </div>
                            </div>


                            <div class="col-6 col-sm-4 col-lg-4">

                                <div class="evo-product-block-item">
                                    <div class="image">
                                        <a class="primary_img" href="/bo-cay-lau-nha-tu-vat-microfiber-tashuan"
                                           title="Bộ cây lau nhà tự vắt Microfiber Tashuan">
                                            <img class="img-responsive center-block lazy loaded"
                                                 src="//bizweb.dktcdn.net/thumb/large/100/367/318/products/f9736f06e4724a0faa0544687c80dda3.jpg?v=1571279594000"
                                                 data-src="//bizweb.dktcdn.net/thumb/large/100/367/318/products/f9736f06e4724a0faa0544687c80dda3.jpg?v=1571279594000"
                                                 alt="Bộ cây lau nhà tự vắt Microfiber Tashuan"
                                                 data-was-processed="true">
                                        </a>

                                    </div>
                                    <div class="product-meta">
                                        <h3><a href="/bo-cay-lau-nha-tu-vat-microfiber-tashuan"
                                               title="Bộ cây lau nhà tự vắt Microfiber Tashuan">Bộ cây lau nhà tự vắt
                                                Microfiber Tashuan</a></h3>
                                        <div class="content_price">


                                            <strong class="money">249.000đ</strong>


                                        </div>
                                        <form action="/cart/add" method="post" enctype="multipart/form-data"
                                              class="hidden-md variants form-nut-grid form-ajaxtocart"
                                              data-id="product-actions-16048122">


                                            <input type="hidden" name="variantId" value="28316196">
                                            <a class="button ajax_addtocart add_to_cart"
                                               href="/bo-cay-lau-nha-tu-vat-microfiber-tashuan"
                                               title="Thêm vào giỏ hàng">Thêm vào giỏ hàng</a>


                                        </form>
                                    </div>
                                </div>
                            </div>


                            <div class="col-6 col-sm-4 col-lg-4">

                                <div class="evo-product-block-item">
                                    <div class="image">
                                        <a class="primary_img"
                                           href="/bo-lau-nha-mini-thep-khong-gi-ettom-lock-lock-etm498-2-bong-lau"
                                           title="Bộ Lau Nhà Mini Thép Không Gỉ Ettom Lock&amp;Lock ETM498 - 2 Bông Lau">
                                            <img class="img-responsive center-block lazy loaded"
                                                 src="//bizweb.dktcdn.net/thumb/large/100/367/318/products/etm498-den-1-u2566-d20160920-t094501-260825-1.jpg?v=1571279500000"
                                                 data-src="//bizweb.dktcdn.net/thumb/large/100/367/318/products/etm498-den-1-u2566-d20160920-t094501-260825-1.jpg?v=1571279500000"
                                                 alt="Bộ Lau Nhà Mini Thép Không Gỉ Ettom Lock&amp;Lock ETM498 - 2 Bông Lau"
                                                 data-was-processed="true">
                                        </a>

                                    </div>
                                    <div class="product-meta">
                                        <h3><a href="/bo-lau-nha-mini-thep-khong-gi-ettom-lock-lock-etm498-2-bong-lau"
                                               title="Bộ Lau Nhà Mini Thép Không Gỉ Ettom Lock&amp;Lock ETM498 - 2 Bông Lau">Bộ
                                                Lau Nhà Mini Thép Không Gỉ Ettom Lock&amp;Lock ETM498 - 2 Bông Lau</a>
                                        </h3>
                                        <div class="content_price">


                                            <strong class="money">394.000đ</strong>


                                        </div>
                                        <form action="/cart/add" method="post" enctype="multipart/form-data"
                                              class="hidden-md variants form-nut-grid form-ajaxtocart"
                                              data-id="product-actions-16048110">


                                            <input type="hidden" name="variantId" value="28316181">
                                            <a class="button ajax_addtocart add_to_cart"
                                               href="/bo-lau-nha-mini-thep-khong-gi-ettom-lock-lock-etm498-2-bong-lau"
                                               title="Thêm vào giỏ hàng">Thêm vào giỏ hàng</a>


                                        </form>
                                    </div>
                                </div>
                            </div>


                            <div class="col-6 col-sm-4 col-lg-4">

                                <div class="evo-product-block-item">
                                    <div class="image">
                                        <a class="primary_img" href="/may-xit-rua-cao-ap-kachi-mk72-1400w"
                                           title="Máy Xịt Rửa Cao Áp Kachi MK72 (1400W)">
                                            <img class="img-responsive center-block lazy loaded"
                                                 src="//bizweb.dktcdn.net/thumb/large/100/367/318/products/20ad7c2198376b5393f62ea905854595.jpg?v=1571279399000"
                                                 data-src="//bizweb.dktcdn.net/thumb/large/100/367/318/products/20ad7c2198376b5393f62ea905854595.jpg?v=1571279399000"
                                                 alt="Máy Xịt Rửa Cao Áp Kachi MK72 (1400W)" data-was-processed="true">
                                        </a>

                                    </div>
                                    <div class="product-meta">
                                        <h3><a href="/may-xit-rua-cao-ap-kachi-mk72-1400w"
                                               title="Máy Xịt Rửa Cao Áp Kachi MK72 (1400W)">Máy Xịt Rửa Cao Áp Kachi
                                                MK72 (1400W)</a></h3>
                                        <div class="content_price">


                                            <strong class="money">1.165.000đ</strong>


                                        </div>
                                        <form action="/cart/add" method="post" enctype="multipart/form-data"
                                              class="hidden-md variants form-nut-grid form-ajaxtocart"
                                              data-id="product-actions-16048067">


                                            <input type="hidden" name="variantId" value="28316097">
                                            <a class="button ajax_addtocart add_to_cart"
                                               href="/may-xit-rua-cao-ap-kachi-mk72-1400w" title="Thêm vào giỏ hàng">Thêm
                                                vào giỏ hàng</a>


                                        </form>
                                    </div>
                                </div>
                            </div>


                            <div class="col-6 col-sm-4 col-lg-4">

                                <div class="evo-product-block-item">
                                    <div class="image">
                                        <a class="primary_img"
                                           href="/may-phun-rua-ap-luc-cao-karcher-k-2360-tang-bo-dau-cha-va-binh-xit"
                                           title="Máy Phun Rửa Áp Lực Cao Karcher K 2360 - Tặng Bộ Đầu Chà Và Bình Xịt">
                                            <img class="img-responsive center-block lazy loaded"
                                                 src="//bizweb.dktcdn.net/thumb/large/100/367/318/products/5fd34a8ddff426eaf556510d76927036.jpg?v=1571279303000"
                                                 data-src="//bizweb.dktcdn.net/thumb/large/100/367/318/products/5fd34a8ddff426eaf556510d76927036.jpg?v=1571279303000"
                                                 alt="Máy Phun Rửa Áp Lực Cao Karcher K 2360 - Tặng Bộ Đầu Chà Và Bình Xịt"
                                                 data-was-processed="true">
                                        </a>
                                        <span class="sale-box">- 10% </span>
                                    </div>
                                    <div class="product-meta">
                                        <h3>
                                            <a href="/may-phun-rua-ap-luc-cao-karcher-k-2360-tang-bo-dau-cha-va-binh-xit"
                                               title="Máy Phun Rửa Áp Lực Cao Karcher K 2360 - Tặng Bộ Đầu Chà Và Bình Xịt">Máy
                                                Phun Rửa Áp Lực Cao Karcher K 2360 - Tặng Bộ Đầu Chà Và Bình Xịt</a>
                                        </h3>
                                        <div class="content_price">


                                            <strong class="money">2.689.000đ</strong>

                                            <span>2.990.000đ</span>


                                        </div>
                                        <form action="/cart/add" method="post" enctype="multipart/form-data"
                                              class="hidden-md variants form-nut-grid form-ajaxtocart"
                                              data-id="product-actions-16048055">


                                            <input type="hidden" name="variantId" value="28316081">
                                            <a class="button ajax_addtocart add_to_cart"
                                               href="/may-phun-rua-ap-luc-cao-karcher-k-2360-tang-bo-dau-cha-va-binh-xit"
                                               title="Thêm vào giỏ hàng">Thêm vào giỏ hàng</a>


                                        </form>
                                    </div>
                                </div>
                            </div>


                            <div class="col-6 col-sm-4 col-lg-4">

                                <div class="evo-product-block-item">
                                    <div class="image">
                                        <a class="primary_img"
                                           href="/bo-dung-cu-van-vit-da-nang-10-chi-tiet-bosch-2607019510-xanh-reu"
                                           title="Bộ dụng cụ vặn vít đa năng 10 chi tiết Bosch 2607019510 (Xanh rêu)">
                                            <img class="img-responsive center-block lazy loaded"
                                                 src="//bizweb.dktcdn.net/thumb/large/100/367/318/products/15706186383390.jpg?v=1570074334940"
                                                 data-src="//bizweb.dktcdn.net/thumb/large/100/367/318/products/15706186383390.jpg?v=1570074334940"
                                                 alt="Bộ dụng cụ vặn vít đa năng 10 chi tiết Bosch 2607019510 (Xanh rêu)"
                                                 data-was-processed="true">
                                        </a>

                                    </div>
                                    <div class="product-meta">
                                        <h3><a href="/bo-dung-cu-van-vit-da-nang-10-chi-tiet-bosch-2607019510-xanh-reu"
                                               title="Bộ dụng cụ vặn vít đa năng 10 chi tiết Bosch 2607019510 (Xanh rêu)">Bộ
                                                dụng cụ vặn vít đa năng 10 chi tiết Bosch 2607019510 (Xanh rêu)</a></h3>
                                        <div class="content_price">


                                            <strong class="money">129.000đ</strong>


                                        </div>
                                        <form action="/cart/add" method="post" enctype="multipart/form-data"
                                              class="hidden-md variants form-nut-grid form-ajaxtocart"
                                              data-id="product-actions-15954841">


                                            <input type="hidden" name="variantId" value="28020658">
                                            <a class="button ajax_addtocart add_to_cart"
                                               href="/bo-dung-cu-van-vit-da-nang-10-chi-tiet-bosch-2607019510-xanh-reu"
                                               title="Thêm vào giỏ hàng">Thêm vào giỏ hàng</a>


                                        </form>
                                    </div>
                                </div>
                            </div>


                            <div class="col-6 col-sm-4 col-lg-4">

                                <div class="evo-product-block-item">
                                    <div class="image">
                                        <a class="primary_img"
                                           href="/may-khoan-dong-luc-bosch-gsb-13-re-set-100-chi-tiet-650w-xanh"
                                           title="Máy khoan động lực Bosch GSB 13 RE SET 100 chi tiết 650W (Xanh)">
                                            <img class="img-responsive center-block lazy loaded"
                                                 src="//bizweb.dktcdn.net/thumb/large/100/367/318/products/14048053854238.jpg?v=1570074333730"
                                                 data-src="//bizweb.dktcdn.net/thumb/large/100/367/318/products/14048053854238.jpg?v=1570074333730"
                                                 alt="Máy khoan động lực Bosch GSB 13 RE SET 100 chi tiết 650W (Xanh)"
                                                 data-was-processed="true">
                                        </a>

                                    </div>
                                    <div class="product-meta">
                                        <h3><a href="/may-khoan-dong-luc-bosch-gsb-13-re-set-100-chi-tiet-650w-xanh"
                                               title="Máy khoan động lực Bosch GSB 13 RE SET 100 chi tiết 650W (Xanh)">Máy
                                                khoan động lực Bosch GSB 13 RE SET 100 chi tiết 650W (Xanh)</a></h3>
                                        <div class="content_price">


                                            <strong class="money">1.672.000đ</strong>


                                        </div>
                                        <form action="/cart/add" method="post" enctype="multipart/form-data"
                                              class="hidden-md variants form-nut-grid form-ajaxtocart"
                                              data-id="product-actions-15954840">


                                            <input type="hidden" name="variantId" value="28020657">
                                            <a class="button ajax_addtocart add_to_cart"
                                               href="/may-khoan-dong-luc-bosch-gsb-13-re-set-100-chi-tiet-650w-xanh"
                                               title="Thêm vào giỏ hàng">Thêm vào giỏ hàng</a>


                                        </form>
                                    </div>
                                </div>
                            </div>


                            <div class="col-6 col-sm-4 col-lg-4">

                                <div class="evo-product-block-item">
                                    <div class="image">
                                        <a class="primary_img"
                                           href="/may-phun-xit-rua-ap-luc-cao-bosch-easy-aquatak-110-1300w-xanh-la"
                                           title="Máy phun xịt rửa áp lực cao Bosch Easy Aquatak 110 1300W (Xanh lá)">
                                            <img class="img-responsive center-block lazy loaded"
                                                 src="//bizweb.dktcdn.net/thumb/large/100/367/318/products/15446513582110.jpg?v=1570074333190"
                                                 data-src="//bizweb.dktcdn.net/thumb/large/100/367/318/products/15446513582110.jpg?v=1570074333190"
                                                 alt="Máy phun xịt rửa áp lực cao Bosch Easy Aquatak 110 1300W (Xanh lá)"
                                                 data-was-processed="true">
                                        </a>

                                    </div>
                                    <div class="product-meta">
                                        <h3><a href="/may-phun-xit-rua-ap-luc-cao-bosch-easy-aquatak-110-1300w-xanh-la"
                                               title="Máy phun xịt rửa áp lực cao Bosch Easy Aquatak 110 1300W (Xanh lá)">Máy
                                                phun xịt rửa áp lực cao Bosch Easy Aquatak 110 1300W (Xanh lá)</a></h3>
                                        <div class="content_price">


                                            <strong class="money">2.099.000đ</strong>


                                        </div>
                                        <form action="/cart/add" method="post" enctype="multipart/form-data"
                                              class="hidden-md variants form-nut-grid form-ajaxtocart"
                                              data-id="product-actions-15954839">


                                            <input type="hidden" name="variantId" value="28020656">
                                            <a class="button ajax_addtocart add_to_cart"
                                               href="/may-phun-xit-rua-ap-luc-cao-bosch-easy-aquatak-110-1300w-xanh-la"
                                               title="Thêm vào giỏ hàng">Thêm vào giỏ hàng</a>


                                        </form>
                                    </div>
                                </div>
                            </div>


                            <div class="col-6 col-sm-4 col-lg-4">

                                <div class="evo-product-block-item">
                                    <div class="image">
                                        <a class="primary_img" href="/may-cat-sat-bosch-gco-200-2000w-3-to-giay-nham"
                                           title="Máy cắt sắt Bosch GCO 200 2000W + 3 tờ giấy nhám">
                                            <img class="img-responsive center-block lazy loaded"
                                                 src="//bizweb.dktcdn.net/thumb/large/100/367/318/products/9604899471390.jpg?v=1570074332350"
                                                 data-src="//bizweb.dktcdn.net/thumb/large/100/367/318/products/9604899471390.jpg?v=1570074332350"
                                                 alt="Máy cắt sắt Bosch GCO 200 2000W + 3 tờ giấy nhám"
                                                 data-was-processed="true">
                                        </a>

                                    </div>
                                    <div class="product-meta">
                                        <h3><a href="/may-cat-sat-bosch-gco-200-2000w-3-to-giay-nham"
                                               title="Máy cắt sắt Bosch GCO 200 2000W + 3 tờ giấy nhám">Máy cắt sắt
                                                Bosch GCO 200 2000W + 3 tờ giấy nhám</a></h3>
                                        <div class="content_price">


                                            <strong class="money">2.649.000đ</strong>


                                        </div>
                                        <form action="/cart/add" method="post" enctype="multipart/form-data"
                                              class="hidden-md variants form-nut-grid form-ajaxtocart"
                                              data-id="product-actions-15954838">


                                            <input type="hidden" name="variantId" value="28020655">
                                            <a class="button ajax_addtocart add_to_cart"
                                               href="/may-cat-sat-bosch-gco-200-2000w-3-to-giay-nham"
                                               title="Thêm vào giỏ hàng">Thêm vào giỏ hàng</a>


                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>


                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 margin-top-10 fix-pag">
                            <nav class="text-center">
                                <ul class="pagination clearfix">

                                    <li class="page-item disabled"><a class="page-link" href="#" title="«">«</a></li>


                                    <li class="active page-item disabled"><a class="page-link" href="javascript:;"
                                                                             title="1">1</a></li>


                                    <li class="page-item"><a class="page-link" onclick="doSearch(2)" href="javascript:;"
                                                             title="2">2</a></li>


                                    <li class="page-item"><a class="page-link" onclick="doSearch(3)" href="javascript:;"
                                                             title="3">3</a></li>


                                    <li class="page-item"><a class="page-link" onclick="doSearch(2)" href="javascript:;"
                                                             title="»">»</a></li>

                                </ul>
                            </nav>
                        </div>
                    </div>


                </div>
            </section>
        </div>
    </div>
</div>
@endsection
