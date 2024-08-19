@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <a href="{{ route('page.create')}}" class="btn btn-info pull-right">{{__('Add New')}}</a>
        </div>
    </div>
    <div class="row">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">{{__('Pages')}}</h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Id</th>
                        <th>name</th>
                        <th>alias</th>
                        <th>published</th>
                        <th width="10%">{{__('Options')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($pages as $key => $page)
                        <tr>
                            <td>
                                {{ $key+1 }}
                            </td>
                            <td>
                                {{ $page->id}}
                            </td>
                            <td>
                                {{ $page->name}}
                            </td>
                            <td>
                                {{ $page->alias}}
                            </td>
                            <td>
                                <label class="switch">
                                    <input onchange="update_featured(this)" value="{{ $page->id }}"
                                           type="checkbox" <?php if ($page->published == 1) echo "checked";?> >
                                    <span class="slider round"></span>
                                </label>
                            </td>
                            <td>
                                <div class="btn-group dropdown">
                                    <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon"
                                            data-toggle="dropdown" type="button">
                                        {{__('Actions')}} <i class="dropdown-caret"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">

                                        <li><a href="{{route('page.edit', $page->id)}}">{{__('Edit')}}</a></li>
                                        <li>
                                            <a onclick="confirm_modal('{{route('widget.destroy', $page->id)}}');">{{__('Delete')}}</a>
                                        </li>
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
