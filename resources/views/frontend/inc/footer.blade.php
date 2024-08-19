<footer>
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-md-3 col-6" style="overflow: hidden">
                <div class="small-title">{{\App\GeneralSetting::first()->site_name}}</div>
                <ul class="ul-footer">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Trang Chủ <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('gioithieu')}}" title="Giới thiệu">Giới thiệu</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('tintuc')}}" title="Tin tức">Tin tức</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('khuyenmai')}}" title="khuyến mãi">Khuyến mãi</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('duan')}}" title="Dự án thực hiện">Dự án thực hiện</a></li>
                    {{--                    <li class="nav-item"><a class="nav-link" href="" title="Catalogue">Catalogue</a></li>--}}
                    <li class="nav-item"><a class="nav-link" href="{{route('tuyendung')}}" title="tuyển dụng">Tuyển dụng</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('lien-he')}}" title="Liên hệ">Liên hệ</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-sm-3 col-6 d-none d-sm-block">
                <div class="small-title">Danh mục sản phẩm</div>
                <ul class="ul-footer">
                    @foreach(App\Category::where('id',73)->get() as $category)
                        @foreach($category->subcategories as $subcategory)
                            <li><h5 class="title_h6"><a href="{{$subcategory->link()}}"
                                                        title="{{$subcategory->name}}">{{$subcategory->name}}</a></h5>
                            </li>
                        @endforeach
                    @endforeach
                </ul>
            </div>
            <div class="col-xs-6 col-md-3 col-6">
                <div class="small-title">Hỗ trợ khách hàng</div>
                <ul class="ul-footer">
                    <li><h6 class="title_h6"><a href="#" title="Bảo hành">Bảo hành</a></h6></li>
                    <li><h6 class="title_h6"><a href="#" title="Quy định và hình thức thanh toán">Quy định và hình thức
                                thanh toán</a></h6></li>
                    <li><h6 class="title_h6"><a href="#" title="Vận chuyển giao nhận">Vận chuyển giao nhận</a></h6></li>
                    <li><h6 class="title_h6"><a href="#" title="Đổi trả hàng và hoàn tiền">Đổi trả hàng và hoàn tiền</a>
                        </h6></li>
                    <li><h6 class="title_h6"><a href="#" title="Bảo mật thông tin">Bảo mật thông tin</a></h6></li>
                </ul>
            </div>
            <div class="col-lg-3 col-sm-3 col-xs-4 col-xs12 d-none d-sm-block">
                <div class="small-title">Kết nối facebook</div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-4 col-xs-12 address">
            <ul>
                <li>
                    <span style="font-family:arial,helvetica,sans-serif;font-size:14px;"><b><i>Showroom: {{\App\GeneralSetting::first()->address}}</i></b></span>
                </li>
                <li>
                        <span style="font-family:arial,helvetica,sans-serif;font-size:14px;"><b>Điện thoại<i>: </i></b>{{\App\GeneralSetting::first()->phone}}</span>
                </li>
            </ul>
            <ul>
                <li>

                </li>
            </ul>
            <ul>
                <li>
                                <b>Email: </b><a href="mailto:{{\App\GeneralSetting::first()->email}}" title="{{\App\GeneralSetting::first()->email}}">{{\App\GeneralSetting::first()->email}}</a>
                </li>
            </ul>
        </div>
            <div class="col-lg-4 col-sm-4 col-xs-12 address">
            <ul dir="ltr">
                <li>
                    <span style="font-size:14px;"><span style="font-family:arial,helvetica,sans-serif;"><strong>{{\App\GeneralSetting::first()->site_name}}</strong></span></span>
                </li>
                <li>
                    <span style="font-size:14px;"><span style="font-family:arial,helvetica,sans-serif;"><strong>Mã số thuế:</strong> 123456789</span></span>
                </li>
                <li style="text-align: justify;">
                    <span style="font-size:14px;"><span style="font-family:arial,helvetica,sans-serif;"><strong>Ngày thành lập:</strong> 4/9/2020</span></span>
                </li>
                <li>
                    <span style="font-size:14px;"><span style="font-family:arial,helvetica,sans-serif;"><strong>Nơi đăng ký: </strong>Sở Kế hoạch &amp; đầu tư tỉnh Gia Lai</span></span>
                </li>
                <li>
                    <span style="font-size:14px;"><span style="font-family:arial,helvetica,sans-serif;"><strong>Địa chỉ :</strong> {{\App\GeneralSetting::first()->address}}</span></span>
                </li>
                <li>
                    <span style="font-size:14px;"><span style="font-family:arial,helvetica,sans-serif;"><strong>Điện thoại :</strong> {{\App\GeneralSetting::first()->phone}}</span></span>
                </li>
                <li>
                    <span style="font-size:14px;"><span
                            style="font-family:arial,helvetica,sans-serif;"><strong>Email:</strong> <a
                                href="{{App\GeneralSetting::first()->email}}">{{App\GeneralSetting::first()->email}}</a></span></span>
                </li>

            </ul>
        </div>
        </div>
    </div>
</footer>
<div class="tel hidden-xs" style="text-align:center;">
    <p class="fone">Hotline: <a href="tel:{{\App\GeneralSetting::first()->phone}}"
                                title="{{\App\GeneralSetting::first()->phone}}">{{\App\GeneralSetting::first()->phone}}</a>
    </p>
</div>
