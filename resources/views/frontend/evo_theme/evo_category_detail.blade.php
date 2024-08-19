@extends('frontend.layouts.app')
@section('style')
    <link href="{{ asset('frontend/evo/css/evo-article.scss.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/evo/css/dropdown.scss.css')}}" rel="stylesheet">
    <link type="text/css" href="{{ asset('frontend/evo/css/evo-blogs.scss.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="evo-themes">
        <section class="bread-crumb margin-bottom-10" style="background-image: url({{asset($categorypost->banner)}})">
            <div class="container">
                <h3>{{$categorypost->name}} </h3>
                <ul class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                    <li class="home"><a itemprop="url" href="/" title="Trang chủ"><span itemprop="title">Trang chủ</span></a></li>

                    @if($categorypost->parent)
                        <li> <a itemprop="url" href="{{$categorypost->link()}}" title="{{$categorypost->parent->name}}">
                                <strong itemprop="title">{{$categorypost->parent->name}}</strong></a>
                        </li>
                    @endif
                    <li>
                        <a itemprop="url" href="{{$categorypost->link()}}" title="{{$categorypost->name}}">
                            <strong itemprop="title">{{$categorypost->name}}</strong></a>
                    </li>
                </ul>
            </div>
        </section>
        <div class="container article-wraper margin-top-20 margin-bottom-20" style="padding-top:20px;padding-bottom: 20px;">
            <div class="row">
                <section class="right-content col-md-12 col-lg-9">
                    <article class="article-main" itemscope="" itemtype="http://schema.org/Article">
                        <meta itemprop="mainEntityOfPage" content="{{route('categories.CategoryPost',['slug'=>$categorypost->alias])}}">
                        <meta itemprop="description" content="{{$categorypost->description}}">
                        <meta itemprop="author" content="{{config('app.name')}}">
                        <meta itemprop="headline" content="{{$categorypost->name}}">
                        <meta itemprop="image" content="{{asset($categorypost->icon)}}">
                        <meta itemprop="datePublished" content="{{$categorypost->created_at}}">
                        <meta itemprop="dateModified" content="{{$categorypost->updated_at}}">
                        <div class="d-none" itemprop="publisher" itemscope="" itemtype="https://schema.org/Organization">
                            <div itemprop="logo" itemscope="" itemtype="https://schema.org/ImageObject">
                                <img src="{{asset($categorypost->icon)}}" alt="{{$categorypost->name}}">
                                <meta itemprop="url" content="{{route('categories.CategoryPost',['slug'=>$categorypost->alias])}}">
                                <meta itemprop="width" content="200"><meta itemprop="height" content="49">
                            </div>
                            <meta itemprop="name" content="{{$categorypost->name}}">
                        </div>
                        <div class="row">
                            <div class="container">
                                @foreach($posts as $blog)
                                    <div class="col-md-4 col-sm-6 col-xs-12 clearfix">
                                        <article class="blog-item">
                                            <div class="blog-item-thumbnail">
                                                <a href="{{route('news',['slug'=>$blog->alias])}}" title="{{$blog->name}}">

                                                    <img src="{{asset($blog->featured_img)}}" data-src="{{asset($blog->featured_img)}}" alt="{{$blog->name}}" class="lazy img-responsive center-block loaded" data-was-processed="true">

                                                </a>
                                            </div>
                                            <div class="blog-item-mains">
                                                <div class="post-time"><img width="20px" src="//bizweb.dktcdn.net/100/367/318/themes/737653/assets/calendar.svg?1576815787127" alt="{{$blog->name}}">{{$blog->created_at}}</div>
                                                <h3 class="blog-item-name"><a href="{{$blog->link()}}" title="{{$blog->name}}">{{$blog->name}}</a></h3>
                                                <p class="blog-item-summary margin-bottom-5"> {{$blog->description}}</p>
                                                <a class="readmore" href="{{$blog->link()}}" title="Đọc tiếp">Đọc tiếp</a>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach
                            </div>



                            @if($categorypost->children)
                                <div class="row margin-bottom-10">
                                @foreach($categorypost->children as $child)
                                    <div class="col-lg-4 col-md-4 ">
                                        <div class="services-box category-widget">
                                            <a href="{{route('categories.CategoryPost',$child->alias)}}">
                                            <h1 class="title-head">{{$child->name}}</h1>
                                            </a>
                                            <div class="article-details evo-toc-content">
                                                {{$child->description}}
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            @else
                                <div class="col-md-12 evo-article margin-bottom-10">
                                    <div class="article-details evo-toc-content">
                                        {{$categorypost->description}}
                                    </div>
                                </div>
                            @endif

                            <div class="col-md-12">
                                <div class="evo-article-toolbar">
                                    <div class="evo-article-toolbar-left clearfix">
                                        <span class="evo-article-toolbar-head">Bạn đang xem: </span>
                                        <span class="evo-article-toolbar-title" title="{{$categorypost->name}}">{{$categorypost->name}}</span>
                                    </div>
{{--                                                                        <div class="evo-article-toolbar-right">--}}
{{--                                                                            <a href="/airvisual-bien-mat-con-ung-dung-nao-xem-chat-luong-khong-khi-tren-dien-thoai-may-tinh" title="Bài trước">--}}
{{--                                                                               < Bài trước--}}
{{--                                                                            </a>--}}
{{--                                                                        </div>--}}
                                </div>
                            </div>
                        </div>
                    </article>
                </section>
                <aside class="evo-toc-sidebar evo-sidebar sidebar left-content col-md-12 col-lg-3">
                    <aside class="aside-item collection-category">
                        <div class="aside-title">
                            <h3 class="title-head margin-top-0">Danh mục</h3>
                        </div>
                        <div class="aside-content">
                            <ul class="navbar-pills nav-category">
                                <li class="nav-item ">
                                    <a class="nav-link" href="/" title="Trang chủ">Trang chủ</a>
                                </li>
                                @foreach (\App\CategoriesPost::where('parent_id', 0)->where('headmenu',1)->orderBy('pos', 'asc')->take(5)->get() as $key => $cate)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('categories.CategoryPost',$cate->alias)}}" title="Tin mới">{{$cate->name}}</a>
                                        @if($cate->children)
                                            <span class="Collapsible__Plus"></span>
                                            <ul class="dropdown-menu">
                                                @foreach($cate->children as $child)
                                                    <li class="nav-item ">
                                                        <a class="nav-link" href="{{route('categories.CategoryPost',$child->alias)}}" title="{{$child->name}}">{{$child->name}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                                <li class="nav-item ">
                                    <a class="nav-link" href="/lien-he" title="Liên hệ">Liên hệ</a>
                                </li>
                            </ul>
                        </div>
                    </aside>
                    <aside class="aside-item top-news margin-top-20">
                        <div class="aside-title">
                            <h3 class="title-head margin-top-0"><a href="tin-tuc" title="Bài viết nổi bật">Bài viết nổi bật</a></h3>
                        </div>
                        @foreach (\App\Post::where('featured', 1)->where('published',1)->orderBy('created_at', 'desc')->take(5)->get() as $key => $post)
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
{{--                    <aside class="aside-item blog-banner margin-top-30">--}}
{{--                        <a href="#" title="Evo Services" class="single_image_effect">--}}
{{--                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="//bizweb.dktcdn.net/100/367/318/themes/737653/assets/blog_banner.jpg?1576815787127" alt="Evo Services" class="lazy img-responsive center-block">--}}
{{--                        </a>--}}
{{--                    </aside>--}}
                </aside>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
