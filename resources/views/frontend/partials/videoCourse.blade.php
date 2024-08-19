<div class="modal-body p-4">
    <div class="row no-gutters cols-xs-space cols-sm-space cols-md-space">
        <div class="col-lg-12">
                <div class="product-gal sticky-top d-flex flex-row-reverse">
{{--                    <video id="vidLesson" width="100%" height="500px;" controls="false" autoplay="autoplay" controlsList="nodownload">--}}
{{--                        <source class="lesson_video" src="{{env('APP_URL').'\public\\'.$lesson->video_url}}" type="video/mp4">--}}
{{--                        <script>--}}
{{--                            document.oncontextmenu = function() {--}}
{{--                                return false;--}}
{{--                            }--}}
{{--                        </script>--}}
{{--                    </video>--}}
                    <div class="embed-responsive embed-responsive-16by9 mb-5">
                        @if ($lesson->youtube != null)
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ explode('=', $lesson->youtube)[0] }}"></iframe>
                        @elseif($lesson->video_url!=null)
                            <video id="vidLesson" width="100%" height="500px;" controls="false" autoplay="autoplay" controlsList="nodownload">--}}
                            <source class="lesson_video" src="{{env('APP_URL').'\public\\'.$lesson->video_url}}" type="video/mp4">
                            <script>
                                document.oncontextmenu = function() {
                                    return false;
                                }
                            </script>
                             </video>
                        @endif

                    </div>
                </div>
        </div>
    </div>
</div>

