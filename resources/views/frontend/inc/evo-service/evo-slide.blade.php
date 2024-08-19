
{{--    <section class="awe-section-1">--}}
{{--        <div class="home-slider">--}}
{{--            <div class="item">--}}
{{--                <a href="#" class="clearfix" title="Evo Services">--}}
{{--                    <picture>--}}
{{--                        <source--}}
{{--                            media="(min-width: 1200px)"--}}
{{--                            srcset="//bizweb.dktcdn.net/100/367/318/themes/737653/assets/slider_1.jpg?1576815787127">--}}
{{--                        <source--}}
{{--                            media="(min-width: 992px)"--}}
{{--                            srcset="//bizweb.dktcdn.net/100/367/318/themes/737653/assets/slider_1.jpg?1576815787127">--}}
{{--                        <source--}}
{{--                            media="(min-width: 569px)"--}}
{{--                            srcset="//bizweb.dktcdn.net/100/367/318/themes/737653/assets/slider_1.jpg?1576815787127">--}}
{{--                        <source--}}
{{--                            media="(min-width: 480px)"--}}
{{--                            srcset="//bizweb.dktcdn.net/thumb/large/100/367/318/themes/737653/assets/slider_1.jpg?1576815787127">--}}
{{--                        <img--}}
{{--                            src="//bizweb.dktcdn.net/thumb/large/100/367/318/themes/737653/assets/slider_1.jpg?1576815787127"--}}
{{--                            alt="Evo Services" class="lazy img-responsive center-block"/>--}}
{{--                    </picture>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
<section class="awe-section-1">
    <div class="home-slide">
        <div class="home-slide">
            <div class="slick-carousel" data-slick-arrows="true" data-slick-dots="true" data-slick-autoplay="true">
                @foreach (\App\Slider::where('published', 1)->get() as $key => $slider)
                    <div class="" style="">
                        <div class="overlay-1" style="opacity: 0.5; top: 0px;"></div>
                        <div class="overlay-2" style="opacity: 0.5; top: 0px;"></div>
                        <img class="d-block w-100 h-100" src="{{ asset($slider->photo) }}" alt="Slider Image"/>
                    </div>

                @endforeach

                {{--                        <div class="overlay-2" style="opacity: 0.5; bottom: 0px;"></div>--}}
            </div>
        </div>
    </div>
</section>
