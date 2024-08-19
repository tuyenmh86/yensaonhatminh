@extends('frontend.layouts.app')
@section('style')
    <link href="{{ asset('frontend/evo/css/evo-contacts.scss.css')}}" rel="stylesheet">
@endsection
@section('content')
    @php
        $sitesetting = \App\GeneralSetting::first();
    @endphp
    <section class="mb-4">
        <div class="p-4 bg-white shadow-sm">
            <div class="evo-themes">
                <div class="contact margin-bottom-20 page-contacts">
                    <h1 class="title-head text-center d-none">Liên hệ</h1>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="contact-box">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="-61 0 443 443.288" width="20px"><path d="m96.144531 136v88h32v-56c0-4.417969 3.582031-8 8-8h48c4.417969 0 8 3.582031 8 8v56h32v-88c0-4.417969 3.582031-8 8-8h8.480469l-80.480469-61.902344-80.480469 61.902344h8.480469c4.417969 0 8 3.582031 8 8zm0 0" data-original="#000000" class="active-path" data-old_color="#000000" fill="#22B074"></path><path d="m144.144531 176h32v48h-32zm0 0" data-original="#000000" class="active-path" data-old_color="#000000" fill="#22B074"></path><path d="m160.144531 443.289062c30.101563-37.585937 160-204.328124 160-283.289062 0-88.367188-71.636719-160-160-160-88.367187 0-160 71.632812-160 160 0 78.976562 129.894531 245.710938 160 283.289062zm-108.878906-313.601562 104-80c2.875-2.214844 6.882813-2.214844 9.757813 0l104 80c2.691406 2.097656 3.757812 5.667969 2.65625 8.894531-1.097657 3.226563-4.125 5.402344-7.535157 5.417969h-24v88c0 4.417969-3.582031 8-8 8h-144c-4.417969 0-8-3.582031-8-8v-88h-24c-3.421875 0-6.464843-2.179688-7.570312-5.421875-1.101563-3.242187-.019531-6.824219 2.691406-8.914063zm0 0" data-original="#000000" class="active-path" data-old_color="#000000" fill="#22B074"></path></svg>
                                    </div>
                                    <div class="content">
                                        <h4>Địa chỉ</h4>

                                        <p>{{$sitesetting->address}}</p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="contact-box">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 480.56 480.56" style="enable-background:new 0 0 480.56 480.56;" xml:space="preserve" width="20px" height="20px"><path d="M365.354,317.9c-15.7-15.5-35.3-15.5-50.9,0c-11.9,11.8-23.8,23.6-35.5,35.6c-3.2,3.3-5.9,4-9.8,1.8    c-7.7-4.2-15.9-7.6-23.3-12.2c-34.5-21.7-63.4-49.6-89-81c-12.7-15.6-24-32.3-31.9-51.1c-1.6-3.8-1.3-6.3,1.8-9.4    c11.9-11.5,23.5-23.3,35.2-35.1c16.3-16.4,16.3-35.6-0.1-52.1c-9.3-9.4-18.6-18.6-27.9-28c-9.6-9.6-19.1-19.3-28.8-28.8    c-15.7-15.3-35.3-15.3-50.9,0.1c-12,11.8-23.5,23.9-35.7,35.5c-11.3,10.7-17,23.8-18.2,39.1c-1.9,24.9,4.2,48.4,12.8,71.3    c17.6,47.4,44.4,89.5,76.9,128.1c43.9,52.2,96.3,93.5,157.6,123.3c27.6,13.4,56.2,23.7,87.3,25.4c21.4,1.2,40-4.2,54.9-20.9    c10.2-11.4,21.7-21.8,32.5-32.7c16-16.2,16.1-35.8,0.2-51.8C403.554,355.9,384.454,336.9,365.354,317.9z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#22B074"></path>
                                            <path d="M346.254,238.2l36.9-6.3c-5.8-33.9-21.8-64.6-46.1-89c-25.7-25.7-58.2-41.9-94-46.9l-5.2,37.1    c27.7,3.9,52.9,16.4,72.8,36.3C329.454,188.2,341.754,212,346.254,238.2z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#22B074"></path>
                                            <path d="M403.954,77.8c-42.6-42.6-96.5-69.5-156-77.8l-5.2,37.1c51.4,7.2,98,30.5,134.8,67.2c34.9,34.9,57.8,79,66.1,127.5    l36.9-6.3C470.854,169.3,444.354,118.3,403.954,77.8z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#22B074"></path></svg>
                                    </div>
                                    <div class="content">
                                        <h4>Điện thoại</h4>

                                        <a href="tel:{{$sitesetting->phone}}" title="{{$sitesetting->phone}}">{{$sitesetting->phone}}</a>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="contact-box">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 437.676 437.676" style="enable-background:new 0 0 437.676 437.676;" xml:space="preserve" width="20px" height="20px" class="">
							<polygon points="218.841,256.659 19.744,81.824 417.931,81.824  " data-original="#010002" class="active-path" data-old_color="#010002" fill="#22B074"></polygon>
                                            <polygon points="139.529,218.781 0,341.311 0,96.252  " data-original="#010002" class="active-path" data-old_color="#010002" fill="#22B074"></polygon>
                                            <polygon points="157.615,234.665 218.841,288.427 280.055,234.665 418.057,355.852 19.619,355.852  " data-original="#010002" class="active-path" data-old_color="#010002" fill="#22B074"></polygon>
                                            <polygon points="298.141,218.787 437.676,96.252 437.676,341.311  " data-original="#010002" class="active-path" data-old_color="#010002" fill="#22B074"></polygon>
						</svg>
                                    </div>
                                    <div class="content">
                                        <h4>Email</h4>

                                        <a href="mailto:{{$sitesetting->email}}" title="{{$sitesetting->email}}">{{$sitesetting->email}}</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row contact-padding">
                            <div class="col-lg-4 col-md-12">
                                <div class="leave-your-message">
                                    <h3>Để lại tin nhắn</h3>
                                    <p>Đội ngũ Tư vấn viên &amp; Chăm sóc Khách hàng kinh nghiệm, chuyên nghiệp, tận tâm. Chúng tôi cam kết bảo hành dịch vụ khi Khách hàng chưa hài lòng. chất lượng tiêu chuẩn, đáng tin cậy </p>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-12" id="lazy-container">
                                <form accept-charset="UTF-8" action="{{route('gui-lien-he')}}" id="contact" method="post" class="has-validation-callback">
                                    @csrf
                                    <script src="https://www.google.com/recaptcha/api.js?render=6Ldtu4IUAAAAAMQzG1gCw3wFlx_GytlZyLrXcsuK"></script>
                                    <script>
                                        grecaptcha.ready(function() {
                                            grecaptcha.execute("6Ldtu4IUAAAAAMQzG1gCw3wFlx_GytlZyLrXcsuK", {action: "/contact"})
                                                .then(function(token) {
                                                    document.getElementById("_token").value = token
                                                });
                                        });
                                    </script>

                                    <div class="form-signup clearfix">
                                        <div class="row">
                                            <div class="col-sm-4 col-xs-12">
                                                <fieldset class="form-group">
                                                    <label>Họ và tên<span class="required">*</span></label>
                                                    <input placeholder="Nhập họ và tên" type="text" name="name" id="name" class="form-control form-control-lg" data-validation-error-msg="Không được để trống" data-validation="required" required="">
                                                </fieldset>
                                            </div>
                                            <div class="col-sm-4 col-xs-12">
                                                <fieldset class="form-group">
                                                    <label>Email<span class="required">*</span></label>
                                                    <input placeholder="Nhập địa chỉ Email" type="email" name="email" data-validation="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" data-validation-error-msg="Email sai định dạng" id="email" class="form-control form-control-lg" required="">
                                                </fieldset>
                                            </div>
                                            <div class="col-sm-4 col-xs-12">
                                                <fieldset class="form-group">
                                                    <label>Điện thoại<span class="required">*</span></label>
                                                    <input placeholder="Nhập số điện thoại" type="tel" name="phone" data-validation="tel" data-validation-error-msg="Không được để trống" id="tel" class="number-sidebar form-control form-control-lg" required="">
                                                </fieldset>
                                            </div>
                                            <div class="col-sm-12 col-xs-12">
                                                <fieldset class="form-group">
                                                    <label>Nội dung<span class="required">*</span></label>
                                                    <textarea placeholder="Nội dung liên hệ" name="body" id="comment" class="form-control form-control-lg" rows="5" data-validation-error-msg="Không được để trống" data-validation="required" required=""></textarea>
                                                </fieldset>
                                                <div class="pull-xs-left" style="margin-top:20px;">
                                                    <button type="submit" class="btn btn-blues btn-style btn-style-active">Gửi tin nhắn</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 evo-maps">
                                [map]
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection
@section('script')

@endsection
