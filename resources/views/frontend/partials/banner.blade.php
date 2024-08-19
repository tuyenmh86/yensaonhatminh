<div class="container">
	@foreach (\App\Banner::where('position', 1)->where('published', 1)->take(1)->get() as $key => $banner)
                    
                        <a href="{{ $banner->url }}" target="_blank" class="banner-container">
                            <img src="{{ asset($banner->photo) }}" alt="" class="img-fluid pl-1 pb-2 pt-0" width="100%">
                        </a>
                @endforeach
</div>
