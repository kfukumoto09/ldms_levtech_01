@extends('layouts.master')

@section('title', 'LDMS Cloud')

@section('content')
    <h1>{{ $project->title }}</h1>
    <p>Project #: {{ $project->id }}</p>
    <p>
        Created at {{ $project['created_at'] }}<br> 
        Updated at {{ $project['updated_at'] }}
    </p>
    <h2>Purpose</h2>
    <p>{{ $project->purpose }}</p>
    <br>
    <div class="container-md">
        @each('components.subject', $project->subjects, 'subject')
    </div>
    {{-- $posts -> links() --}}
@endsection
