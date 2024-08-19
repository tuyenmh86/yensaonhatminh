@extends('layouts.app')
@section('content')
    <div class="row">
        <form class="form form-horizontal mar-top" action="{{route('lesson.store')}}" method="POST" enctype="multipart/form-data" id="choice_form">
            @csrf
            <input type="hidden" name="added_by" value="admin">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Thông tin bài học</h3>
                </div>
                <div class="panel-body">
                    <div class="tab-base tab-stacked-top">
                        <!--Nav tabs-->
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a data-toggle="tab" href="#demo-stk-lft-tab-1" aria-expanded="true">Bài học</a>
                            </li>
                        </ul>

                        <!--Tabs Content-->
                        <div class="tab-content">
                            <div id="demo-stk-lft-tab-1" class="tab-pane fade active in">
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Khóa học</label>
                                    <div class="col-lg-9">
                                        <select id="product_id" name="product_id" class="form-control" size="1" onchange="get_sessioncourse()">
                                            <option value="">Chọn khóa học</option>
                                            @foreach($products as $product)
                                                <option value="{{$product->id}}">{{$product->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Chương mục</label>
                                    <div class="col-lg-9">
                                        <select id="session_id" name="session_id" class="form-control" size="1">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-lg-2 control-label">{{__('Tên bài học')}}</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Tên bài học" onchange="update_sku()" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sumary" class="col-lg-2 control-label">Mô tả bài học</label>
                                    <div class="col-lg-9">
                                        <textarea class="myEditor form-control" name="sumary" id="sumary">
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="content" class="col-lg-2 control-label">Nội dung bài học</label>
                                    <div class="col-lg-9">
                                        <textarea class="myEditor form-control" name="content" id="content">
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="video_url" class="col-lg-2 control-label">Video</label>
                                    <div class="col-lg-9">
                                        <input type="file" class="form-control" placeholder="Video đính kèm" name="video_url" id="video_url" accept="video/*" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">{{__('Youtube Link')}}</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" name="youtube"  placeholder="Video Link">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Thời lượng bài học</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="duration" placeholder="Thời lượng bài học" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="attack" class="col-lg-2 control-label">Tài liệu đính kèm</label>
                                    <div class="col-lg-9">
                                        <input type="file" class="form-control" placeholder="File đính kèm" id="attack" name="attack" />
                                    </div>
                                </div>
                            </div>
                            <div id="demo-stk-lft-tab-2" class="tab-pane fade">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-right">
                    <button type="submit" name="button" class="btn btn-info">{{ __('Save') }}</button>
                </div>
            </div>
        </form>
    </div>


@endsection


@section('script')
    {{-- // ****************** BEGIN:: FUNCTION FILES ***************** --}}

{{--    <script src="{{asset('vendor/file-manager/js/file-manager.js')}}"></script>--}}

    <script type="text/javascript">
        $('#product_id').on('change', function() {
            get_sessioncourse();
        });
        function get_sessioncourse(){
            var product_id = $('#product_id').val();
            $.post('{{ route('lesson.getSessionByCourse') }}',{_token:'{{ csrf_token() }}', product_id:product_id}, function(data){
                $('#session_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#session_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
            });
        }
    </script>
    {{--    <script type="text/javascript">--}}
    {{--        var i = 0;--}}

    {{--        $(document).ready(function(){--}}
    {{--            $('#container').removeClass('mainnav-lg').addClass('mainnav-sm');--}}

    {{--            $("#featured_img").spartanMultiImagePicker({--}}
    {{--                fieldName:        'featured_img',--}}
    {{--                maxCount:         1,--}}
    {{--                rowHeight:        '200px',--}}
    {{--                groupClassName:   'col-md-4 col-sm-4 col-xs-6',--}}
    {{--                maxFileSize:      '',--}}
    {{--                dropFileLabel : "Drop Here",--}}
    {{--                onExtensionErr : function(index, file){--}}
    {{--                    console.log(index, file,  'extension err');--}}
    {{--                    alert('Please only input png or jpg type file')--}}
    {{--                },--}}
    {{--                onSizeErr : function(index, file){--}}
    {{--                    console.log(index, file,  'file size too big');--}}
    {{--                    alert('File size too big');--}}
    {{--                }--}}
    {{--            });--}}

    {{--        });--}}



    {{--    </script>--}}

@endsection
{{--@section('script')--}}
{{--    <script>--}}
{{--        var editor = CodeMirror.fromTextArea(document.getElementById("code"), {--}}
{{--            extraKeys: {"Ctrl-Space": "autocomplete"}--}}
{{--        });--}}
{{--    </script>--}}

{{--<script type="text/javascript">--}}
{{--	var i = 0;--}}

{{--	$(document).ready(function(){--}}
{{--		$('#container').removeClass('mainnav-lg').addClass('mainnav-sm');--}}

{{--		$("#featured_img").spartanMultiImagePicker({--}}
{{--			fieldName:        'featured_img',--}}
{{--			maxCount:         1,--}}
{{--			rowHeight:        '200px',--}}
{{--			groupClassName:   'col-md-4 col-sm-4 col-xs-6',--}}
{{--			maxFileSize:      '',--}}
{{--			dropFileLabel : "Drop Here",--}}
{{--			onExtensionErr : function(index, file){--}}
{{--				console.log(index, file,  'extension err');--}}
{{--				alert('Please only input png or jpg type file')--}}
{{--			},--}}
{{--			onSizeErr : function(index, file){--}}
{{--				console.log(index, file,  'file size too big');--}}
{{--				alert('File size too big');--}}
{{--			}--}}
{{--		});--}}

{{--	});--}}



{{--</script>--}}

{{--@endsection--}}
