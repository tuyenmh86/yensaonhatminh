@extends('layouts.app')
@section('style')
    <link href="{{ asset('plugins/codemirror/lib/codemirror.css') }}" rel="stylesheet"/>
    <script src="{{asset('plugins/codemirror/lib/codemirror.js') }}"></script>
    <script src="{{asset('plugins/codemirror/addon/selection/active-line.js') }}"></script>
    <script src="{{asset('plugins/codemirror/mode/css/css.js') }}"></script>
@endsection

@section('content')

<div class="row">
	<form class="form form-horizontal mar-top" action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data" id="choice_form">
		@csrf
		<input type="hidden" name="added_by" value="admin">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">{{__('Post Information')}}</h3>
			</div>
			<div class="panel-body">
				<div class="tab-base tab-stacked-left">
				    <!--Nav tabs-->
				    <ul class="nav nav-tabs">
				        <li class="active">
				            <a data-toggle="tab" href="#demo-stk-lft-tab-1" aria-expanded="true">{{__('General')}}</a>
				        </li>
                        <li class="">
                            <a data-toggle="tab" href="#demo-stk-lft-tab-2" aria-expanded="true">{{__('SEO')}}</a>
                        </li>
				    </ul>

				    <!--Tabs Content-->
				    <div class="tab-content">
				        <div id="demo-stk-lft-tab-1" class="tab-pane fade active in">
							<div class="form-group">
								<label class="col-lg-2 control-label">{{__('Post Name')}}</label>
								<div class="col-lg-9">
									<input type="text" class="form-control" name="name" placeholder="{{__('Product Name')}}" onchange="update_sku()" required>
								</div>
							</div>
							<div class="form-group" id="category">
								<label class="col-lg-2 control-label">{{__('Category')}}</label>
                                <div class="col-lg-9">
                                    <select id="category_id" name="category_id" class="form-control" size="1">
                                        <option value="0">-- {{__('Parent Category')}} --</option>
                                        @if(isset($categories))
                                            {{recursiveCategorys($categories)}}
                                        @endif
                                    </select>
                                </div>
							</div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{__('Description')}}</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="description" placeholder="{{__('Description')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{__('Content')}}</label>
                                <div class="col-lg-9">
                                    <textarea class="myEditor" name="content"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{__('Code')}}</label>
                                <div class="col-lg-9">
                                    <textarea id="code" name="code" class="myEditor"></textarea>
                                </div>
                            </div>
				        </div>
                        <div id="demo-stk-lft-tab-2" class="tab-pane fade">
                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{__('Tags')}}</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="tags[]" placeholder="Type to add a tag" data-role="tagsinput">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{__('Meta Title')}}</label>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" name="meta_title" placeholder="{{__('Meta Title')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{__('Description')}}</label>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" name="meta_description" placeholder="{{__('Meta Description')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{__('Featured')}} <small>(290x300)</small></label>
                                <div class="col-lg-7">
                                    <div id="featured_img">

                                    </div>
                                </div>
                            </div>
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

    <script src="{{asset('vendor/file-manager/js/file-manager.js')}}"></script>

    <script type="text/javascript">

        // $('#lfm').filemanager('image');

        $('[class*="lfm"]').each(function() {

            $(this).filemanager('image');

        });
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
