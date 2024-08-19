@extends('layouts.app')

@section('content')

    <div class="col-lg-6 col-lg-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">{{__('Category Information')}}</h3>
            </div>

            <!--Horizontal Form-->
            <!--===================================================-->
            <form class="form-horizontal" action="{{ route('categories.store') }}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="name">{{__('Name')}}</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="{{__('Name')}}" id="name" name="name" class="form-control"
                                   required>
                        </div>
                    </div>
                   {{-- <div class="form-group">
                        <label class="col-sm-2 control-label" for="parent_id">{{__('Parent Category')}}</label>
                        <div class="col-sm-10">
                            <select id="parent_id" name="parent_id" class="form-control categoryParent" size="1">
                                <option value="0">-- {{ trans('back-app.cate_parent') }} --</option>
                            @if(isset($categories))
                                {{recursiveCategorys($categories)}}
                            @endif
                            </select>
                        </div>

                    </div>--}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="name">{{__('Brands')}}</label>
                        <div class="col-sm-9">
                            <select name="brands[]" id="brands" class="form-control demo-select2" multiple  data-placeholder="Choose Brands">
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="banner">{{__('Banner')}}
                            <small>(200x300)</small></label>
                        <div class="col-sm-10">
                            <input type="file" id="banner" name="banner" class="form-control" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="icon">{{__('Icon')}} <small>(32x32)</small></label>
                        <div class="col-sm-10">
                            <input type="file" id="icon" name="icon" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-right">
                    <button class="btn btn-purple" type="submit">{{__('Save')}}</button>
                </div>
            </form>
            <!--===================================================-->
            <!--End Horizontal Form-->

        </div>
    </div>

@endsection
