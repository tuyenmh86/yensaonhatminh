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
            <h3 class="panel-title">Danh sách khóa học cần kích hoạt</h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tên User</th>
                    <th>Email</th>
                    <th>Khóa học</th>
                    <th>Tạo bởi</th>
                    <th>Trạng thái kích hoạt</th>
                </tr>
                </thead>
                <tbody>
                @foreach($userCourse as $key => $course)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$course->user->name}}</td>
                        <td>{{$course->user->email}}</td>
                        <td>{{$course->product->name}}</td>
                        <td><?php echo \App\User::where('id',$course->created_by)->first()->name; ?></td>
                        <td><label class="switch">
                                <input onchange="updateStatus(this)" value="{{$course->id}}" type="checkbox" <?php if($course->status == 1){echo "checked";}?> >
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
            $.post('{{ route('khoahoc.updateUserCourse') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    showAlert('success', 'Đã kích hoạt khóa học thành công ');
                }
                else{
                    showAlert('danger', 'Có lỗi xảy ra ');
                }
            });
        }
    </script>
@endsection
