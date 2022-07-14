@extends('layouts.master')

@section('title', 'LDMS Cloud')

@section('content')
    <h1>Welcome to LDMS Cloud!</h1>
    <p>
        LDMS (Laboratory Data Management System) is a application to manage lab notes and experimental data.
    </p>
    <div class="container-md">
        @each('components.project', $projects, 'project')
    </div>
    {{-- $posts -> links() --}}
@endsection
