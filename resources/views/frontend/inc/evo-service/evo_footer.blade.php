<footer class="footer">
    <div class="container">
{{--        <div class="subscribe">--}}
{{--            <h3>Đăng ký nhận tin</h3>--}}
{{--            <p>Nhận thông tin sản phẩm mới nhất, tin khuyến mãi và nhiều hơn nữa.</p>--}}
{{--            <form id="mc-form" class="newsletter-form has-validation-callback" novalidate="true">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-4 col-md-6">--}}
{{--                        <input aria-label="Họ tên" type="text" name="FNAME" class="form-control" placeholder="Họ và tên"--}}
{{--                               required="" autocomplete="off">--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-5 col-md-6">--}}
{{--                        <input aria-label="Địa chỉ Email" type="email" class="form-control" placeholder="Địa chỉ Email"--}}
{{--                               name="EMAIL" required="" autocomplete="off">--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-3 col-md-12">--}}
{{--                        <button type="submit" class="btn" aria-label="Đăng ký nhận tin" name="subscribe">Đăng ký--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--            <div class="mailchimp-alerts ">--}}
{{--                <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->--}}
{{--                <div class="mailchimp-success"></div><!-- mailchimp-success end -->--}}
{{--                <div class="mailchimp-error"></div><!-- mailchimp-error end -->--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <script>--}}
{{--            $('#mc-form').ajaxChimp({--}}
{{--                language: 'en',--}}
{{--                callback: mailChimpResponse,--}}
{{--                url: '//facebook.us7.list-manage.com/subscribe/post?u=97ba6d3ba28239250923925a8&id=4ef3a755a8'--}}
{{--            });--}}

{{--            function mailChimpResponse(resp) {--}}
{{--                if (resp.result === 'success') {--}}
{{--                    if (resp.msg == 'Thank you for subscribing!') {--}}
{{--                        $('.mailchimp-success').html('Cảm ơn bạn đã đăng ký!').fadeIn(900);--}}
{{--                    } else {--}}
{{--                        $('.mailchimp-success').html('' + resp.msg).fadeIn(900);--}}
{{--                    }--}}
{{--                    $('.mailchimp-error').fadeOut(100);--}}
{{--                } else if (resp.result === 'error') {--}}
{{--                    if (resp.msg == '0 - Please enter a value') {--}}
{{--                        $('.mailchimp-error').html('Vui lòng nhập các trường thông tin').fadeIn(900);--}}
{{--                    } else if (resp.msg == '0 - An email address must contain a single @') {--}}
{{--                        $('.mailchimp-error').html('Địa chỉ email phải chứa ký tự @').fadeIn(900);--}}
{{--                    } else if (resp.msg == 'This email cannot be added to this list. Please enter a different email address.') {--}}
{{--                        $('.mailchimp-error').html('Email này không thể được thêm vào danh sách này. Vui lòng nhập một địa chỉ email khác.').fadeIn(900);--}}
{{--                    } else if (resp.msg.includes('0 - The domain portion of the email address is invalid')) {--}}
{{--                        $('.mailchimp-error').html('Phần tên miền của địa chỉ email không hợp lệ').fadeIn(900);--}}
{{--                    } else if (resp.msg.includes('0 - The username portion of the email address is empty')) {--}}
{{--                        $('.mailchimp-error').html('Phần tên người dùng của địa chỉ email trống').fadeIn(900);--}}
{{--                    } else if (resp.msg == 'Thank you for subscribing!') {--}}
{{--                        $('.mailchimp-error').html('Cảm ơn bạn đã đăng ký!').fadeIn(900);--}}
{{--                    } else {--}}
{{--                        $('.mailchimp-error').html('' + resp.msg).fadeIn(900);--}}
{{--                    }--}}
{{--                }--}}
{{--            }--}}
{{--        </script>--}}
        <div class="row">
            <div class="col-lg-3 col-md-9 col-xs-9">
                <div class="footer-logo-and-info text-center">
                    <a href="/" class="logo-wrapper" title="{{$sitesetting->site_name}}">
                        <img src="{{asset($sitesetting->logo)}}"
                             data-src="{{asset($sitesetting->logo)}}"
                             alt="{{$sitesetting->site_name}}" class="lazy img-responsive center-block loaded"
                             data-was-processed="true">
                    </a>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-xs-9">
                <div class="footer-widget">
                    <h3>Thông tin công ty</h3>
                    <ul class="list-menu has-click">

                        <li>{{$sitesetting->description}}</li>
                        <li><span>Địa chỉ:</span> {{$sitesetting->address}}</li>
                        <li><span>Điện thoại:</span> <a href="tel:{{$sitesetting->phone}}" title="{{$sitesetting->phone}}">{{$sitesetting->phone}}</a></li>
                        <li><span>Email:</span> <a href="mailto:{{$sitesetting->email}}"
                                                   title="{{$sitesetting->email}}">{{$sitesetting->email}}</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright clearfix">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <span>© Bản quyền thuộc về <b>kiemtienonline.com</b> <span class="s480-f">|</span> Cung cấp bởi <a
                            href=""
                            title="thietkewebgialai.net" target="_blank" rel="nofollow">thietkewebgialai.net</a></span>

                </div>
            </div>

            <div class="back-to-top text-center show" title="Lên đầu trang">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     width="15px" height="15px" viewBox="0 0 284.929 284.929"
                     style="enable-background:new 0 0 284.929 284.929;" xml:space="preserve"><path
                        d="M282.082,195.285L149.028,62.24c-1.901-1.903-4.088-2.856-6.562-2.856s-4.665,0.953-6.567,2.856L2.856,195.285   C0.95,197.191,0,199.378,0,201.853c0,2.474,0.953,4.664,2.856,6.566l14.272,14.271c1.903,1.903,4.093,2.854,6.567,2.854   c2.474,0,4.664-0.951,6.567-2.854l112.204-112.202l112.208,112.209c1.902,1.903,4.093,2.848,6.563,2.848   c2.478,0,4.668-0.951,6.57-2.848l14.274-14.277c1.902-1.902,2.847-4.093,2.847-6.566   C284.929,199.378,283.984,197.188,282.082,195.285z"
                        data-original="#000000" class="active-path" data-old_color="#000000"
                        fill="#FFFFFF"></path></svg>
            </div>

        </div>
    </div>
</footer>
