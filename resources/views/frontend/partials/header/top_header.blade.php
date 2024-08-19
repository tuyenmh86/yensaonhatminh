	<div class="topheader_wrap" style="background-color: #f9e25e;">
		<div class="topbar d-none d-md-block">
			<div class="container">
				<div class="row">
					<div class="col-sm-7 col-xs-6 col-lg-8 col-md-8 a-left">
						<span>Chào mừng bạn đến với Yến Sào Nhật Minh!</span>
					</div>
					<div class="col-xs-6 col-sm-5 col-md-4 col-lg-4">
						<ul class="list-inline f-right">

							<li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>


							<li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>


							<li><a href="https://plus.google.com/?hl=vi"><i class="fa fa-google-plus"></i></a></li>


							<li><a href="https://www.youtube.com"><i class="fa fa-youtube-play"></i></a></li>

						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="wrap_hed">
			<div class="container">
				<div class="menu-bar button-menu d-lg-none">
					<a href="javascript:;">
						<i class="fa"></i>
					</a>
				</div>
				<div class="header-main">
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-12">
							<div class="logo a-left">
								<a href="{{ route('home') }}" class="logo-wrapper ">
									<img src="{{ asset(\App\GeneralSetting::first()->logo) }}"
										alt="{{config('app.name')}}" style="max-height:120px;">
								</a>
							</div>
						</div>

						<div class="col-lg-9 col-md-9 col-sm-9 d-none d-md-block">
							<div class="service_head">
								<div class="row">
									<div class="col-lg-7 col-md-9 col-sm-9 col-xs-12">
										<div class="wrap">
											<div class="header_search theme-searchs mt-4">
												<form action="{{ route('search') }}" method="GET"
													class="input-group search-bar theme-header-search-form ultimate-search"
													role="search">
													<input type="search" id="search" name="q" value=""
														placeholder="Bạn cần tìm gì hôm nay... "
														class="input-group-field st-default-search-input search-text search_md"
														autocomplete="off" required="">
													<span class="input-group-btn">
														<button type="submit" class="btn icon-fallback-text"
															aria-label="Justify">
															<svg enable-background="new 0 0 612.01 612.01" version="1.1"
																viewBox="0 0 612.01 612.01" xml:space="preserve"
																xmlns="http://www.w3.org/2000/svg">
																<path
																	d="m606.21 578.71-158.01-155.49c41.378-44.956 66.802-104.41 66.802-169.84-0.02-139.95-115.3-253.39-257.51-253.39s-257.49 113.44-257.49 253.39 115.28 253.39 257.49 253.39c61.445 0 117.8-21.253 162.07-56.586l158.62 156.1c7.729 7.614 20.277 7.614 28.006 0 7.747-7.613 7.747-19.971 0.018-27.585zm-348.72-110.91c-120.33 0-217.87-95.993-217.87-214.41s97.543-214.41 217.87-214.41c120.33 0 217.87 95.993 217.87 214.41s-97.542 214.41-217.87 214.41z">
																</path>
															</svg>
														</button>
													</span>
												</form>
												<div class="typed-search-box d-none">
													<div class="search-preloader">
														<div class="loader">
															<div></div>
															<div></div>
															<div></div>
														</div>
													</div>
													<div class="search-nothing d-none">

													</div>
													<div id="search-content">

													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-5 col-md-5 col-sm-4 col-xs-12">
										<div class="wrap">
											<div class="img">
												<img class="img-responsive lazyload"
													src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
													data-src="//bizweb.dktcdn.net/100/330/752/themes/894754/assets/icon_head_3.png?1676257879443">

											</div>
											<div class="content">
												<p>Điện thoại liên hệ:</p>
												<a href="tel:0905946690">0905946690</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<script>
	$('.button-menu').on('click', function() {
		// Add your code here to handle the click event
		$('.menu_mobile').slideToggle('fast');
	});
</script>

    <style>
		.wrap_hed {
			width:100%;
			float:left;
			position:relative;
			border-bottom: 1px solid #ebebeb;
			background-color: #bf1e2d;
		}
		.header-main {
  width:100%;
  float:left;
  height:123px;
  padding:0px !important;

}

@media (max-width: 991px) {
  .header-main {
    height:80px
  }
}
.header-main .logo {
  width:100%;
  line-height:123px;
}
.topbar ul li {
  display: inline-block;
  width: 25px;
  height: 40px;
  line-height: 40px;
  list-style: none;
  margin-right: 0px !important;
  margin-left: 15px;
}
.topbar ul li a {
  display: block;
  text-align: right;
  text-decoration: none;
}
.list-inline::after {
  content: "";
  display: table;
  clear: both;
}
@media (max-width: 991px) {
  .header-main .logo {
    width:230px;
    line-height:80px;
    position:absolute;
    left:50%;
    transform:translateX(-50%);
    -webkit-transform:translateX(-50%);
    -moz-transform:translateX(-50%);
    -o-transform:translateX(-50%);
    -os-transform:translateX(-50%);
    top:0;
    text-align:center !important
  }
  .header-main .logo img{
	height: 50px;
  }
}

.header-main .logo a {
  display:inline-block
}
@media (max-width: 767px) {
  .menu-bar .fa {
    font-size: 24px;
    color: #f33f62;
  }
}
		@media (max-width: 991px) {
			.menu-bar{
			position:absolute;
			left:15px;
			transform:translateY(-50%);
			-webkit-transform:translateY(-50%);
			-moz-transform:translateY(-50%);
			z-index:1000;
			top:44px
			}
			.menu-bar .fa {
				font-size:26px;
				color:#f33f62;
				content:"";
				width:25px;
				height:25px;
				background-image:url("public/img/buttonmenu.webp");
				background-position:center center;
				background-repeat:no-repeat;
				background-size:contain
			}
			.header-main .logo {
				width: 170px;
				line-height: 80px;
				position: absolute;
				left: 50%;
				transform: translateX(-50%);
				-webkit-transform: translateX(-50%);
				-moz-transform: translateX(-50%);
				-o-transform: translateX(-50%);
				-os-transform: translateX(-50%);
				top: 0;
				text-align: center !important;
			}
			.header-main .logo a {
				display: inline-block;
			}
			@media (max-width: 767px) {
				.logo .logo-wrapper {
					display: inline-block;
					margin: 0 auto;
					max-width: 100%;
				}
			}



		}
         

    </style>