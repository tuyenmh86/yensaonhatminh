<div class="header_nav_main header-menu clearfix">
    <div class="container">
        <div class="heade_menunavs">
            <div class="wrap_main d-flex">
                
                <div class="bg-header-nav d-none d-lg-block">
                    <nav class="header-nav">
                        <ul class="item_big">
                            <li class="nav-item {{areActiveRoutesHome(['home'])}}">
                                <a class="a-img" href="/" title="Trang chủ">
                                    TRANG CHỦ
                                </a>
                            </li>
                            <li class="nav-item {{areActiveRoutesHome(['gioi-thieu'])}}">
                                <a class="a-img" href="/gioi-thieu" title="GIỚI THIỆU">
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
                            {{-- @foreach(App\Category::where('published',1)->get() as $category)
                                <li class="nav-item {{url()->current()==$category->link() ? 'active' : '' }}">
                                    <a class="a-img caret-down" href="{{$category->link()}}" title="{{$category->name}}">
                                        {{$category->name}}
                                    </a>
                                    <i class="fa fa-caret-down"></i>
                                    <ul class="item_small">
                                        @foreach($category->subcategories as $subcategory)
                                            <li>
                                                <a href="{{$subcategory->link()}}" title="{{$subcategory->name}}">{{$subcategory->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach --}}
                            <li class="nav-item">
                                <a class="a-img" href="{{route('lien-he')}}" title="Liên hệ">
                                    LIÊN HỆ
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="container d-lg-none d-md-none d-sm-block">
                    <div class="row pl-4 pr-4">
                        @foreach(\App\Category::where('published',1) as $key=>$category)
                            <div class="menu-col menu-col-{{$key}}" style="width: 50%;">    
                                <a href="" class="menu-heading {{areActiveRoutesHome(['category.slug'])}}" style="color: #900;font-weight: 700;text-transform: uppercase;padding: 5px 0;display: block;">{{$category->name}}</a>
                                @foreach($category->subcategories as $subcategory)
                                    <a href="{{$subcategory->link()}}" class="menu-item" style="font-size: 14px;color: #343a40;padding: 5px 0;display: block;"> {{$subcategory->name}}</a>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('frontend.partials.header.menu_mobile')

<script>
    $('.category-action').click(function(){
        $('.menu_mobile').slideToggle('fast');
    });
</script>
<style>
    .menu-col-2 {
        margin-top: -90px;
    }
    .menu-col-4 {
        margin-top: -185px;
    }
</style>
