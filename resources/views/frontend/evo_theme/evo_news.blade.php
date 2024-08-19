@extends('frontend.layouts.evo-services')
@section('style')
    <link type="text/css" href="{{ asset('frontend/evo/css/evo-blogs.scss.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="evo-themes">
    <section class="bread-crumb margin-bottom-10">
        <div class="container">

            <h3>Tất cả tin tức </h3>
            <ul class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                <li class="home"><a itemprop="url" href="/" title="Trang chủ"><span itemprop="title">Trang chủ</span></a></li>
                <li><strong itemprop="title">Tất cả tin tức</strong></li>
            </ul>
        </div>
    </section>
    <div class="container margin-top-10" itemscope="" itemtype="http://schema.org/Blog">
        <meta itemprop="name" content="{{$category->name}}">
        <meta itemprop="description" content="{{$category->description}}">
        <div class="row">
            <div class="col-md-12">
                <div class="evo-list-blog-page margin-top-30">
                    <h1 class="title-head d-none">Tất cả tin tức</h1>


                    <section class="list-blogs blog-main">
                        <div class="row">

                            @foreach($posts as $blog)
                            <div class="col-md-4 col-sm-6 col-xs-12 clearfix">
                                <article class="blog-item">
                                    <div class="blog-item-thumbnail">
                                        <a href="{{route('news',['slug'=>$blog->alias])}}" title="{{$blog->name}}">

                                            <img src="{{asset($blog->featured_img)}}" data-src="{{asset($blog->featured_img)}}" alt="{{$blog->name}}" class="lazy img-responsive center-block loaded" data-was-processed="true">

                                        </a>
                                    </div>
                                    <div class="blog-item-mains">
                                        <div class="post-time"><img src="//bizweb.dktcdn.net/100/367/318/themes/737653/assets/calendar.svg?1576815787127" alt="{{$blog->name}}">{{$blog->created_at}}</div>
                                        <h3 class="blog-item-name"><a href="{{route('news',['slug'=>$blog->alias])}}" title="{{$blog->name}}">{{$blog->name}}</a></h3>
                                        <p class="blog-item-summary margin-bottom-5"> {{$blog->description}}</p>
                                        <a class="readmore" href="{{route('news',['slug'=>$blog->alias])}}" title="Đọc tiếp">Đọc tiếp</a>
                                    </div>
                                </article>
                            </div>
                            @endforeach


                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="text-xs-right text-center pagging-css">{{ $posts->links() }}</div>
                            </div>
                        </div>
                    </section>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection
