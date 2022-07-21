<a href="/users/{{ $user['id'] }}">
     <p>{{ $user['name'] }}</p>
</a> 
<p class='text-xs'>Registered with the id: {{ $user['id'] }}</p>
<!--<p>{{ $user['category']['name']}}</p> -->
<p class='text-xs'>Updated at {{ $user['updated_at'] }}; Created at {{ $user['created_at'] }}</p>
