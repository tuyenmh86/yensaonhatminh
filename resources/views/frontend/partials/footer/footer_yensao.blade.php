<footer class="footer">
    <div class="mid-footer">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4 ft-info">
                    <h4 class="title-menu">
                        Thông tin
                    </h4>
                    <div class="group-address">
                        <ul>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                    <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z">
                                    </path>
                                </svg>
                                <span>

                                    Thôn Thanh Hà, xã Ia Hrung, Huyện Iagrai, Tỉnh Gia Lai

                                </span>
                            </li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z">
                                    </path>
                                </svg>
                                <a title="1900 6750" href="tel:0905946690">0905946690</a>
                            </li>
                        </ul>
                    </div>
                    <h4 class="title-menu">
                        Mạng xã hội
                    </h4>

                    <ul class="social">
                        <li><a href="#" title="Zalo"><img width="32" height="32" title="Zalo" class="lazyload loaded"
                                    src="{{asset('img/zalo.webp')}}"
                                    data-src="{{asset('img/zalo.webp')}}"
                                    data-was-processed="true"></a></li>
                        <li><a href="#" title="Facebook"><img width="32" height="32" title="Facebook"
                                    class="lazyload loaded"
                                    src="{{asset('img/facebook.webp')}}"
                                    data-src="{{asset('img/facebook.webp')}}"
                                    data-was-processed="true"></a></li>
                        <li><a href="#" title="Youtube"><img width="32" height="32" title="Youtube"
                                    class="lazyload loaded"
                                    src="{{asset('img/youtube.webp')}}"
                                    data-src="{{asset('img/youtube.webp')}}"
                                    data-was-processed="true"></a></li>
                        <li><a href="#" title="Google"><img width="32" height="32" title="Google"
                                    class="lazyload loaded"
                                    src="{{asset('img/google.webp')}}"
                                    data-src="{{asset('img/google.webp')}}"
                                    data-was-processed="true"></a></li>
                    </ul>
                </div>
                <div class="col-12 col-lg-5 ft-menu">
                    <div class="row">
                        <div class="col-12 col-sm-6 link-list col-footer footer-click">
                            <h4 class="title-menu title-menu2">
                                Chính sách
                            </h4>
                            <ul class="list-menu hidden-mobile">

                                <li><a href="#" title="Chính sách bảo mật">Chính sách bảo mật</a></li>

                                <li><a href="#" title="Chính sách vận chuyển">Chính sách vận
                                        chuyển</a></li>

                                <li><a href="#" title="Chính sách đổi trả">Chính sách đổi trả</a></li>

                                <li><a href="#" title="Quy định sử dụng">Quy định sử dụng</a></li>

                            </ul>
                        </div>
                        <div class="col-12 col-sm-6 link-list col-footer footer-click">
                            <h4 class="title-menu title-menu2">
                                Hướng dẫn
                            </h4>
                            <ul class="list-menu hidden-mobile">

                                <li><a href="#" title="Hướng dẫn mua hàng">Hướng dẫn mua hàng</a></li>

                                <li><a href="#" title="Hướng dẫn thanh toán">Hướng dẫn thanh
                                        toán</a></li>

                                <li><a href="#" title="Hướng dẫn giao nhận">Hướng dẫn giao nhận</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <h4 class="title-menu">
                        Đăng ký nhận tin
                    </h4>
                    <span class="content-mailchimp">Đăng ký ngay! Để nhận thật nhiều ưu đãi</span>
                    <form id="mc-form" class="newsletter-form" data-toggle="validator" novalidate="true">
                        <input aria-label="Địa chỉ Email" type="email" class="form-control"
                            placeholder="Nhập địa chỉ email" name="EMAIL" required="" autocomplete="off">
                        <button class="btn btn-default" type="submit" aria-label="Đăng ký nhận tin"
                            name="subscribe">ĐĂNG KÝ</button>
                    </form>
                    <div class="mailchimp-alerts ">
                        <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                        <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                        <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                    </div>
                    <script>
                        $('#mc-form').ajaxChimp({
                            language: 'en',
                            callback: mailChimpResponse,
                            url: 'https://facebook.us7.list-manage.com/subscribe/post?u=97ba6d3ba28239250923925a8&id=4ef3a755a8'
                        });

                        function mailChimpResponse(resp) {
                            if (resp.result === 'success') {
                                if (resp.msg == 'Thank you for subscribing!') {
                                    $('.mailchimp-success').html('Cảm ơn bạn đã đăng ký!').fadeIn(900);
                                } else {
                                    $('.mailchimp-success').html('' + resp.msg).fadeIn(900);
                                }
                                $('.mailchimp-error').fadeOut(100);
                            } else if (resp.result === 'error') {
                                if (resp.msg == '0 - Please enter a value') {
                                    $('.mailchimp-error').html('Vui lòng nhập các trường thông tin').fadeIn(900);
                                } else if (resp.msg == '0 - An email address must contain a single @.') {
                                    $('.mailchimp-error').html('Địa chỉ email phải chứa ký tự @').fadeIn(900);
                                } else if (resp.msg ==
                                    'This email cannot be added to this list. Please enter a different email address.'
                                    ) {
                                    $('.mailchimp-error').html(
                                        'Email này không thể được thêm vào danh sách này. Vui lòng nhập một địa chỉ email khác.'
                                        ).fadeIn(900);
                                } else if (resp.msg.includes(
                                    '0 - The domain portion of the email address is invalid')) {
                                    $('.mailchimp-error').html('Phần tên miền của địa chỉ email không hợp lệ').fadeIn(
                                        900);
                                } else if (resp.msg.includes(
                                    '0 - The username portion of the email address is empty')) {
                                    $('.mailchimp-error').html('Phần tên người dùng của địa chỉ email trống').fadeIn(
                                        900);
                                } else if (resp.msg == 'Thank you for subscribing!') {
                                    $('.mailchimp-error').html('Cảm ơn bạn đã đăng ký!').fadeIn(900);
                                } else {
                                    $('.mailchimp-error').html('' + resp.msg).fadeIn(900);
                                }
                            }
                        }
                    </script>

                    <h4 class="title-menu">
                        Hình thức thanh toán
                    </h4>
                    <ul class="thanhtoan">

                        <li><img width="57" height="35" alt="Payment 1"
                                data-src="{{asset('img/payment_1.webp')}}"
                                class="lazyload loaded"
                                src="{{asset('img/payment_1.webp')}}"
                                data-was-processed="true"></li>
                        <li><img width="57" height="35" alt="Payment 2"
                                data-src="{{asset('img/payment_2.webp')}}"
                                class="lazyload loaded"
                                src="{{asset('img/payment_2.webp')}}"
                                data-was-processed="true"></li>
                        <li><img width="57" height="35" alt="Payment 3"
                                data-src="{{asset('img/payment_3.webp')}}"
                                class="lazyload loaded"
                                src="{{asset('img/payment_3.webp')}}"
                                data-was-processed="true"></li>

                    </ul>


                </div>
            </div>
        </div>
    </div>
    <div id="copyright" class="copyright">
        <div class="container">
            <div class="row">

                <div class="col-12 col-lg-6">
                    <span class="copy-right">Bản quyền thuộc về <b> Hộ kinh doanh Phạm Thị Trúc </b>.</span>
                    <span class="opacity1">
                        Cung cấp bởi
                        <a href="javascript:;" rel="noopener">PK-WEB</a>
                    </span>
                </div>
                <div class="col-12 col-lg-4">
                    <ul class="list-menu-copyright">

                        <li><a href="{{route('home')}}" title="Trang chủ">Trang chủ</a></li>
                        <li><a href="{{route('gioi-thieu')}}" title="Giới thiệu">Giới thiệu</a></li>
                        <li><a href="{{route('san-pham-choi-dot')}}" title="Giới thiệu">Sản phẩm</a></li>
                        <li><a href="{{route('lien-he')}}" title="Liên hệ">Liên hệ</a></li>

                    </ul>
                </div>

            </div>
        </div>
    </div>
</footer>

<style>
    .footer {
        background: #d01818;
    background-position-x: 0%;
    background-position-y: 0%;
    background-repeat: repeat;
    background-image: none;
    background-size: auto;
    position: relative;
    overflow: hidden;
    background-image: url('public/img/footer_yensao.webp');
    background-position: bottom;
    background-size: contain;
    background-repeat: no-repeat;
}

    .footer::before {
        position: absolute;
        width: 1200px;
        height: 1200px;
        top: 50%;
        left: 50%;
        content: "";
        background: transparent url('public/img/footer_yensao.webp') no-repeat center center;
        background-size: 100% auto;
        /* opacity: 0.3; */
        /* transform: translate(-50%, -50%); */
        /* animation: rotate 60s linear infinite; */
    }

    @keyframes rotate {
        from {
            transform: translate(-50%, -50%) rotate(0deg);
        }
        to {
            transform: translate(-50%, -50%) rotate(360deg);
        }
    }
    .footer .mid-footer {
        color: #fff;
        padding: 50px 0;
    }
    .footer .mid-footer .list-menu li {
        display: block;
        margin-bottom: 15px;
        display: list-item;
        }
        .footer .mid-footer .list-menu li a {
        font-size: 14px;
        color: #fff;
        }
    .footer .mid-footer .title-menu {
        font-size: 18px;
        margin-bottom: 20px;
        position: relative;
        color: #fff;
        font-weight: 700;
        text-transform: uppercase;
    }

    .footer .mid-footer .group-address {
        margin-top: 10px;
    }

    .footer .mid-footer .group-address ul {
        margin-bottom: 20px;
        list-style: none;
    }

    .footer .mid-footer .group-address ul li {
        margin-bottom: 15px;
        color: #ffa336;
        font-size: 14px;
        display: flex;
        align-items: center;
    }

    .footer .mid-footer .group-address ul li svg {
        fill: #fff;
        margin-right: 10px;
        min-width: 20px;
        width: 18px;
        height: 18px;
    }

    .footer .mid-footer .group-address ul li span {
        color: #fff;
    }

    .footer .mid-footer .title-menu {
        font-size: 18px;
        margin-bottom: 20px;
        position: relative;
        color: #fff;
        font-weight: 700;
        text-transform: uppercase;
    }

    .footer .mid-footer .social {
        margin-bottom: 20px;
    }

    .footer .mid-footer .social li {
        display: inline-block;
        margin-right: 10px;
    }

    .footer .mid-footer .content-mailchimp {
    margin-bottom: 15px;
    display: block;
    }
    .footer .mid-footer .newsletter-form {
    position: relative;
    overflow: hidden;
    margin-bottom: 20px;
    }
    .footer .mid-footer .newsletter-form input {
        height: 40px;
        width: 100%;
        border: 0;
        padding: 10px 110px 10px 10px;
        border-radius: 10px;
        }
        .footer .mid-footer .newsletter-form button {
        height: 40px;
        border: 0;
        background: #ca6f04;
        color: #fff;
        padding: 0 20px;
        margin-top: -40px;
        border-radius: 0 10px 10px 0;
        position: absolute;
        right: 0;
        }   
        .footer .mid-footer .thanhtoan li {
        display: inline-block;
        margin-right: 2px;
        }
        .footer .mid-footer .thanhtoan li img {
            max-height: 30px;
            width: auto;

        }
        .footer #copyright {
        font-size: 16px;
        color: #fff;
        }
        .footer #copyright {
        padding: 10px 0;
        border-top: 1px solid #535353;
        }
        .footer #copyright .list-menu-copyright {
        text-align: right;
        }
        .footer #copyright .list-menu-copyright li {
        display: inline-block;
        margin-right: 10px;
        }
        .footer #copyright a {
        color: #fff;
        }
</style>