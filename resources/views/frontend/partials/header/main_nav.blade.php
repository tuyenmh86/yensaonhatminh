<div class="main-nav d-none d-md-block">
    <div class="container nav-head">
        <div class="row">
            <div class="col-lg-11 col-md-11 ">
                <nav class="hidden-sm hidden-xs nav-main header-nav">
                    <div class="menu_hed head_1">
                        <ul class="nav nav_1 item_big">
                        
                                <li class="nav-item nav-items {{areActiveRoutesHome(['home'])}}">
                                    <a class="nav-link a-img" href="/" title="Trang chủ">
                                        TRANG CHỦ
                                    </a>
                                </li>
                                <li class="nav-item nav-items {{areActiveRoutesHome(['gioi-thieu'])}}">
                                    <a class="nav-link a-img" href="/gioi-thieu" title="GIỚI THIỆU">
                                        GIỚI THIỆU
                                    </a>
                                </li>
                                <li class="nav-item nav-items {{areActiveRoutesHome(['quy-trinh'])}}">
                                    <a class="nav-link a-img" href="{{route('quy-trinh')}}" title="QUY TRÌNH">
                                        QUY TRÌNH
                                    </a>
                                </li>
                                <li class="nav-item nav-items {{areActiveRoutesHome(['san-pham-choi-dot'])}}">
                                    <a class="nav-link a-img" href="{{route('san-pham-choi-dot')}}" title="SẢN PHẨM">
                                        SẢN PHẨM
                                    </a>
                                </li>
                                <li class="nav-item nav-items">
                                    <a class="nav-link a-img" href="{{route('lien-he')}}" title="Liên hệ">
                                        LIÊN HỆ
                                    </a>
                                </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-lg-1 col-md-1 content_search_cart">
                <div class="search_menu">
                    <div class="search_inner"> <i class="fa fa-search"></i>
                        <div class="search-box">
                            <div class="header_search search_form" style="display: none;">
                                <form class="input-group search-bar search_form" action="/search" method="get"
                                    role="search"> <input type="search" name="query" value=""
                                        placeholder="Tìm kiếm dịch vụ... "
                                        class="input-group-field st-default-search-input search-text"
                                        autocomplete="off"> <span class="input-group-btn"> <button
                                            class="btn icon-fallback-text"> <i class="fa fa-search"></i> </button>
                                    </span> 
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<style>
.main-nav {
  width:100%;
  float:left;
  height:58px;
  line-height:58px;
  background:#1fb65e
}
.main-nav .menu_hed {
  height:58px
}
.main-nav .menu_hed .nav {
  height:58px;
  line-height:58px
}
.main-nav .menu_hed .nav.nav_1 {
  text-align:left;
  float:left;
  width:100%
}
@media (max-width: 1199px) {
  .main-nav .menu_hed .nav.nav_1 {
    text-align:left
  }
}
.main-nav .menu_hed .nav.nav_2 {
  text-align:right;
  float:right
}
.main-nav .menu_hed .nav li {
  display:inline-block
}
.main-nav .menu_hed .nav li.nav-item a {
  padding:0px 25px
}
@media (max-width: 1199px) {
  .main-nav .menu_hed .nav li.nav-item a {
    padding:0px 5px
  }
}
.main-nav .menu_hed .nav li.nav-item.active a {
  color:#fff
}
.main-nav .menu_hed .nav li.menu_hover:hover>a:before {
  opacity:1
}
.main-nav .menu_hed .nav li.menu_hover>a:before {
  opacity:0;
  width:0;
  height:0;
  border-left:12px solid transparent;
  border-right:12px solid transparent;
  border-bottom:7px solid #f33f62;
  position:absolute;
  bottom:0px;
  left:50%;
  top:auto !important;
  transform:translateX(-50%)
}
.main-nav .menu_hed .nav .nav-item {
  position:relative;
  background:transparent;
  padding:0px 0px;
  z-index:3
}
@media (max-width: 1199px) {
  .main-nav .menu_hed .nav .nav-item {
    padding:0px 5px
  }
}
.main-nav .menu_hed .nav .nav-item.active>a {
  color:#fff;
  background:#ce9344;
  border-radius:0px
}
.main-nav .menu_hed .nav .nav-item.active>a:before {
  top:-5px
}
.main-nav .menu_hed .nav .nav-item.active>a .fa {
  color:#fff
}
.main-nav .menu_hed .nav .nav-item li {
  display:block;
  width:100%
}
.main-nav .menu_hed .nav .nav-item.has-mega {
  position:static
}
.main-nav .menu_hed .nav .nav-item>a {
  line-height:58px;
  color:#fff;
  font-size:16px;
  font-family:"Roboto",sans-serif;
  font-weight:700;
  padding:0px 25px 0px;
  z-index:5;
  position:relative
}
.main-nav .menu_hed .nav .nav-item>.fa {
  color:#737e95;
  position:absolute;
  right:5px;
  top:32px
}
.main-nav .menu_hed .nav .nav-item .nav-item-lv2 {
  padding:0 10px;
  position:relative
}
.main-nav .menu_hed .nav .nav-item .nav-item-lv2 .fa {
  position:absolute;
  right:0px;
  padding:0px 10px;
  top:5px;
  line-height:31px;
  color:#1d3046
}
.main-nav .menu_hed .nav .nav-item .nav-item-lv3 {
  padding:0 10px;
  position:relative
}
.main-nav .menu_hed .nav .nav-item .nav-item-lv3 .fa {
  position:absolute;
  right:0px;
  padding:0px 10px;
  top:5px;
  line-height:41px
}
.main-nav .menu_hed .nav .nav-item:hover>a {
  color:#fff;
  background:#ce9344;
  border-radius:0px
}
.main-nav .menu_hed .nav .nav-item:hover>a:before {
  top:-5px
}
.main-nav .menu_hed .nav .nav-item:hover>a:after {
  opacity:1
}
.main-nav .menu_hed .nav .nav-item:hover>.fa {
  color:#fff
}
.main-nav .menu_hed .nav .nav-item:hover>.dropdown-menu {
  display:block;
  margin-top:0px;
  border-top:0px;
  border-radius:0px;
  width:200px;
  padding:0px 0px 0px 0px;
  background:#fff;
  border:solid 1px #ebebeb;
  border-top:solid 1px #fff;
  z-index:9
}
.main-nav .menu_hed .nav .nav-item:hover>.dropdown-menu li {
  padding:5px 0px;
  border-bottom:solid 1px #ebebeb
}
.main-nav .menu_hed .nav .nav-item:hover>.dropdown-menu li:first-child {
  border-top:solid 1px #ebebeb
}
.main-nav .menu_hed .nav .nav-item:hover>.dropdown-menu li>a {
  font-family:"Roboto",sans-serif;
  display:block;
  padding:5px 10px 5px 10px;
  color:#737e95
}
.main-nav .menu_hed .nav .nav-item:hover>.dropdown-menu li>a .fa {
  float:right;
  line-height:18px;
  font-size:16px;
  color:#737e95
}
.main-nav .menu_hed .nav .nav-item:hover>.dropdown-menu li>a:before {
  width:4px;
  height:4px;
  background:#f33f62;
  position:absolute;
  left:10px;
  padding-right:5px;
  top:13px;
  opacity:0
}
.main-nav .menu_hed .nav .nav-item:hover>.dropdown-menu li:last-child>a {
  border-bottom:0px
}
.main-nav .menu_hed .nav .nav-item:hover>.dropdown-menu li:hover {
  background:#d80e35;
  color:#fff
}
.main-nav .menu_hed .nav .nav-item:hover>.dropdown-menu li:hover .fa {
  color:#fff
}
.main-nav .menu_hed .nav .nav-item:hover>.dropdown-menu li:hover>a {
  background:#d80e35;
  color:#fff;
  padding:5px 10px 5px 10px
}
.main-nav .menu_hed .nav .nav-item:hover>.dropdown-menu li:hover>a .fa {
  color:#fff
}
.main-nav .menu_hed .nav .nav-item:hover>.dropdown-menu li:hover>a:before {
  opacity:1
}
.main-nav .menu_hed .nav .nav-item:hover>.dropdown-menu li:hover>.fa {
  color:#fff
}
.main-nav .menu_hed .nav .nav-item:hover>.mega-content {
  display:block
}
.main-nav .menu_hed .nav .nav-item li.dropdown-submenu {
  position:relative
}
.main-nav .menu_hed .nav .nav-item li.dropdown-submenu:hover>a:after {
  opacity:1
}
.main-nav .menu_hed .nav .nav-item li.dropdown-submenu>a:after {
  width:0;
  height:0;
  border-style:solid;
  border-width:7.5px 12px 7.5px 0;
  border-color:transparent #fff transparent transparent;
  position:absolute;
  left:100%;
  top:33%;
  opacity:0
}
.main-nav .menu_hed .nav .nav-item li.dropdown-submenu .lv-4 {
  margin-top:-5px
}
.main-nav .menu_hed .nav .nav-item li.dropdown-submenu .dropdown-menu,
.main-nav .menu_hed .nav .nav-item li.dropdown-submenu .lv-4 {
  display:none;
  margin-top:0;
  border-top:0px;
  border-radius:0px;
  width:200px;
  padding:0px;
  left:100%;
  top:-1px;
  background:#fff;
  border:solid 1px #ebebeb
}
@media (max-width: 1199px) {
  .main-nav .menu_hed .nav .nav-item li.dropdown-submenu .dropdown-menu.media_left,
  .main-nav .menu_hed .nav .nav-item li.dropdown-submenu .lv-4.media_left {
    left:-100% !important
  }
}
.main-nav .menu_hed .nav .nav-item li.dropdown-submenu .dropdown-menu li,
.main-nav .menu_hed .nav .nav-item li.dropdown-submenu .lv-4 li {
  padding:5px 0px;
  border-bottom:solid 1px #ebebeb
}
.main-nav .menu_hed .nav .nav-item li.dropdown-submenu .dropdown-menu li>a,
.main-nav .menu_hed .nav .nav-item li.dropdown-submenu .lv-4 li>a {
  font-family:"Roboto",sans-serif;
  display:block;
  padding:5px 10px;
  color:#737e95
}
.main-nav .menu_hed .nav .nav-item li.dropdown-submenu .dropdown-menu li .fa,
.main-nav .menu_hed .nav .nav-item li.dropdown-submenu .lv-4 li .fa {
  position:absolute;
  right:0px;
  padding:0px 5px;
  top:5px;
  line-height:41px;
  color:#737e95
}
.main-nav .menu_hed .nav .nav-item li.dropdown-submenu .dropdown-menu li:last-child>a,
.main-nav .menu_hed .nav .nav-item li.dropdown-submenu .lv-4 li:last-child>a {
  border-bottom:0px
}
.main-nav .menu_hed .nav .nav-item li.dropdown-submenu .dropdown-menu li:hover>a,
.main-nav .menu_hed .nav .nav-item li.dropdown-submenu .lv-4 li:hover>a {
  background:#d80e35;
  color:#fff
}
.main-nav .menu_hed .nav .nav-item li.dropdown-submenu .dropdown-menu li:hover>a .fa,
.main-nav .menu_hed .nav .nav-item li.dropdown-submenu .lv-4 li:hover>a .fa {
  color:#fff
}
.main-nav .menu_hed .nav .nav-item li.dropdown-submenu .dropdown-menu li:hover,
.main-nav .menu_hed .nav .nav-item li.dropdown-submenu .lv-4 li:hover {
  background:#d80e35
}
.main-nav .menu_hed .nav .nav-item li.dropdown-submenu .dropdown-menu li:hover .fa,
.main-nav .menu_hed .nav .nav-item li.dropdown-submenu .lv-4 li:hover .fa {
  color:#fff
}
.main-nav .menu_hed .nav .nav-item li.dropdown-submenu .dropdown-menu li:hover>.lv-4,
.main-nav .menu_hed .nav .nav-item li.dropdown-submenu .lv-4 li:hover>.lv-4 {
  display:block;
  border-top:0px;
  border-radius:0px
}
.main-nav .menu_hed .nav .nav-item li.dropdown-submenu:hover>a:after {
  opacity:1
}
.main-nav .menu_hed .nav .nav-item li.dropdown-submenu:hover>.dropdown-menu {
  display:block;
  border-top-color:#f33f62;
  border-radius:0px
}
.main-nav .menu_hed .nav .mega-content .level1.item {
  float:left;
  width:25%;
  padding:0 5px
}
@media (min-width: 1200px) {
  .main-nav .menu_hed .nav .mega-content .level1.item.col-lg-3:nth-child(4n+1) {
    clear:left
  }
}
</style>