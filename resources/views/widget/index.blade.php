@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <a href="{{ route('widget.create')}}" class="btn btn-info pull-right">{{__('Add New')}}</a>
        </div>
    </div>
    <div class="row">
        <div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">{{__('Orders')}}</h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Id</th>
                    <th>name</th>
                    <th>published</th>
                    <th width="10%">{{__('Options')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($widgets as $key => $widget)
                        <tr>
                            <td>
                                {{ $key+1 }}
                            </td>
                            <td>
                                {{ $widget->id}}
                            </td>
                            <td>
                                {{ $widget->name}}
                            </td>
                            <td>
                                <label class="switch">
                                    <input onchange="update_featured(this)" value="{{ $widget->id }}" type="checkbox" <?php if($widget->published == 1) echo "checked";?> >
                                    <span class="slider round"></span>
                                </label>
                            </td>
                            <td>
                                <div class="btn-group dropdown">
                                    <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                        {{__('Actions')}} <i class="dropdown-caret"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">

                                        <li><a href="{{route('widget.edit', $widget->id)}}">{{__('Edit')}}</a></li>
                                        <li><a onclick="confirm_modal('{{route('widget.destroy', $widget->id)}}');">{{__('Delete')}}</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
    </div>
@endsection


@section('script')
    <script type="text/javascript">

    </script>
@endsection
