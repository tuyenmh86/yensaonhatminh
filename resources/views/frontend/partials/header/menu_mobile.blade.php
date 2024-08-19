<div class="menu_mobile max_991 d-sm-none" style="display: none;">
    <ul class="ul_collections">
        <li class="nav-item {{areActiveRoutesHome(['home'])}}">
            <a class="a-img" href="/" title="Trang chủ">
                TRANG CHỦ
            </a>
        </li>
        <li class="nav-item {{areActiveRoutesHome(['gioi-thieu'])}}">
            <a class="a-img" href="{{route('gioi-thieu')}}" title="GIỚI THIỆU">
                GIỚI THIỆU
            </a>
        </li>
        <li class="nav-item {{areActiveRoutesHome(['quy-trinh'])}}">
            <a class="a-img" href="{{route('quy-trinh')}}" title="QUY TRÌNH">
                QUY TRÌNH
            </a>
        </li>
        <li class="nav-item {{areActiveRoutesHome(['san-pham-choi-dot'])}}">
            <a class="a-img" href="{{route('san-pham-choi-dot')}}" title="SẢN PHẨM">
                SẢN PHẨM
            </a>
        </li>
        <li class="nav-item">
            <a class="a-img" href="{{route('lien-he')}}" title="Liên hệ">
                LIÊN HỆ
            </a>
        </li>
    </ul>


</div>

<style>
     .menu_mobile .ul_collections {
    width:100%;
    float:left
  }
  .menu_mobile .ul_collections li {
    position:relative;
    background:#fff;
    display:block;
    border-top:solid  1px #e4ebf0
  }
  .menu_mobile .ul_collections li:last-child {
    border-bottom:solid 1px #e4ebf0
  }
  .menu_mobile .ul_collections li.special {
    background:#f5f5f5
  }
  .menu_mobile .ul_collections li.special a {
    color:#f33f62;
    font-weight:700;
    font-family:"Roboto","HelveticaNeue","Helvetica Neue",sans-serif;
    font-size:14px;
    text-decoration:none;
    padding:10px 15px
  }
  .menu_mobile .ul_collections li.current {
    background:#ebebeb
  }
  .menu_mobile .ul_collections li .level0 .level1 {
    background:#f5f4f4
  }
  .menu_mobile .ul_collections li .level0 .level1.current>a {
    color:#f33f62
  }
  .menu_mobile .ul_collections li .level0 .level1.current>a:before {
    border-color:#f33f62
  }
  .menu_mobile .ul_collections li .level0 .level1.current>.fa {
    color:#e63939
  }
  .menu_mobile .ul_collections li .level0 .level1 a {
    padding:10px 15px 10px 45px;
    position:relative;
    line-height:22px
  }
  .menu_mobile .ul_collections li .level0 .level1 a:before {
    content:"";
    top:16px;
    left:25px;
    position:absolute;
    width:9px;
    height:9px;
    border:solid 2px #d7d7d7;
    border-radius:50%
  }
  .menu_mobile .ul_collections li .level0 .level1:last-child {
    border-bottom:0px
  }
  .menu_mobile .ul_collections li .level0 .level1 .level1.current {
    border-top:0px
  }
  .menu_mobile .ul_collections li .level0 .level1 .level1.current>a {
    color:#f33f62
  }
  .menu_mobile .ul_collections li .level0 .level1 .level1.current>a:before {
    border-color:#f33f62
  }
  .menu_mobile .ul_collections li .level0 .level1 .level1.current>.fa {
    color:#e63939
  }
  .menu_mobile .ul_collections li .level0 .level1 .level1:last-child {
    border-bottom:0px
  }
  .menu_mobile .ul_collections li .level0 .level1 .level1 .level2,
  .menu_mobile .ul_collections li .level0 .level1 .level1 .level3 {
    background:#f5f4f4
  }
  .menu_mobile .ul_collections li .level0 .level1 .level1 .level2 a,
  .menu_mobile .ul_collections li .level0 .level1 .level1 .level3 a {
    padding:10px 30px 10px 65px;
    position:relative;
    line-height:22px
  }
  .menu_mobile .ul_collections li .level0 .level1 .level1 .level2 a:before,
  .menu_mobile .ul_collections li .level0 .level1 .level1 .level3 a:before {
    content:"";
    top:16px;
    left:45px;
    position:absolute;
    width:9px;
    height:9px;
    border:solid 2px #d7d7d7;
    border-radius:50%
  }
  .menu_mobile .ul_collections li .level0 .level1 .level1 .level2.current>a,
  .menu_mobile .ul_collections li .level0 .level1 .level1 .level3.current>a {
    color:#f33f62
  }
  .menu_mobile .ul_collections li .level0 .level1 .level1 .level2.current>a:before,
  .menu_mobile .ul_collections li .level0 .level1 .level1 .level3.current>a:before {
    border-color:#f33f62
  }
  .menu_mobile .ul_collections li .level0 .level1 .level1 .level2.current>.fa,
  .menu_mobile .ul_collections li .level0 .level1 .level1 .level3.current>.fa {
    color:#e63939
  }
  .menu_mobile .ul_collections li .level0 .level1 .level1 .level2:last-child,
  .menu_mobile .ul_collections li .level0 .level1 .level1 .level3:last-child {
    border-bottom:0px
  }
  .menu_mobile .ul_collections li .level0 .level1 .level1 .level3 a:before {
    border-radius:0
  }
  .menu_mobile .ul_collections li .fa {
    position:absolute;
    right:10px;
    width:30px;
    top:13px;
    text-align:center
  }
  .menu_mobile .ul_collections li a {
    padding:10px 15px;
    font-size:14px;
    display:block;
    color:#737e95;
    text-decoration:none
  }
  .menu_mobile .ul_ {
    width:100%;
    float:left
  }
  .menu_mobile .ul_ li span {
    padding-left:15px
  }
  .menu_mobile .ul_ li .phone_ {
    color:red;
    padding-left:5px
  }
  .menu_mobile .ul_ li a {
    color:#111111;
    font-weight:400;
    font-family:"Roboto","HelveticaNeue","Helvetica Neue",sans-serif;
    font-size:15px;
    text-decoration:none;
    padding:10px 15px
  }
  </style>