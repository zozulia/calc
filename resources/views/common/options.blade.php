<option value="">Без фильтра</option>
@foreach ($options as $id => $title)
<option value="{{ $id }}">{{ $title }}</option>
@endforeach
