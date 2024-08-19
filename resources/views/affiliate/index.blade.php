@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-sm-12">
{{--            <a href="{{ route('brands.create')}}" class="btn btn-rounded btn-info pull-right">{{__('Add New Brand')}}</a>--}}
        </div>
    </div>

    <br>

    <!-- Basic Data Tables -->
    <!--===================================================-->
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Danh sách hoa hồng affiliater</h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tên người nhận hoa hồng</th>
                    <th>Khóa học đã thanh toán</th>
                    <th>Số tiền nhận được</th>
{{--                    <th>Chi tiết đơn hàng</th>--}}
                    <th>Trạng thái thanh toán cho affiliater</th>
                </tr>
                </thead>
                <tbody>
                @foreach($affiliates as $key => $affiliate)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$affiliate->user->name}}</td>
                        <td>{{$affiliate->product->name}}</td>
                        <td>{{$affiliate->award}}</td>
{{--                        <td>{{$affiliate->OrderDetail->id}}</td>--}}
                        <td><label class="switch">
                                <input onchange="updateStatus(this)" value="{{$affiliate->id}}" type="checkbox" <?php if($affiliate->status == 1) echo "checked";?> >
                                <span class="slider round"></span></label></td>
                        <td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        function updateStatus(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('affiliates.updateStatus') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    showAlert('success', 'Đã cập nhật trạng thái thanh toán cho affiliater');
                }
                else{
                    showAlert('danger', 'Có lỗi xảy ra ');
                }
            });
        }
    </script>
@endsection
