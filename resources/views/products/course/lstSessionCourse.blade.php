<div class="container">
    <div class="modal fade" id="showEditSessionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Write to us</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="showEditSessionModal-body" class="modal-body mx-3">

                </div>

            </div>
        </div>
    </div>
    <form class="form form-horizontal mar-top" action="#" method="POST" enctype="multipart/form-data" id="choice_form">
        @csrf
        <input type="hidden" name="added_by" value="admin">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Danh sách chương của khóa học này</h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0">
                    <thead>
                    <th>#</th>
                    <th>Tên Chương</th>
                    <th>Mô tả</th>
                    <th>Vị trí chương</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($sessionCourse as $key => $session)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$session->name}}</td>
                            <td>{{$session->description}}</td>
                            <td>{{$session->pos}}</td>
                            <td>
                                <div class="btn-group dropdown">
                                    <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                        {{__('Actions')}} <i class="dropdown-caret"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a onclick="showEditSessionModal({{$session->id}})">{{__('Edit')}}</a></li>
                                        <li><a onclick="confirm_modal('{{route('session.destroy', $session->id)}}');">{{__('Delete')}}</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="panel-footer text-right">
                <button type="submit" name="button" class="btn btn-info">{{ __('Save') }}</button>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        function showEditSessionModal(id){
            $('#showEditSessionModal-body').html(null);
            $('#showEditSessionModal').modal();
            $.get('{{ route('session.EditSession') }}', {_token:'{{ csrf_token()}}',id:id}, function(data){
                $('#showEditSessionModal-body').html(data);
            });
        }

    </script>

</div>
