@extends('frontend.layouts.app')

@section('content')
    <!-- Page Content -->
    <section class="mb-4 bg-white">
    <div class="container">
        <!-- Page Heading -->
        <h1 class="my-4">
            <small  style="text-transform: uppercase;">{{$post->name}}</small>
        </h1>
        <div class="row">

            <div class="col-md-8">
                <img class="img-fluid" src="{{(isset($post->featured_img)?asset($post->featured_img):'http://placehold.it/700x300') }}" alt="{{$post->name}}">
            </div>

            <div class="col-md-4">
                <h3 class="my-3">{{$post->description}}</h3>
                <p>{!! $post->content !!}</p>

            </div>

        </div>
        <!-- Project One -->

    </div>
    </section>
@endsection
@section('script')

@endsection
