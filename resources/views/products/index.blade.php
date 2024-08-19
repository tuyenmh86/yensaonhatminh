@extends('layouts.app')

@section('content')

@if($type != 'Seller')
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('products.create')}}" class="btn btn-rounded btn-info pull-right">{{__('Add New Product')}}</a>
        </div>
    </div>
@endif

<br>

<div class="col-lg-12">
    <div class="panel">
        <!--Panel heading-->
        <div class="panel-heading">
            <h3 class="panel-title">{{ __($type.' Products') }}</h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-bordered " cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th width="20%">{{__('Name')}}</th>
                        <th width="10%">{{__('Photo')}}</th>
                        <th width="15%">DM lv1</th>
                        <th width="15%">DM lv2</th>
                        <th width="15%">DM lv3</th>
                        <th width="10%">Phát hành</th>
{{--                        <th>{{__('Current qty')}}</th>--}}
{{--                        <th>{{__('Todays Deal')}}</th>--}}
                        <th width="10%">{{__('Options')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key => $product)
                        <tr>
                            <td>{{$key+1}}
                            </td>
                            <td>
                                {{$product->id}} -
                                <a href="{{ route('product', $product->slug) }}" target="_blank">{{ __($product->name) }}</a><br/>
                                @if($product->discount>0)
                                    {{format_price(convert_price($product->unit_price-$product->discount )) }} <del>{{format_price($product->unit_price)}}</del>
                                @else
                                    {{format_price(convert_price($product->unit_price)) }}
                                @endif
                            </td>
                            <td><img class="img-md" src="{{asset($product->thumbnail_img)}}" alt="Image"></td>
                            <td>{{$product->category->name}}</td>
                            <td>{{(isset($product->subcategory->name))?$product->subcategory->name:'--'}}</td>
                            <td>{{(isset($product->subsubcategory->name))?$product->subsubcategory->name:'--'}}</td>
                           {{-- <td>
                                @php
                                    $qty = 0;
                                    foreach (json_decode($product->variations) as $key => $variation) {
                                        $qty += $variation->qty;
                                    }
                                    echo $qty;
                                @endphp
                            </td>--}}
                            {{--<td>
                                <label class="switch">
                                <input onchange="update_todays_deal(this)" value="{{ $product->id }}" type="checkbox" >
                                <span class="slider round"></span></label>
                            </td>--}}
                            <td>
                                Phát hành:<label class="switch">
                                     <input onchange="update_published(this)" value="{{ $product->id }}" type="checkbox" <?php if($product->published == 1) echo "checked";?> >
                                   <span class="slider round"></span></label>
                                    <br/>
                                Nổi bật:<label class="switch">
                                   <input onchange="update_featured(this)" value="{{ $product->id }}" type="checkbox" <?php if($product->featured == 1) echo "checked";?> >
                                     <span class="slider round"></span></label>
                            </td>

                            <td>
                                <div class="btn-group dropdown">
                                    <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                        {{__('Actions')}} <i class="dropdown-caret"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        @if ($type == 'Seller')
                                            <li><a href="{{route('products.seller.edit', $product->id)}}">{{__('Edit')}}</a></li>
                                        @else
                                            <li><a href="{{route('products.admin.edit', $product->id)}}">{{__('Edit')}}</a></li>
                                        @endif
                                        <li><a onclick="confirm_modal('{{route('products.destroy', $product->id)}}');">{{__('Delete')}}</a></li>
                                        <li><a href="{{route('products.duplicate', $product->id)}}">{{__('Duplicate')}}</a></li>
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

        $(document).ready(function(){
            //$('#container').removeClass('mainnav-lg').addClass('mainnav-sm');
        });

        function update_todays_deal(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('products.todays_deal') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    showAlert('success', 'Todays Deal updated successfully');
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
            $.post('{{ route('products.published') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    showAlert('success', 'Published products updated successfully');
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
            $.post('{{ route('products.featured') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
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
