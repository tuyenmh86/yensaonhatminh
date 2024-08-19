@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('posts.create')}}" class="btn btn-info pull-right">{{__('Add New')}}</a>
    </div>
</div>

<br>

<!-- Basic Data Tables -->
<!--===================================================-->
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">{{__('Post')}}</h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('Post Name')}}</th>
                    <th>{{__('Post Category')}}</th>
                    <th>{{__('published')}}</th>
                    <th>{{__('featured')}}</th>
                    <th>{{__('Action')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $key => $post)
                    <tr>
                        <td>{{$key+1}}</td>

                        <td><a href="{{ route('posts', $post->slug) }}" target="_blank">{{ __($post->name) }}</a></td>

                        <td>{{ $post->category->name }}</td>
                        <td>
                            <label class="switch">
                                <input onchange="update_published(this)" value="{{ $post->id }}" type="checkbox" <?php if($post->published == 1) echo "checked";?> >
                                <span class="slider round"></span></label>
                        </td>
                        <td>
                            <label class="switch">
                                <input onchange="update_featured(this)" value="{{ $post->id }}" type="checkbox" <?php if($post->featured == 1) echo "checked";?> >
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td>
                            <div class="btn-group dropdown">
                                <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                    {{__('Actions')}} <i class="dropdown-caret"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="{{route('posts.edit', $post->id)}}">{{__('Edit')}}</a></li>
                                    <li><a onclick="confirm_modal('{{route('posts.destroy', $post->id)}}');">{{__('Delete')}}</a></li>
                                    <li><a href="{{route('posts.duplicate', $post->id)}}">{{__('Duplicate')}}</a></li>
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

        $(document).ready(function(){
            //$('#container').removeClass('mainnav-lg').addClass('mainnav-sm');
        });


        function update_published(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('posts.updatePublished') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    showAlert('success', 'Published post updated successfully');
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
            $.post('{{ route('posts.updateFeatured') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    showAlert('success', 'Featured products updated successfully');
                }
                else{
                    showAlert('danger', 'Something went wrong');
                }
            });
        }
    </script>
@endsection
