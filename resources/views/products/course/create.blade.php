@extends('layouts.app')
@section('style')
{{--    <link href="{{ asset('plugins/codemirror/lib/codemirror.css') }}" rel="stylesheet"/>--}}
{{--    <script src="{{asset('plugins/codemirror/lib/codemirror.js') }}"></script>--}}
{{--    <script src="{{asset('plugins/codemirror/addon/selection/active-line.js') }}"></script>--}}
{{--    <script src="{{asset('plugins/codemirror/mode/css/css.js') }}"></script>--}}
@endsection

@section('content')

<div class="row">
	<form class="form form-horizontal mar-top" action="{{route('session.store')}}" method="POST" enctype="multipart/form-data" id="choice_form">
		@csrf
		<input type="hidden" name="added_by" value="admin">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Thông tin chương khóa hoc</h3>
			</div>
			<div class="panel-body">
				<div class="tab-base tab-stacked-left">
				    <!--Nav tabs-->
				    <ul class="nav nav-tabs">
				        <li class="active">
				            <a data-toggle="tab" href="#demo-stk-lft-tab-1" aria-expanded="true">Chương</a>
				        </li>
                        <li class="">
                            <a data-toggle="tab" href="#demo-stk-lft-tab-2" aria-expanded="true">Bài học</a>
                        </li>
				    </ul>

				    <!--Tabs Content-->
				    <div class="tab-content">
				        <div id="demo-stk-lft-tab-1" class="tab-pane fade active in">
							<div class="form-group">
								<label class="col-lg-2 control-label">{{__('Tên chương')}}</label>
								<div class="col-lg-9">
									<input type="text" class="form-control" name="name" placeholder="Tên chương" onchange="update_sku()" required>
								</div>
							</div>
							<div class="form-group" id="category">
								<label class="col-lg-2 control-label">Khóa học</label>
                                <div class="col-lg-9">
                                    <select id="product_id" name="product_id" class="form-control" size="1">
                                        <option value="0">Danh mục cha</option>
                                        @if(isset($products))
                                            {{recursiveCategorys($products)}}
                                        @endif
                                    </select>
                                </div>
							</div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Mô tả nội dung của chương</label>
                                <div class="col-lg-9">
                                    <input type="text" class="myEditor form-control" name="description" placeholder="Mô tả">
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
<div class="row">
    <div class="container">
        <div id="sessionOfProducts">

        </div>
    </div>
</div>

@endsection

@section('script')
    <script type="text/javascript">
        $('#product_id').on('change', function() {
            get_sessioncourse();
        });
        function get_sessioncourse(){

            var product_id = $('#product_id').val();
            if(product_id!=null){
                $.post('{{ route('lesson.SessionByCourse') }}',{_token:'{{ csrf_token() }}', product_id:product_id}, function(data){
                    console.log(data);
                    $('#sessionOfProducts').html(null);
                    $('#sessionOfProducts').append(data);
                });
            }

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
