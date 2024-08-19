{{-- ===================== BEGIN::MODAL SELECT MODULE ================= --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Chọn Module</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <select class="form-control module_name">
            	<option value="" selected="">--- Module ---</option>
            	<option value="page">Trang nội dung</option>
            	<option value="post">Danh mục bài viết</option>
            	<option value="product">Danh mục sản phẩm</option>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control item_module">
            	<option value="">--- Mục ---</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="close_modal" class="btn btn-primary accept_link">Đồng ý</button>
      </div>
    </div>
  </div>
</div>
{{-- ===================== END::MODAL SELECT MODULE ================= --}}

{{-- ===================== BEGIN::MODAL SELECT MODULE EDIT ================= --}}
<div class="modal fade modalItemEdit" id="modalItemEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelEdit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabelEdit">Chọn Module</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <select class="form-control module_name_edit">
              <option value="" selected="">--- Module ---</option>
              <option value="page">Trang nội dung</option>
              <option value="post">Danh mục bài viết</option>
              <option value="product">Danh mục sản phẩm</option>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control item_module_edit">
              <option value="">--- Mục ---</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" data-target="" onclick="return save_change_link_item();" id="close_modal" class="btn btn-primary accept_link_edit">Đồng ý</button>
      </div>
    </div>
  </div>
</div>
{{-- ===================== END::MODAL SELECT MODULE EDIT ================= --}}


@push('footer')
<script type="text/javascript">
$(document).ready(function(){
    $('.module_name').change(function(){
        var value = $(this).val();
        if (value == '') {
            $('.item_module').html('<option value="">--- Mục ---</option>');
        }else {
          $.ajax({
              url: "{{ route('admincp.menu.module') }}",
              type: "POST",
              data: {
                "_token": "{{ csrf_token() }}", "module":value
              },
              dataType: "json",
              success: function (data) { 
                  $('.item_module').html(data);
              },
              error: function() {
                  console.log('Failed.')
              }
          });
        }
    });
    $('.accept_link').click(function(){
        var value = $('.item_module').val();
        $('.custom-menu-item-url').attr("value",value);
        $('.modal, .inner').modal('hide'); 
    });

    // EDIT

  $('.module_name_edit').change(function(){
        var value = $(this).val();

        if (value == '') {
            $('.item_module_edit').html('<option value="">--- Mục ---</option>');
        }else {
          $.ajax({
              url: "{{ route('admincp.menu.module') }}",
              type: "POST",
              data: {
                "_token": "{{ csrf_token() }}", "module":value
              },
              dataType: "json",
              success: function (data) { 
                  $('.item_module_edit').html(data);
              },
              error: function() {
                  console.log('Failed.')
              }
          });
        }
    });
}); 
  function change_link_item (id)
  {
    $('.modalItemEdit').modal('show');
    $('.accept_link_edit').attr('data-target','url_menu_'+id);
  }
  function save_change_link_item ()
  {
    var value = $('.item_module_edit').val();
    var item_target = $('.accept_link_edit').attr('data-target');
        $('#'+item_target).attr('value',value);
        $('.modalItemEdit, .inner').modal('hide'); 
  }
</script>
@endpush