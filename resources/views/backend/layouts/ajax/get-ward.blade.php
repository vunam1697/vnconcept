@foreach($ward as $item)
    <option value="{{ $item->id_ward }}">
        {{ $item->name }}
    </option>
@endforeach