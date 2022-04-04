@foreach($district as $item)
    <option value="{{ $item->id_district }}">
        {{ $item->name }}
    </option>
@endforeach