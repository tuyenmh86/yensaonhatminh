@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('postcategory.create')}}" class="btn btn-rounded btn-info pull-right">{{__('Add New Category')}}</a>
    </div>
</div>

<br>

<!-- Basic Data Tables -->
<!--===================================================-->
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">{{__('Categories Post')}}</h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('Name')}}</th>
                    <th>{{__('Alias')}}</th>
                    <th>{{__('folder')}}</th>
                    <th>{{__('icon')}}</th>
                    <th>{{__('Parent_id')}}</th>
                    <th>{{__('published')}}</th>
                    <th>{{__('Featured')}}</th>
                    <th>{{__('Head Menu')}}</th>
                    <th>{{__('Homepage')}}</th>
                    <th>{{__('pos')}}</th>
                    <th width="10%">{{__('Options')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categoriespost as $key => $category)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{__($category->name)}}</td>
                        <td>{{__($category->alias)}}</td>
                        <td>{{__($category->folder)}}</td>
                        <td>
                            @if(!is_null($category->icon))
                                <img src="{{asset($category->icon)}}" height="42" width="42">
                            @endif
                        </td>
                        <td>{{__($category->parent_id)}}</td>
                        <td>
                            <label class="switch">
                            <input onchange="update_published(this)" value="{{ $category->id }}" type="checkbox" <?php if($category->published == 1) echo "checked";?> >
                            <span class="slider round"></span></label>
                        </td>
                        <td>
                            <label class="switch">
                            <input onchange="update_featured(this)" value="{{ $category->id }}" type="checkbox" <?php if($category->featured == 1) echo "checked";?> >
                            <span class="slider round"></span></label>
                        </td>
                        <td>
                            <label class="switch">
                                <input onchange="update_headmenu(this)" value="{{ $category->id }}" type="checkbox" <?php if($category->headmenu == 1) echo "checked";?> >
                                <span class="slider round"></span></label>
                        </td>
                        <td>
                            <label class="switch">
                                <input onchange="update_homepage(this)" value="{{ $category->id }}" type="checkbox" <?php if($category->homepage == 1) echo "checked";?> >
                                <span class="slider round"></span></label>
                        </td>
                        <td>{{__($category->pos)}}</td>
                        <td>
                            <div class="btn-group dropdown">
                                <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                    {{__('Actions')}} <i class="dropdown-caret"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="{{route('postcategory.edit', $category->id)}}">{{__('Edit')}}</a></li>
                                    <li><a href="{{route('postcategory.ImportProductByCategoryFolder', $category->id)}}">{{__('Cập nhật thư mục ảnh')}}</a></li>
                                    <li><a onclick="confirm_modal('{{route('postcategory.destroy', $category->id)}}');">{{__('Delete')}}</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection

@section('script')
    <script type="text/javascript">
        function update_headmenu(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('postcategory.updateHeadmenu') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    showAlert('success', 'Featured categories updated successfully');
                }
                else{
                    showAlert('danger', 'Something went wrong');
                }
            });
        }
        function update_featured(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('postcategory.updateFeatured') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    showAlert('success', 'Featured categories updated successfully');
                }
                else{
                    showAlert('danger', 'Something went wrong');
                }
            });
        }
        function update_published(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('postcategory.updatePublished') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    showAlert('success', 'Published categories updated successfully');
                }
                else{
                    showAlert('danger', 'Something went wrong');
                }
            });
        }
        function update_homepage(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('postcategory.updateHomepage') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    showAlert('success', 'Đã cho phép hiển thị trên trang chủ');
                }
                else{
                    showAlert('danger', 'Thất bại');
                }
            });
        }
    </script>
@endsection
