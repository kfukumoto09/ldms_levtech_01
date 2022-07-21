@props(['disabled' => false])

<div>
    <select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>
        <option value=null>(select)</option>
        @foreach( $collection as $model)
            <option value={{ $model->id }}>{{ $model->name }}</option>
        @endforeach
    </select>
</div>