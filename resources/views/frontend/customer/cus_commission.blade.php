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
                                <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                    Hoa hồng giới thiệu
                                </h2>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="float-md-right">
                                    <ul class="breadcrumb">
                                        <li><a href="{{ route('home') }}">{{__('Home')}}</a></li>
                                        <li class="active"><a href="{{route('commission.custommer',['user_id'=>Auth::user()->id])}}">Hoa hồng giới thiệu</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- dashboard content -->
                    <div class="">
                        <div class="row">

                            <div class="panel bg-white pad-top">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Danh sách hoa hồng của bạn</h3>

                                </div>
                                <div class="panel-body">
                                    <div class="col-lg-12">
                                    <form class="form form-horizontal mar-top" action="{{route('commission.month',['user_id'=>Auth::user()->id])}}" method="POST" enctype="multipart/form-data" id="choice_form">
                                        @csrf
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Tháng</label>
                                            <div class="col-lg-5">
                                                <select class="form-control demo-select2-placeholder" name="month" id="month" required>
                                                    @for($i=1;$i<=12;$i++)
                                                        <option value="{{$i}}" onselect="filter_by_month({{$i}})">{{'Tháng '. $i}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="col-lg-5"> <button type="submit" name="button" class="btn btn-info">{{ 'Lọc' }}</button></div>
                                        </div>

                                    </form>
                                    </div>
                                    <table class="table table-striped table-bordered demo-dt-basic dataTable" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên khách</th>
                                            <th>Email khách</th>
                                            <th>Khóa học</th>
                                               <th>Ngày kích hoạt</th>
                                            <th>Số tiền nhận được</th>
                                            <th>Trạng thái chi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($commissions as $key => $commissions)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$commissions->user->name}}</td>
                                                <td>{{$commissions->user->email}}</td>
                                                <td>{{$commissions->product->name}}</td>
                                                <td>{{$commissions->active_date}}</td>
                                                <td>{{number_format($commissions->commission_amount)}}đ</td>
                                                <td><label class="switch">
                                                        <input @if(Auth::user()->user_type == 'admin') onchange="updateStatus(this)" @else {{'disabled=false'}} @endif
                                                        value="{{$commissions->id}}" type="checkbox" {{ $commissions->status == 1? "checked" : "" }}>
                                                        <span class="slider round"></span></label>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    @if(Auth::user()->user_type == 'admin')
                                        <h3 class=""> Số tiền bạn chưa thanh toán cho đại lý: {{number_format($commissions_amount)}}đ</h3>
                                    @endif
                                    @if(Auth::user()->user_type == 'staff' ||Auth::user()->user_type == 'customer')
                                        @if($commissions_amount>0)
                                            <h3 class=""> Số tiền bạn chưa được thanh toán : {{number_format($commissions_amount)}}đ</h3>
                                        @else
                                            <h4 class="title">Copy link và gửi cho bạn bè để nhận được hoa hồng</h4>
                                        @endif
                                    @endif
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
@section('script')
<link href="{{ asset('plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<script src="{{ asset('plugins/datatables/media/js/jquery.dataTables.js')}}"></script>
<script src="{{ asset('plugins/datatables/media/js/dataTables.bootstrap.js')}}"></script>
<script src="{{ asset('plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>
@endsection
