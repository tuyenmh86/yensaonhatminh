@extends('layouts.app')

@section('content')
<div class="container">
	<div class="animated fadeIn">
		<div class="container">
            {!! Menu::render() !!}
		</div>
	</div>
</div>
@endsection
