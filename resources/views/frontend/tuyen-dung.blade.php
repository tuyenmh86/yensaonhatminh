@extends('frontend.layouts.app')

@section('content')
    <section class="home-banner-area bg-white">
        <div class="container-fluit">
            <div class="home-slide">
                <div class="slick-carousel" data-slick-arrows="true" data-slick-dots="true" data-slick-autoplay="true">
                    @foreach (\App\Slider::where('published', 1)->get() as $key => $slider)
                        <div class="">
                            <img class="img-responsive w-100" src="{{ asset($slider->photo) }}" alt="Slider Image">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white mt-4">
        <div class="row">
            <div class="container">
                <div class="col-md-9 col-sm-12 col-xs-12 content-right pull-right">
                    <?php
                        $tuyendung = \App\CategoriesPost::where('alias','tuyen-dung')->first();
                    ?>
                    @foreach(\App\Post::where('category_id',$tuyendung->id)->orderBy('created_at','desc')->get() as $post)
                        <div class="row">
                            <div class="tinright">
                                <a href="{{$post->link()}}" title="{{$post->name}}">
                                    <picture>
                                        <source media="(max-width: 1023px)" srcset="{{asset($post->featured_img)}}">
                                        <source media="(min-width: 1024px)" srcset="{{asset($post->featured_img)}}">
                                        <img class="img-responsive" src="{{asset($post->featured_img)}}" alt="{{$post->name}}">
                                    </picture>
                                </a>
                                <h5 class="title_h5"><a href="{{$post->link()}}" title="{{$post->name}}">{{$post->name}}</a></h5>
                                <div class="summany summany-home line-clamp">
                                    {{$post->description }}
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="col-md-3 col-xs-12 pull-left content-left hidden-xs hidden-sm">
                    @foreach(App\Category::where('id',73)->get() as $category)
                        @foreach($category->subcategories as $subcategory)
                            <div class="box_left">
                                <h2 class="title-left">
                                    <a href="{{$subcategory->link()}}" title="{{$subcategory->name}}"><i class="fa fa-bullseye" aria-hidden="true"></i> {{$subcategory->name}}</a>
                                </h2>
                                <ul>
                                    @foreach($subcategory->subsubcategories as $subsubcategory)
                                        <li><h3 class="title_h3 transition"><a href="{{$subsubcategory->link()}}" title="{{$subsubcategory->name}}"><i class="fa fa-angle-right" aria-hidden="true"></i> {{$subsubcategory->name}}</a></h3></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>

        </div>

    </section>

@endsection
