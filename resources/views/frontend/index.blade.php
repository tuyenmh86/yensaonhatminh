@extends('frontend.layouts.app')

@section('content')
    
{{-- @include('frontend.partials.slideCarol') --}}
@include('frontend.partials.body.about')

{{-- @include('frontend.partials.body.flashsale') --}}
@include('frontend.partials.body.danhsachsanpham',['products'=>$products])

@include('frontend.partials.body.thanhtuu')

{{-- @include('frontend.partials.banner') --}}

@include('frontend.partials.body.nghenhan')
{{-- @include('frontend.partials.body.sanphamnoibat') --}}
{{-- @include('frontend.partials.featuredCategory') --}}

{{-- @include('frontend.partials.categoryList') --}}
{{-- @include('frontend.partials.flashDeal') --}}

{{-- @include('frontend.partials.best_selling') --}}
{{-- @include('frontend.partials.homeCategory') --}}
{{-- @include('frontend.partials.featured') --}}
{{-- @include('frontend.partials.publishedProduct',['products'=>$products]) --}}

@endsection
