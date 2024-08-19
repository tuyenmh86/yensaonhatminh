@extends('frontend.layouts.app')
@section('style')
    <link type="text/css" href="{{ asset('frontend/evo/css/evo-blogs.scss.css') }}" rel="stylesheet">
@endsection
@section('meta')
    <meta name="description" content="{{$page->seo_description}}">
    <meta name="keywords" content="{{$page->seo_keywords}}">
    <meta name="author" content="{{config('app.name')}}">
@endsection
@section('content')

    <div class="evo-themes">

    <section class="bread-crumb margin-bottom-10">
        <div class="container">
            <h3>{{$page->name}}</h3>

            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">{{__('Home')}}</a></li>
                <li class="{{ areActiveRoutesHome(['page'])}}"><a href="{{ route('page',[$page->slug]) }}">{{$page->name}}</a></li>
            </ul>
        </div>
    </section>

        <section class="Page-detail">
            <article class="article-main" itemscope="" itemtype="http://schema.org/Article">
                <meta itemprop="mainEntityOfPage" content="{{$page->link()}}">
                <meta itemprop="description" content="{{$page->description}}">
                <meta itemprop="author" content="{{config('app.name')}}">
                <meta itemprop="headline" content="{{$page->name}}">
                <meta itemprop="image" content="{{asset('news/'.$page->featured_img)}}">
                <meta itemprop="datePublished" content="{{$page->created_at}}">
                <meta itemprop="dateModified" content="{{$page->updated_at}}">
                <div class="d-none" itemprop="publisher" itemscope="" itemtype="https://schema.org/Organization">
                    <div itemprop="logo" itemscope="" itemtype="https://schema.org/ImageObject">
                        <img src="{{asset($page->featured_img)}}" alt="{{$page->name}}">
                                <meta itemprop="url" content="{{$page->link()}}">
                        <meta itemprop="width" content="200"><meta itemprop="height" content="49">
                    </div>
                    <meta itemprop="name" content="{{$page->name}}">
                </div>
                <div class="row">
                    <div class="container">
{{--                        <h1 class="title-head">{{$page->name}}</h1>--}}
                        <div class="article-details evo-toc-content">
                            {!! $page->content !!}
                        </div>
                    </div>
                    <div class="container">
                        <div class="evo-article-toolbar">
                            <div class="evo-article-toolbar-left clearfix">
                                <span class="evo-article-toolbar-head">Bạn đang xem: </span>
                                <span class="evo-article-toolbar-title" title="{{$page->name}}">{{$page->name}}</span>
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
@endsection
@section('script')

@endsection
