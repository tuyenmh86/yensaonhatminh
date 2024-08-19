<section class="awe-section-9">


    <div class="section_blogs">
        <div class="container">
            <div class="section_service_title text-center">
                <span>Cắt khắc Laser Hải Đông</span>
                <h3><a href="{{route('blogs')}}" title="Tin tức {{config('app.name', 'Laravel')}}">Tin tức công ty</a></h3>
                <p>Những tin tức dự án mới nhất được Hải Đông thực hiện.</p>
            </div>
            <div class="row">
                @foreach (\App\Post::where('published', 1)->where('category_id',7)->orderBy('updated_at', 'desc')->take(3)->get() as $key => $post)
                <div class="col-lg-4 col-md-4">
                    <div class="evo-item-blogs">
                        <div class="evo-article-image">
                            <a href="{{ route('news', ['slug'=>$post->alias])}}"
                               title="{{$post->name}}">
                                <img
                                    src="{{asset($post->featured_img)}}"
                                    data-src="{{asset($post->featured_img)}}"
                                    alt="{{$post->name}}"
                                    class="lazy img-responsive mx-auto d-block loaded" data-was-processed="true">
                            </a>
                        </div>
                        <h3 class="line-clamp"><a href="{{ route('news', ['slug'=>$post->alias])}}"
                                                  title="{{$post->name}}">{{$post->name}}</a></h3>
                        <p> {{$post->description}}</p>
                        <a class="readmore" href="{{ route('news', ['slug'=>$post->alias])}}"
                           title="Đọc tiếp">Đọc tiếp</a>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
