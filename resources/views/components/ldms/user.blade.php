<a href="/console/users/{{ $user['id'] }}">
     <p class="">{{ $user['id'] }} | {{ $user['name'] }}</p>
</a> 

<p>{{ $user['category']['name']}}</p> 

<p class='date'>Updated at {{ $user['updated_at'] }};    Created at {{ $user['created_at'] }}</p>
