<a href="/subjects/{{ $subject['id'] }}">
     <p>{{ $subject['title'] }}</p>
</a> 

<div class="text-sm">
    <p class="py-1">Project title: {{ $subject->project->title }}</p>
    <p class="py-1">Subject id: {{ $subject->project->id }}-{{ $subject->sub_number }} (original id: {{ $subject['id'] }})</p>
    <p class="py-1">Objective: <br>{{ $subject->objective }}</p>
    <p class="py-1">Preparation: <br>{{ $lab_note->preparation }}</p>
    <p class="py-1">Methods: <br>{{ $lab_note->methods }}</p>
    <p class="py-1">Performed on: {{ $lab_note->performed_on }}</p>
    <p class="py-1">Updated at: {{ $subject['updated_at'] }}</p>
</div>
