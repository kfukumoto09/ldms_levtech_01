@extends('layouts.index')

@section('footer')

    <!--Link for returning to project index-->
    <div class="py-1">
        <a href='/projects/index'>Return to the index</a>
    </div>
    
    <!--Link for authorizing projects to a user-->
    @can('higherThanManager')
        <div class="py-1">
            <a href='/projects/{{ $project->id }}/create'>Authorize projects for users</a>
        </div>
    @endcan
    
    <!--Link for creating a new user-->
    @can('isAdministrator')
        <div class="py-1">
           <a href="/register">Create a new user</a><br>
        </div> 
    @endcan
    
@endsection

{{--
<x-index-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($project->title) }}
        </h2>
    </x-slot>
    
    
    <!--Body-->

    <div class='my-5'>
        <p class='text-sm'>Project ID: {{ $project->id }}</p>
        <p class='text-xs'>
            Created at {{ $project['created_at'] }}<br> 
            Updated at {{ $project['updated_at'] }}
        </p>
    </div>
    
    <div class='py-2'>
        <h2>Purpose</h2>
        <p class='text-sm'>{{ $project->purpose }}</p>
    </div>
    
    <div class='py-2'>
        <h2>Subjects</h2>
        <div class=''>
            @each('components.ldms.subject', $project->subjects, 'subject')
        </div>
    </div>

</x-index-layout>

--}}