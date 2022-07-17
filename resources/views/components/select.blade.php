@props(['disabled' => false])

<div>
    <select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>
        <option value=0>(unselected)</option>
        @foreach( $userCategories as $user_category)
            <option value={{ $user_category->id }}>{{ $user_category->name }}</option>
        @endforeach
    </select>
</div>