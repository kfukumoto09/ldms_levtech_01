@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>
    {{--
    <option value=0>(unselected)</option>
    @foreach($user_categories as $user_category)
        <option value={{ $user_category->id }}>{{ $user_category->name }}</option>
    @endforeach
    --}}
    <option value=0>(unselected)</option>
    <option value=1>Player</option>
    <option value=2>Manager</option>
    <option value=3>Authorizer</option>
</select>