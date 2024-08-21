<div class="section-about mb-4">
    <div class="container">

        <div class="row align-items-center sm:p-2 md:p-5">
          <div class="bird-container bird-container-one">
            <div class="bird bird-one"></div>
         </div>        
         <div class="bird-container bird-container-two">
           <div class="bird bird-two"></div>
         </div>  
          <div class="bird-container bird-container-three">
            <div class="bird bird-three"></div>
          </div> 
          <div class="bird-container bird-container-four">
            <div class="bird bird-four"></div>
          </div>
    
            <div class="col-lg-6 col-md-6 col-12 block-title">


                <h1 class="text-amber-400 uppercase text-3xl pt-6">
                    Yến sào Nhật Minh Anh <br/>
                 
                </h1>

                <div class="about-text-2">
                    <span class="italic text-base text-emerald-400 tracking-wide">Cung cấp tổ yến tinh</span>
                </div>


                <div class="about-des text-white">
                  "Tài sản lớn nhất của đời người là sức khỏe và trí tuệ", 
                  có sức khỏe và trí tuệ thì sẽ có tất cả. Sản phẩm yến sào là thực phẩm bổ dưỡng
                   mang lại cho Quý vị sức khỏe, trí tuệ và sự trẻ trung. Yến sào được thị trường 
                   đón nhận với phương châm: "Chất lượng uy tín là thương hiệu".
Sản phẩm yến sào của Yến sào Nhật Minh Anh được khai thác và yến nuôi tổ với chất lượng tuyệt đối... .
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
                        src="{{asset('uploads/section_about_product_1.webp')}}"
                        data-src="{{asset('uploads/section_about_product_1.webp')}}"
                        class="img-responsive w-100 lazyload loaded" data-was-processed="true">
                </a>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
.section-about{
  background:url(//bizweb.dktcdn.net/100/506/650/themes/944598/assets/section_about_bg.jpg?1713533632009) bottom left/cover no-repeat;
}
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

.bird{
    background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/174479/bird-cells-new.svg');
    filter: invert(0%) sepia(55%) saturate(427%) hue-rotate(141deg) brightness(93%) contrast(91%);
    background-size: auto 100%;
    width: 88px;
    height: 125px;
    will-change: background-position;

    animation-name: fly-cycle;
    animation-timing-function: steps(10);
    animation-iteration-count: infinite;
}

.bird-one{
    animation-duration: 1s;
    animation-delay: -0.5s;

}
.bird-two{
    animation-duration: 0.9;
    animation-delay: -0.75.s;

}
.bird-three{
    animation-duration:1.25s;
    animation-delay: -0.25s

}
.bird-four{
    animation-duration: 1.1s;
    animation-delay: -0.5s;
}

.bird-container {
	position: absolute;
	top: 10%;
  left: -3%;
	transform: scale(0) translateX(-10vw);
	will-change: transform;
	
	animation-name: fly-right-one;
	animation-timing-function: linear;
	animation-iteration-count: infinite;
}
	
.bird-container-one{
	animation-duration: 15s;
	animation-delay: 0;
}
	
.bird-container-two{
	animation-duration: 16s;
	animation-delay: 1s;
}
	
.bird-container-three{
	animation-duration: 14.6s;
	animation-delay: 9.5s;
}
	
.bird-container-four {
		animation-duration: 16s;
		animation-delay: 10.25s;
}
/* @keyframes fly-cycle {
    100%{
        background-position: -3600px 0;
    }
} */
@keyframes fly-cycle {
	
	100% {
		background-position: -900px 0;
	}
	
}

@keyframes fly-right-one {
	
	0% {
		transform: scale(0.3) translateX(-10vw);
	}
	
	10% {
		transform: translateY(2vh) translateX(10vw) scale(0.4);
	}
	
	20% {
		transform: translateY(0vh) translateX(30vw) scale(0.5);
	}
	
	30% {
		transform: translateY(4vh) translateX(50vw) scale(0.6);
	}
	
	40% {
		transform: translateY(2vh) translateX(70vw) scale(0.6);
	}
	
	50% {
		transform: translateY(0vh) translateX(90vw) scale(0.6);
	}
	
	60% {
		transform: translateY(0vh) translateX(110vw) scale(0.6);
	}
	
	100% {
		transform: translateY(0vh) translateX(110vw) scale(0.6);
	}
	
}

@keyframes fly-right-two {
	
	0% {
		transform: translateY(-2vh) translateX(-10vw) scale(0.5);
	}
	
	10% {
		transform: translateY(0vh) translateX(10vw) scale(0.4);
	}
	
	20% {
		transform: translateY(-4vh) translateX(30vw) scale(0.6);
	}
	
	30% {
		transform: translateY(1vh) translateX(50vw) scale(0.45);
	}
	
	40% {
		transform: translateY(-2.5vh) translateX(70vw) scale(0.5);
	}
	
	50% {
		transform: translateY(0vh) translateX(90vw) scale(0.45);
	}
	
	51% {
		transform: translateY(0vh) translateX(110vw) scale(0.45);
	}
	
	100% {
		transform: translateY(0vh) translateX(110vw) scale(0.45);
	}
	
}
</style>