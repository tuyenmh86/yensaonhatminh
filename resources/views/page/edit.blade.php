@extends('layouts.app')
@section('style')
    <link href="{{ asset('plugins/codemirror/lib/codemirror.css') }}" rel="stylesheet"/>
    <script src="{{asset('plugins/codemirror/lib/codemirror.js') }}"></script>
    <script src="{{asset('plugins/codemirror/addon/selection/active-line.js') }}"></script>
    <script src="{{asset('plugins/codemirror/mode/css/css.js') }}"></script>
@endsection

@section('content')

    <div class="row">
        <div class="container">
            <form class="form form-horizontal mar-top" action="{{route('page.update',$page->id)}}" method="POST"
                  enctype="multipart/form-data" id="choice_form">
                @csrf
                <input type="hidden" name="added_by" value="admin">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Thông tin trang</h3>
                    </div>
                    <div class="panel-body">
                        <div class="tab-base">
                            <!--Nav tabs-->
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a data-toggle="tab" href="#demo-stk-lft-tab-1"
                                       aria-expanded="true">{{__('General')}}</a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#demo-stk-lft-tab-2" aria-expanded="true">{{__('SEO')}}</a>
                                </li>
                            </ul>

                            <!--Tabs Content-->
                            <div class="tab-content">
                                <div id="demo-stk-lft-tab-1" class="tab-pane fade active in">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Tên Widget</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="name" placeholder="Tên trang"
                                                   value="{{$page->name}}"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Alias</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="alias" placeholder="Alias"
                                                   value="{{$page->alias}}" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Mô tả trang</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="description"
                                                   placeholder="{{$page->description}}" value="{{$page->description}}" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Nội dung</label>
                                        <div class="col-lg-9">
                                            <textarea class="editor" id="content" name="content">{{$page->content}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Mã CSS</label>
                                        <div class="col-lg-9">
                                            <textarea class="editor" id="style" name="style">{{$page->style}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Mã Javascript</label>
                                        <div class="col-lg-9">
                                            <textarea class="editor" id="script" name="script">{{$page->script}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div id="demo-stk-lft-tab-2" class="tab-pane fade">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">{{__('Meta Title')}}</label>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control" name="meta_title" value="{{ $page->seo_title }}" placeholder="{{__('Meta Title')}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="tag">{{__('Keyword')}}</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="tags[]" value="{{ $page->keyword }}" placeholder="{{__('Type and Hit Enter')}}" data-role="tagsinput">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">{{__('Description')}}</label>
                                        <div class="col-lg-7">
                                            <textarea name="meta_description" rows="8" class="form-control">{{ $page->seo_description }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">{{ __('Meta Image') }}</label>
                                        <div class="col-lg-7">
                                            <div id="meta_photo">
                                                @if ($page->featured_image != null)
                                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                                        <div class="img-upload-preview">
                                                            <img src="{{ asset($page->featured_image) }}" alt="" class="img-responsive">
                                                            <input type="hidden" name="previous_meta_img" value="{{ $page->featured_image }}">
                                                            <button type="button" class="btn btn-danger close-btn remove-files"><i class="fa fa-times"></i></button>
                                                        </div>
                                                    </div>
                                                @endif
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
    </div>


@endsection

@section('script')

    <script type="text/javascript">

        $(document).ready(function(){
            $('#container').removeClass('mainnav-lg').addClass('mainnav-sm');
            $("#photos").spartanMultiImagePicker({
                fieldName:        'photos[]',
                maxCount:         10,
                rowHeight:        '200px',
                groupClassName:   'col-md-4 col-sm-4 col-xs-6',
                maxFileSize:      '',
                dropFileLabel : "Drop Here",
                onExtensionErr : function(index, file){
                    console.log(index, file,  'extension err');
                    alert('Please only input png or jpg type file')
                },
                onSizeErr : function(index, file){
                    console.log(index, file,  'file size too big');
                    alert('File size too big');
                }
            });
            $("#thumbnail_img").spartanMultiImagePicker({
                fieldName:        'thumbnail_img',
                maxCount:         1,
                rowHeight:        '200px',
                groupClassName:   'col-md-4 col-sm-4 col-xs-6',
                maxFileSize:      '',
                dropFileLabel : "Drop Here",
                onExtensionErr : function(index, file){
                    console.log(index, file,  'extension err');
                    alert('Please only input png or jpg type file')
                },
                onSizeErr : function(index, file){
                    console.log(index, file,  'file size too big');
                    alert('File size too big');
                }
            });
            $("#featured_img").spartanMultiImagePicker({
                fieldName:        'featured_img',
                maxCount:         1,
                rowHeight:        '200px',
                groupClassName:   'col-md-4 col-sm-4 col-xs-6',
                maxFileSize:      '',
                dropFileLabel : "Drop Here",
                onExtensionErr : function(index, file){
                    console.log(index, file,  'extension err');
                    alert('Please only input png or jpg type file')
                },
                onSizeErr : function(index, file){
                    console.log(index, file,  'file size too big');
                    alert('File size too big');
                }
            });
            $("#flash_deal_img").spartanMultiImagePicker({
                fieldName:        'flash_deal_img',
                maxCount:         1,
                rowHeight:        '200px',
                groupClassName:   'col-md-4 col-sm-4 col-xs-6',
                maxFileSize:      '',
                dropFileLabel : "Drop Here",
                onExtensionErr : function(index, file){
                    console.log(index, file,  'extension err');
                    alert('Please only input png or jpg type file')
                },
                onSizeErr : function(index, file){
                    console.log(index, file,  'file size too big');
                    alert('File size too big');
                }
            });
            $("#meta_photo").spartanMultiImagePicker({
                fieldName:        'meta_img',
                maxCount:         1,
                rowHeight:        '200px',
                groupClassName:   'col-md-4 col-sm-4 col-xs-6',
                maxFileSize:      '',
                dropFileLabel : "Drop Here",
                onExtensionErr : function(index, file){
                    console.log(index, file,  'extension err');
                    alert('Please only input png or jpg type file')
                },
                onSizeErr : function(index, file){
                    console.log(index, file,  'file size too big');
                    alert('File size too big');
                }
            });

            $('.remove-files').on('click', function(){
                $(this).parents(".col-md-4").remove();
            });
        });

    </script>

@endsection
