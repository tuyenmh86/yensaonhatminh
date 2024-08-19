@extends('frontend.layouts.app')


@section('content')

    <section class="gry-bg py-4 bg-white">

        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-3 d-none d-lg-block">
                    @include('frontend.inc.customer_side_nav')
                </div>
                <div class="col-lg-9">
                    <!-- Page title -->
                    <div class="page-title">
                        <div class="row align-items-center">

                            <div class="col-md-6 col-12">
                                <div class="float-md-right">
                                    <ul class="breadcrumb">
                                        <li><a href="{{ route('home') }}">{{__('Home')}}</a></li>
                                        <li class="{{ areActiveRoutesHome(['aff.link'])}}"><a href="{{route('aff.link',Auth::user()->id)}}">Kiếm tiền cùng chúng tôi</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- dashboard content -->
                    <div class="">
                        <div class="row">
                            <div class="panel bg-white" style="padding-top:30px; padding-bottom: 15px;">
                                <div class="">
                                    <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                        Giới thiệu khóa học nhận hoa hồng
                                    </h2>
                                    <p>Chia sẻ link sau cho bạn bè muốn tham gia khóa học để được nhận hoa hồng:</p>
                                </div>
                                <div class="panel-body">
                                    @foreach(\App\Product::where('published',1)->get() as $product)
                                        <ul>
                                            <li>{{$product->link().'?ref='.Auth::user()->id}}</li>
                                        </ul>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
{{--@section('script')
    <link href="{{ asset('plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <script src="{{ asset('plugins/datatables/media/js/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('plugins/datatables/media/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{ asset('plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>
@endsection--}}
