<style>
    .title {
        font-size: 14pt;
    }
    .date {
        font-weight: light;
        color: #111;
        font-size: 12pt;
    }
</style>

<a href="/console/users/{{ $user['id'] }}">
     <h3 class="name">#{{ $user['id'] }} | {{ $user['name'] }}, {{ $user['category']['name']}}</h3o>
</a> <br>
<p class='date'>Updated at {{ $user['updated_at'] }};    Created at {{ $user['created_at'] }}</p>
