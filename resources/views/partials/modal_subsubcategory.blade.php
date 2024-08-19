<script type="text/javascript">
    function add_subsubcategory()
    {
        jQuery('#add_subsubcategory').modal('show', {backdrop: 'static'});
    }
</script>

<div class="modal fade" id="add_subsubcategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">{{__('Add SubSubcategory')}}</h4>
            </div>

            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('subcategories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">{{__('Name')}}</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="{{__('Name')}}" id="name" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">{{__('Category')}}</label>
                            <div class="col-sm-9">
                                <select name="category_id" required class="form-control demo-select2-placeholder">
                                    @foreach($categories as $category)
                                        @if($category->published==1)
                                        <option value="{{$category->id}}">{{__($category->name)}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

            <div class="modal-footer">
                <button class="btn btn-purple" type="submit">{{__('Save')}}</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">{{__('Cancel')}}</button>
            </div>
        </div>
    </div>
</div>
