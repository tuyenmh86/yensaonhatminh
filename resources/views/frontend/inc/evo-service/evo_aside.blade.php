@extends('frontend.layouts.evo-services')

@section('content')

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
                            <a class="nav-link" href="/he-thong-cua-hang" title="Hệ thống cửa hàng">Hệ thống cửa
                                hàng</a>
                        </li>


                        <li class="nav-item ">
                            <a class="nav-link" href="/cau-hoi-thuong-gap" title="Câu hỏi thường gặp">Câu hỏi thường
                                gặp</a>
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
                                    <a class="nav-link" href="/tin-tuc-khuyen-mai" title="Tin tức khuyến mãi">Tin tức
                                        khuyến mãi</a>
                                </li>


                                <li class="nav-item ">
                                    <a class="nav-link" href="/tin-noi-bat" title="Tin nổi bật">Tin nổi bật</a>
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
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 490.656 490.656" style="enable-background:new 0 0 490.656 490.656;" xml:space="preserve"
                 width="25px" height="25px"><path
                    d="M487.536,120.445c-4.16-4.16-10.923-4.16-15.083,0L245.339,347.581L18.203,120.467c-4.16-4.16-10.923-4.16-15.083,0    c-4.16,4.16-4.16,10.923,0,15.083l234.667,234.667c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.136l234.667-234.667    C491.696,131.368,491.696,124.605,487.536,120.445z"
                    data-original="#000000" class="active-path" data-old_color="#000000" fill="#141414"></path></svg>
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
                                           data-group="Hãng" data-field="vendor.filter_key" data-text="DeWALT"
                                           value="(&quot;DeWALT&quot;)" data-operator="OR">
                                    <i class="fa"></i>

                                    DeWALT

                                </label>
                            </li>


                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <label data-filter="evo services" for="filter-evo-services" class="evo-services">
                                    <input type="checkbox" id="filter-evo-services" onchange="toggleFilter(this)"
                                           data-group="Hãng" data-field="vendor.filter_key" data-text="Evo Services"
                                           value="(&quot;Evo Services&quot;)" data-operator="OR">
                                    <i class="fa"></i>

                                    Evo Services

                                </label>
                            </li>


                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <label data-filter="kachi" for="filter-kachi" class="kachi">
                                    <input type="checkbox" id="filter-kachi" onchange="toggleFilter(this)"
                                           data-group="Hãng" data-field="vendor.filter_key" data-text="Kachi"
                                           value="(&quot;Kachi&quot;)" data-operator="OR">
                                    <i class="fa"></i>

                                    Kachi

                                </label>
                            </li>


                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <label data-filter="karcher" for="filter-karcher" class="karcher">
                                    <input type="checkbox" id="filter-karcher" onchange="toggleFilter(this)"
                                           data-group="Hãng" data-field="vendor.filter_key" data-text="Karcher"
                                           value="(&quot;Karcher&quot;)" data-operator="OR">
                                    <i class="fa"></i>

                                    Karcher

                                </label>
                            </li>


                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <label data-filter="lock&amp;lock" for="filter-lock-lock" class="lock-lock">
                                    <input type="checkbox" id="filter-lock-lock" onchange="toggleFilter(this)"
                                           data-group="Hãng" data-field="vendor.filter_key" data-text="Lock&amp;Lock"
                                           value="(&quot;Lock&amp;Lock&quot;)" data-operator="OR">
                                    <i class="fa"></i>

                                    Lock&amp;Lock

                                </label>
                            </li>


                            <li class="filter-item filter-item--check-box filter-item--green ">
                                <label data-filter="microfiber tashuan" for="filter-microfiber-tashuan"
                                       class="microfiber-tashuan">
                                    <input type="checkbox" id="filter-microfiber-tashuan" onchange="toggleFilter(this)"
                                           data-group="Hãng" data-field="vendor.filter_key"
                                           data-text="Microfiber Tashuan" value="(&quot;Microfiber Tashuan&quot;)"
                                           data-operator="OR">
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
                                           data-group="Hãng" data-field="vendor.filter_key" data-text="TRUST"
                                           value="(&quot;TRUST&quot;)" data-operator="OR">
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
                                    <input type="checkbox" id="filter-bo-lau-nha" onchange="toggleFilter(this)"
                                           data-group="Loại" data-field="product_type.filter_key" data-text="Bộ lau nhà"
                                           value="(&quot;Bộ lau nhà&quot;)" data-operator="OR">
                                    <i class="fa"></i>
                                    Bộ lau nhà
                                </label>
                            </li>


                            <li class="filter-item filter-item--check-box filter-item--green">
                                <label data-filter="hộp dụng cụ" for="filter-hop-dung-cu">
                                    <input type="checkbox" id="filter-hop-dung-cu" onchange="toggleFilter(this)"
                                           data-group="Loại" data-field="product_type.filter_key"
                                           data-text="Hộp dụng cụ" value="(&quot;Hộp dụng cụ&quot;)" data-operator="OR">
                                    <i class="fa"></i>
                                    Hộp dụng cụ
                                </label>
                            </li>


                            <li class="filter-item filter-item--check-box filter-item--green">
                                <label data-filter="máy cắt" for="filter-may-cat">
                                    <input type="checkbox" id="filter-may-cat" onchange="toggleFilter(this)"
                                           data-group="Loại" data-field="product_type.filter_key" data-text="Máy cắt"
                                           value="(&quot;Máy cắt&quot;)" data-operator="OR">
                                    <i class="fa"></i>
                                    Máy cắt
                                </label>
                            </li>


                            <li class="filter-item filter-item--check-box filter-item--green">
                                <label data-filter="máy khoan" for="filter-may-khoan">
                                    <input type="checkbox" id="filter-may-khoan" onchange="toggleFilter(this)"
                                           data-group="Loại" data-field="product_type.filter_key" data-text="Máy khoan"
                                           value="(&quot;Máy khoan&quot;)" data-operator="OR">
                                    <i class="fa"></i>
                                    Máy khoan
                                </label>
                            </li>


                            <li class="filter-item filter-item--check-box filter-item--green">
                                <label data-filter="máy mài" for="filter-may-mai">
                                    <input type="checkbox" id="filter-may-mai" onchange="toggleFilter(this)"
                                           data-group="Loại" data-field="product_type.filter_key" data-text="Máy mài"
                                           value="(&quot;Máy mài&quot;)" data-operator="OR">
                                    <i class="fa"></i>
                                    Máy mài
                                </label>
                            </li>


                            <li class="filter-item filter-item--check-box filter-item--green">
                                <label data-filter="máy nén khí" for="filter-may-nen-khi">
                                    <input type="checkbox" id="filter-may-nen-khi" onchange="toggleFilter(this)"
                                           data-group="Loại" data-field="product_type.filter_key"
                                           data-text="Máy nén khí" value="(&quot;Máy nén khí&quot;)" data-operator="OR">
                                    <i class="fa"></i>
                                    Máy nén khí
                                </label>
                            </li>


                            <li class="filter-item filter-item--check-box filter-item--green">
                                <label data-filter="máy phun rửa" for="filter-may-phun-rua">
                                    <input type="checkbox" id="filter-may-phun-rua" onchange="toggleFilter(this)"
                                           data-group="Loại" data-field="product_type.filter_key"
                                           data-text="Máy phun rửa" value="(&quot;Máy phun rửa&quot;)"
                                           data-operator="OR">
                                    <i class="fa"></i>
                                    Máy phun rửa
                                </label>
                            </li>


                            <li class="filter-item filter-item--check-box filter-item--green">
                                <label data-filter="máy phun xịt" for="filter-may-phun-xit">
                                    <input type="checkbox" id="filter-may-phun-xit" onchange="toggleFilter(this)"
                                           data-group="Loại" data-field="product_type.filter_key"
                                           data-text="Máy phun xịt" value="(&quot;Máy phun xịt&quot;)"
                                           data-operator="OR">
                                    <i class="fa"></i>
                                    Máy phun xịt
                                </label>
                            </li>


                            <li class="filter-item filter-item--check-box filter-item--green">
                                <label data-filter="máy thổi hơi nóng" for="filter-may-thoi-hoi-nong">
                                    <input type="checkbox" id="filter-may-thoi-hoi-nong" onchange="toggleFilter(this)"
                                           data-group="Loại" data-field="product_type.filter_key"
                                           data-text="Máy thổi hơi nóng" value="(&quot;Máy thổi hơi nóng&quot;)"
                                           data-operator="OR">
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

@endsection
@section('script')
    <script type="text/javascript">
        window.Bizweb || (window.Bizweb = {})

        Bizweb.SearchOperators = {
            OR: "OR",
            AND: "AND",
            NOT: "NOT"
        }

        Bizweb.SearchField = function () {
            function SearchField (name) {
                this.name = name;
                this.values = [];
            }

            SearchField.prototype.addValue = function (value, operator) {
                this.values.push({ value: value, operator: operator });
            }
            SearchField.prototype.deleteValue = function (value, operator) {
                var index = -1;

                for (var i = 0; i < this.values.length; i++) {
                    if(this.values[i].value === value && this.values[i].operator === operator)
                        index = i;
                }

                this.values.splice(index, 1);

            }

            SearchField.prototype.deleteValuedqdt = function (value, operator) {
                var index = -1;

                for (var i = 0; i < this.values.length; i++) {
                    if(this.values[i].value === value && this.values[i].operator === operator)
                        index = i;
                }
                console.log(index);
                if(index > -1){
                    this.values.splice(index, 1);
                    console.log(this);
                    alert('ok');
                }

            }

            SearchField.prototype.buildParam = function () {
                var value = "";

                for (var i = 0; i < this.values.length; i++) {
                    if (i == 0) {
                        value += this.values[i].value;
                    }
                    else{
                        value += this._buildValue(this.values[i]);
                    }
                }

                if (this.values.length > 1) {
                    value = "(" + value + ")"
                }

                if(value !== "")
                    return this.name + ":" + value

                return null;
            }
            SearchField.prototype._buildValue = function (value) {
                switch (value.operator.toUpperCase()){
                    case Bizweb.SearchOperators.OR:
                        return " OR " + value.value;
                    case Bizweb.SearchOperators.AND:
                        return " AND " + value.value;
                    case Bizweb.SearchOperators.NOT:
                        return " -" + value.value;
                    default:
                        return " " + value.value;
                }
            }

            SearchField.name = "SearchField";
            return SearchField;
        }();

        Bizweb.SearchFilter = function () {
            function SearchFilter (){
                this.fields = {};
            }

            SearchFilter.prototype.addValue = function (group, field, value, operator) {
                var searchField = this.findOrCreateField(group, field);

                return searchField.addValue(value, operator);
            }

            SearchFilter.prototype.findOrCreateField = function (group, field) {
                var searchField = this.fields[group];
                if(!searchField) {
                    searchField = new Bizweb.SearchField(field);
                    this.fields[group] = searchField;
                }

                return searchField;
            }

            SearchFilter.prototype.deleteValue = function (group, field, value, operator) {
                var searchField = this.findOrCreateField(group, field);

                return searchField.deleteValue(value, operator);
            }

            SearchFilter.prototype.deleteValuedqdt = function (group, field, value, operator) {
                var searchField = this.findOrCreateField('Khoáº£ng giÃ¡', 'price_min');

                return searchField.deleteValue(value, 'OR');
            }


            SearchFilter.prototype.deleteGroup = function (group) {
                delete this.fields[group];
            }

            SearchFilter.prototype.search = function (settings) {
                if(!settings)
                    settings = {};

                var url = this.buildSearchUrl(settings);

                if(settings.success)
                    this._search(url, settings.success);
            }

            SearchFilter.prototype.buildSearchUrl = function (settings) {
                if (!settings)
                    settings = {};

                var url = this._buildSearchUrl();

                if (settings.view)
                    url += "&view=" + settings.view;
                if (settings.page)
                    url += "&page=" + settings.page;
                if (settings.sortby)
                    url += "&sortby=" + settings.sortby;

                return url;
            }

            SearchFilter.prototype._buildSearchUrl = function () {
                var url = "/search?q=";

                var params = "";
                for (group in this.fields) {
                    var param = this.fields[group].buildParam();
                    if (param)
                        params += param + " AND ";
                }

                if (params.length > 5)
                    params = params.slice(0, -5);

                url += params;

                return url;
            }

            SearchFilter.prototype._search = function (url, callback) {
                $.ajax({
                    url: url,
                    dataType: 'html',
                    success: function (html) {
                        if(callback)
                            callback(html);
                    }
                });
            }

            SearchFilter.containsOperator = function (value) {
                if(value.indexOf(Bizweb.SearchOperators.OR) > 0)
                    return true;

                if(value.indexOf(Bizweb.SearchOperators.AND) > 0)
                    return true;

                return false;
            }

            SearchFilter.name = "SearchFilter"
            return SearchFilter;
        }();
    </script>
@endsection
