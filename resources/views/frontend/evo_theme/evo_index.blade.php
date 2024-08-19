@extends('frontend.layouts.evo-services')

@section('content')
    @php
        $sitesetting = \App\GeneralSetting::first();
    @endphp

{{--    @include('frontend.inc.evo-service.evo-slide')--}}
    {{--    [dich-vu-trang-chu]--}}
    [gioi-thieu-trang-chu]
    {{--    [widget-afflicate]--}}
    <section class="mb-4">
        <div class="container">
            <div class="row gutters-10">
                @foreach (\App\Banner::where('position', 2)->where('published', 1)->get() as $key => $banner)
                    <div class="col-lg-{{ 12/count(\App\Banner::where('position', 2)->where('published', 1)->get()) }}">
                        <div class="media-banner mb-3 mb-lg-0">
                            <a href="{{ $banner->url }}" target="_blank" class="banner-container">
                                <img src="{{ asset($banner->photo) }}" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{--    [why-choose-us]--}}
    {{--    [out-services]--}}
    @include('frontend.inc.evo-service.evo_outservices',$sitesetting)
    {{--    [banner-promotion]--}}
{{--        @include('frontend.inc.evo-service.evo_intro')--}}
{{--        @include('frontend.inc.evo-service.evo_why_choose')--}}

    {{--    @include('frontend.inc.evo-service.evo_count')--}}

    {{--    @include('frontend.inc.evo-service.evo_products')--}}
    {{--    @include('frontend.inc.evo-service.evo_brands')--}}
    {{--    @include('frontend.inc.evo-service.evo_news')--}}

@endsection
@section('script')
    {{--    <script src="{{asset('frontend\evo\js\evo-index.js')}}"></script>--}}
    {{--    <script src="{{ asset('frontend/js/main.js') }}"></script>--}}
@endsection
