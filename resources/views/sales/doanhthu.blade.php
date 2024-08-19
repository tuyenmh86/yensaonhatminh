@extends('layouts.app')

@section('content')

    <form class="form form-horizontal mar-top" action="{{route('doanhthu.month')}}" method="POST" enctype="multipart/form-data" id="choice_form">
    @csrf
    <div class="form-group">
        <label class="col-lg-2 control-label">Tháng</label>
        <div class="col-lg-9">
            <select class="form-control demo-select2-placeholder" name="month" id="month" required>
                @for($i=1;$i<=12;$i++)
                    <option value="{{$i}}">{{'Tháng '. $i}}</option>
                @endfor
            </select>
        </div>
    </div>
    <div class="panel-footer text-right">
        <button type="submit" name="button" class="btn btn-info">{{ __('Search') }}</button>
    </div>
</form>

<!-- Basic Data Tables -->
<!--===================================================-->
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Danh sách hoa hồng đại lý</h3>

    </div>
    <div class="panel-body">
        <table class="table table-striped table-bordered demo-dt-basic dataTable" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>#</th>
                <th>Người giới thiệu F1</th>
                <th>Email giới thiệu F1 </th>
                <th>Email khách F2</th>
                <th>Khóa học</th>
                <th>Ngày kích hoạt</th>
                <th>Số tiền</th>
                <th>Đã chi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($commissions as $key => $commissions)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$commissions->user_ref->name}}</td>
                    <td>{{$commissions->user_ref->email}}</td>
                    <td>{{$commissions->email_active}}</td>
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
            <h3 class=""> Số tiền bạn chưa thanh toán cho đại lý: {{number_format( $commissions_amount)}}đ</h3>
        @endif
        @if(Auth::user()->user_type == 'staff')
            <h3 class=""> Số tiền bạn chưa được thanh toán : {{number_format($commissions_amount)}}đ</h3>
        @endif
    </div>
</div>

@endsection


@section('script')
    <script type="text/javascript">

    </script>
@endsection
