@extends('frontend.layouts.evo-services')
@section('style')
    <link href="{{ asset('frontend/evo/css/evo-article.scss.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/evo/css/dropdown.scss.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="evo-themes">
        <section class="bread-crumb margin-bottom-10" style="background-image: url({{asset($post->category->banner)}})">
            <div class="container">
                <h3>{{$post->name}} </h3>
                <ul class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                    <li class="home"><a itemprop="url" href="/" title="Trang chủ"><span itemprop="title">Trang chủ</span></a></li>
                    <li><a itemprop="url" href="{{route('blogs')}}" title="danh sách bài viết {{config('app.name', 'Laravel')}}"><strong itemprop="title">Tất cả tin tức</strong></a></li>
                </ul>
            </div>
        </section>
        <div class="container article-wraper margin-top-20 margin-bottom-20">
            <div class="row">
                <section class="right-content col-md-12 col-lg-9">
                    <article class="article-main" itemscope="" itemtype="http://schema.org/Article">
                        <meta itemprop="mainEntityOfPage" content="{{route('news',['slug'=>$post->alias])}}">
                        <meta itemprop="description" content="{{$post->description}}">
                        <meta itemprop="author" content="{{config('app.name')}}">
                        <meta itemprop="headline" content="{{$post->name}}">
                        <meta itemprop="image" content="{{asset('news/'.$post->featured_img)}}">
                        <meta itemprop="datePublished" content="{{$post->created_at}}">
                        <meta itemprop="dateModified" content="{{$post->updated_at}}">
                        <div class="d-none" itemprop="publisher" itemscope="" itemtype="https://schema.org/Organization">
                            <div itemprop="logo" itemscope="" itemtype="https://schema.org/ImageObject">
                                <img src="{{asset($post->featured_img)}}" alt="{{$post->name}}">
                                <meta itemprop="url" content="{{route('news',['slug'=>$post->alias])}}">
                                <meta itemprop="width" content="200"><meta itemprop="height" content="49">
                            </div>
                            <meta itemprop="name" content="{{$post->name}}">
                        </div>
                        <div class="row">
                            <div class="col-md-12 evo-article margin-bottom-10">
                                <h1 class="title-head">{{$post->name}}</h1>
                                <div class="article-details evo-toc-content">
                                    {!! $post->content !!}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="evo-article-toolbar">
                                    <div class="evo-article-toolbar-left clearfix">
                                        <span class="evo-article-toolbar-head">Bạn đang xem: </span>
                                        <span class="evo-article-toolbar-title" title="{{$post->name}}">{{$post->name}}</span>
                                    </div>
{{--                                    <div class="evo-article-toolbar-right">--}}
{{--                                        <a href="/airvisual-bien-mat-con-ung-dung-nao-xem-chat-luong-khong-khi-tren-dien-thoai-may-tinh" title="Bài trước">--}}
{{--                                           < Bài trước--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </article>
                </section>
                <aside class="evo-toc-sidebar evo-sidebar sidebar left-content col-md-12 col-lg-3">
{{--                    <aside class="aside-item collection-category">--}}
{{--                        <div class="aside-title">--}}
{{--                            <h3 class="title-head margin-top-0">Danh mục</h3>--}}
{{--                        </div>--}}
{{--                        <div class="aside-content">--}}
{{--                            <ul class="navbar-pills nav-category">--}}
{{--                                <li class="nav-item ">--}}
{{--                                    <a class="nav-link" href="/" title="Trang chủ">Trang chủ</a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="/gioi-thieu" class="nav-link" title="Giới thiệu">Giới thiệu</a>--}}
{{--                                    <span class="Collapsible__Plus"></span>--}}
{{--                                    <ul class="dropdown-menu">--}}
{{--                                        <li class="nav-item ">--}}
{{--                                            <a class="nav-link" href="/gioi-thieu" title="Về chúng tôi">Về chúng tôi</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="nav-item ">--}}
{{--                                            <a class="nav-link" href="/he-thong-cua-hang" title="Hệ thống cửa hàng">Hệ thống cửa hàng</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="nav-item ">--}}
{{--                                            <a class="nav-link" href="/cau-hoi-thuong-gap" title="Câu hỏi thường gặp">Câu hỏi thường gặp</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item ">--}}
{{--                                    <a href="/collections/all" class="nav-link" title="Sản phẩm">Sản phẩm</a>--}}
{{--                                    <span class="Collapsible__Plus"></span>--}}
{{--                                    <ul class="dropdown-menu">--}}
{{--                                        <li class="nav-item ">--}}
{{--                                            <a class="nav-link" href="/san-pham-moi" title="Sản phẩm mới">Sản phẩm mới</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item ">--}}
{{--                                    <a href="/blogs/all" class="nav-link" title="Tin tức">Tin tức</a>--}}
{{--                                    <span class="Collapsible__Plus"></span>--}}
{{--                                    <ul class="dropdown-menu">--}}
{{--                                        <li class="nav-item ">--}}
{{--                                            <a class="nav-link" href="/dich-vu" title="Dịch vụ">Dịch vụ</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="nav-item ">--}}
{{--                                            <a class="nav-link" href="/tuyen-dung" title="Tuyển dụng">Tuyển dụng</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="dropdown-submenu nav-item ">--}}
{{--                                            <a class="nav-link" href="/tin-moi" title="Tin mới">Tin mới</a>--}}
{{--                                            <span class="Collapsible__Plus"></span>--}}
{{--                                            <ul class="dropdown-menu">--}}
{{--                                                <li class="nav-item ">--}}
{{--                                                    <a class="nav-link" href="/tin-tuc-khuyen-mai" title="Tin tức khuyến mãi">Tin tức khuyến mãi</a>--}}
{{--                                                </li>--}}
{{--                                                <li class="nav-item ">--}}
{{--                                                    <a class="nav-link" href="/tin-noi-bat" title="Tin nổi bật">Tin nổi bật</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item ">--}}
{{--                                    <a class="nav-link" href="/lien-he" title="Liên hệ">Liên hệ</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </aside>--}}
                    <aside class="aside-item top-news margin-top-20">
                        <div class="aside-title">
                            <h3 class="title-head margin-top-0"><a href="tin-tuc" title="Bài viết nổi bật">Bài viết nổi bật</a></h3>
                        </div>
                        @foreach (\App\Post::where('featured', 1)->where('category_id',$post->category_id)->orderBy('created_at', 'desc')->take(5)->get() as $key => $post)
                        <article class="item clearfix">
                            <a  href="{{ route('news', ['slug'=>$post->alias])}}"  title="{{$post->name}}" class="thumb">
                                <img src="{{asset($post->featured_img)}}" data-src="{{asset($post->featured_img)}}" alt="{{$post->name}}" class="lazy img-responsive center-block loaded" data-was-processed="true">
                            </a>
                            <div class="info">
                                <div class="time">{{$post->created_at}}</div>
                                <h4 class="title usmall"><a href="{{ route('news', ['slug'=>$post->alias])}}" title="{{$post->name}}">{{$post->name}}</a></h4>
                            </div>
                        </article>
                        @endforeach
                    </aside>
                    <aside class="aside-item blog-banner margin-top-30">
                        <a href="#" title="Evo Services" class="single_image_effect">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="//bizweb.dktcdn.net/100/367/318/themes/737653/assets/blog_banner.jpg?1576815787127" alt="Evo Services" class="lazy img-responsive center-block">
                        </a>
                    </aside>
                </aside>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
