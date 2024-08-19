@foreach($data as $item)
	<option value="{{ $module }}?{{ $item->id }}">{{ $item->title }}</option>
@endforeach