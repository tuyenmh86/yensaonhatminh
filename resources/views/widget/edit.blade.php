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
            <form class="form form-horizontal mar-top" action="{{route('widget.update',$widget->id)}}" method="POST"
                  enctype="multipart/form-data" id="choice_form">
                @csrf
                <input type="hidden" name="added_by" value="admin">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Thông tin widget</h3>
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
                                            <input type="text" class="form-control" name="name" placeholder="Tên widget"
                                                   value="{{$widget->name}}"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Chèn mã</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="alias" placeholder="Insert Code"
                                                   value="{{$widget->alias}}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Mô tả widget</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="description"
                                                   placeholder="{{$widget->description}}" value="{{$widget->description}}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Mã HTML</label>
                                        <div class="col-lg-9">
                                            <textarea class="editor" id="content" name="content">{{$widget->content}}</textarea>
                                        </div>
{{--                                        <div class="col-lg-5">--}}
{{--                                            <textarea class="editor" name="content-view"> {{html_entity_decode($widget->content)}}</textarea>--}}
{{--                                        </div>--}}
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Mã CSS</label>
                                        <div class="col-lg-9">
                                            <textarea class="editor" id="style" name="style">{{$widget->style}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Mã Javascript</label>
                                        <div class="col-lg-9">
                                            <textarea class="editor" id="script" name="script">{{$widget->script}}</textarea>
                                        </div>
                                    </div>

                                </div>
                                <div id="demo-stk-lft-tab-2" class="tab-pane fade">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Ảnh kết quả widget
                                            <small>(290x300)</small></label>
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
    </div>


@endsection

@section('script')
    <script type="text/javascript">
        // var editor = CodeMirror.fromTextArea(document.getElementById("content"), {
        //     extraKeys: {"Ctrl-Space": "autocomplete"}
        // });
        // var editor2 = CodeMirror.fromTextArea(document.getElementById("style"), {
        //     extraKeys: {"Ctrl-Space": "autocomplete"}
        // });
        // var editor3 = CodeMirror.fromTextArea(document.getElementById("script"), {
        //     extraKeys: {"Ctrl-Space": "autocomplete"}
        // });
        // var editor = new Jodit('#style', {
        //     // readonly: true,
        //     activeButtonsInReadOnly: ['source'], // active only two buttons
        // });
        var i = 0;

        $(document).ready(function () {
            $('#container').removeClass('mainnav-lg').addClass('mainnav-sm');

            $("#featured_img").spartanMultiImagePicker({
                fieldName: 'featured_img',
                maxCount: 1,
                rowHeight: '200px',
                groupClassName: 'col-md-4 col-sm-4 col-xs-6',
                maxFileSize: '',
                dropFileLabel: "Drop Here",
                onExtensionErr: function (index, file) {
                    console.log(index, file, 'extension err');
                    alert('Please only input png or jpg type file')
                },
                onSizeErr: function (index, file) {
                    console.log(index, file, 'file size too big');
                    alert('File size too big');
                }
            });

        });


    </script>

@endsection
