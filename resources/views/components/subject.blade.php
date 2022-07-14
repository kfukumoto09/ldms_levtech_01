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

<a href="/project/{{ $subject['project_id'] }}/{{ $subject['id'] }}">
     <h3 class="title">#{{ $subject['sub_number'] }} | {{ $subject['title'] }}</h3o>
</a> 
<p class='date'>Updated at {{ $subject['updated_at'] }};    Created at {{ $subject['created_at'] }}</p>
<br>
<!--<p class="body">{{ $subject['purpose'] }}</p>-->