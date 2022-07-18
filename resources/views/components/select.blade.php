@props(['disabled' => false])

<div>
    <select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>
        <option value=null>(select a category)</option>
        @foreach( $collection as $record)
            <option value={{ $record->id }}>{{ $record->name }}</option>
        @endforeach
    </select>
</div>