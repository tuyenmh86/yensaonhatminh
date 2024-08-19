<div class="section-about mb-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12 block-title">

                <div class="about-text-1">
                    Về chúng tôi
                </div>

                <h2>
                    LÀNG NGHỀ CHỔI ĐÓT THẠNH HOÀ
                </h2>

                <div class="about-text-2">
                    Nổ lực – Định hướng – Làng nghề truyền thống – Niềm tự hào 
                </div>


                <div class="about-des">
                  Chổi là vật dụng quen thuộc mà hầu như gia đình nào cũng có để vệ sinh nhà cửa, sân vườn. Đằng sau những chiếc chổi đót đơn giản ấy là những câu chuyện về nét văn hoá của một làng nghề, vươn lên thoát nghèo bằng nghề ông cha để lại. Theo các cụ cao niên trong làng, nghề làm chổi đã xuất hiện ở Thôn Thạnh Hoà, xã Quế Xuân I, tỉnh Quảng Nam từ lâu và gắn bó máu thịt với bà con nơi này, là một sản phẩm truyền thống nổi tiếng được làm từ đót, một loại cây có sợi dài và bền. Nghề làm chổi đót đã tồn tại từ lâu đời tại Thôn Thạnh Hoà và trở thành một phần quan trọng trong văn hóa cũng như kinh tế của địa phương.
                </div>

                <div class="about-contact-us">
                    <div class="btn-box">
                        <a href="{{route('gioi-thieu')}}" title="Xem thêm">Xem thêm</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 block-image">
                <a class="thumb d-block" href="#" title="Giới thiệu làng nghề làm chổi đót">
                    <img alt="Giới thiệu làng nghề làm chổi đót"
                        src="{{asset('uploads/gioithieu.webp')}}"
                        data-src="{{asset('uploads/gioithieu.webp')}}"
                        class="img-responsive w-100 lazyload loaded" data-was-processed="true">
                </a>
            </div>
        </div>
    </div>
</div>

<style type="text/css">

    .section-about .block-title .about-text-1 {
  position:relative;
  display:inline-block;
  color:#ff5e14;
  font-size:16px;
  text-transform:uppercase;
  letter-spacing:0.2em
}
.section-about .block-title h2 {
  font-size:40px;
  line-height:initial;
  font-weight:700;
  margin-top:10px;
  position:relative;
  margin-bottom:15px;
  padding-bottom:15px
}
.section-about .block-title h2:before {
  position:absolute;
  bottom:0;
  left:0;
  height:2px;
  width:40px;
  content:"";
  background-color:#ff5e14;
}
.section-about .block-title .about-text-2 {
  font-size:22px;
  color:#ff5e14;;
  font-weight:500;
  margin-bottom:15px
}
.section-about .block-title .about-des {
  font-size:17px;
  line-height:1.6;
  margin-bottom:15px
}
.section-about .block-title .about-contact-us {
  display:flex;
  align-items:center;
  margin-top:25px
}
.section-about .block-title .about-contact-us .btn-box a {
  position:relative;
  display:inline-block;
  outline:none !important;
  background-color:#3c3531;
  color:#fff;
  font-size:14px;
  padding:15px 30px 15px;
  -webkit-transition:all 0.5s linear;
  transition:all 0.5s linear;
  overflow:hidden;
  z-index:1
}
.section-about .block-title .about-contact-us .btn-box a:after {
  position:absolute;
  content:"";
  top:0;
  left:0;
  right:0;
  bottom:0;
  width:3px;
  background-color:#ff5e14;;
  transition-delay:.1s;
  transition-timing-function:ease-in-out;
  transition-duration:.5s;
  transition-property:all;
  opacity:1;
  z-index:-1
}
.section-about .block-title .about-contact-us .btn-box a:hover:after {
  opacity:1;
  width:100%
}
</style>