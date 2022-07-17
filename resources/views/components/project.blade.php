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

<a href="/project/{{ $project['id'] }}">
     <h3 class="title">#{{ $project['id'] }} | {{ $project['title'] }}</h3o>
</a> <br>
<p class='date'>Updated at {{ $project['updated_at'] }};    Created at {{ $project['created_at'] }}</p>

<!--<p class="body">{{ $project['purpose'] }}</p>-->