@extends('layouts.master')

@section('title', 'LDMS Cloud')

@section('content')
    <h1>{{ $subject->title }}</h1>
    <p>Subject #: {{ $subject->sub_number }}</p>
    <p>
        Created at {{ $subject['created_at'] }}<br> 
        Updated at {{ $subject['updated_at'] }}
    </p>
    <h2>Objective</h2>
    <p>{{ $subject->objective }}</p>
@endsection
