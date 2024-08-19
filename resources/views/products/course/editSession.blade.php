
<form class="form form-horizontal mar-top" action="{{route('session.UpdateSession',$session->id)}}" method="POST"
      enctype="multipart/form-data" id="frm-session">
    @csrf
    <div class="md-form mb-5">
        <label data-error="wrong" data-success="right" for="name">Tên Chương</label>
        <input type="text" name="id" class="form-control" value="{{$session->id}}">
        <input type="text" name="name" class="form-control" value="{{$session->name}}">
    </div>

    <div class="md-form mb-5">
        <label data-error="wrong" data-success="right" for="form29">Mô tả</label>
        <input type="text" id="form29" name="description" class="form-control"
               value="{{$session->description}}">

    </div>

    <div class="md-form mb-5">
        <label data-error="wrong" data-success="right" for="form32">Vị trí</label>
        <input type="text" id="form32" name="pos" class="form-control" value="{{$session->pos}}">
    </div>
        <div class="modal-footer d-flex justify-content-center">
            <button onclick="updateSessionInfo(this)" value="{{ $session->id }}" type="button" class="btn btn-secondary">Lưu</button>
        </div>
    </form>

    <script type="text/javascript">

        function updateSessionInfo(el){
            $.ajax({
                type: "POST",
                url: "{{ route('session.UpdateSession',$session->id)}}",
                data: $('#frm-session').serialize(),
                success: function(response) {
                    showAlert('success',"Đã cập nhật thành công");
                    $('#showEditSessionModal').modal('toggle');
                    get_sessioncourse();
                },
                error: function() {
                    showAlert('error',"WOOOO lỗi rồi");
                }
            });
            return false;

    }

</script>
