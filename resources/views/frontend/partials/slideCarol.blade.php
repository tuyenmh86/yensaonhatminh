

<section class="home-banner-area bg-white">
       
        	<div class="row">
                <div class="container">
                <div class="col-lg-12 col-md-12 col-12 pt-3 pl-4 pr-0">
                    <div class="home-slide">
                            <div class="slick-carousel" data-slick-arrows="true" data-slick-dots="false" data-slick-autoplay="true">
                                    @foreach (\App\Slider::where('published', 1)->get() as $key => $slider)
                                        <div class="">
                                            <img class="img-responsive w-100" src="{{ asset($slider->photo) }}" alt="Slider Image">
                                        </div>
                                    @endforeach
                            </div>
                    </div>
                </div>	
                {{-- <div class="col-lg-4 col-md-4 col-4 pt-3 pl-0">
                    @foreach (\App\Banner::where('position', 1)->where('published', 1)->take(2)->get() as $key => $banner)
                        
                            <a href="{{ $banner->url }}" target="_blank" class="banner-container">
                                <img src="{{ asset($banner->photo) }}" alt="" class="img-fluid pl-1 pb-2 pt-0">
                            </a>
                    @endforeach
                </div> --}}
            </div>
        </div>
</section>
    {{-- <section class="home-banner-area bg-white d-block d-sm-none d-md-none">
        <div class="container">
            <div class="home-slide">
                <div class="slick-carousel" data-slick-arrows="true" data-slick-dots="false" data-slick-autoplay="true">
                    @foreach (\App\Slider::where('published', 1)->where('photos_mobile','!=','')->get() as $key => $slider)

                        <div class="">
                            <img class="img-responsive w-100" style="min-height:270px;" src="{{ asset($slider->photos_mobile) }}" alt="Slider Image">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section> --}}