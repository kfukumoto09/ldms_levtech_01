<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Index') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <h3>Welcome to LDMS Cloud!</h3>
        <p>
            LDMS (Laboratory Data Management System) is a application to manage lab notes and experimental data.
        </p>
    </div>
    

    <div class="container-md">
        @each('components.project', $projects, 'project')
    </div>
    
    <div class="container-md">
        <a href="/projects/create">Create a new project</a><br>
    </div>
    
    @can('higherThanManager')
        <div class="container-md">
           <a href="/users/authorize">Authorize projects for users</a><br>
        </div> 
    @else
        <p>-- Project authorization is not displayed for your account. --</p>
    @endcan
    
    @can('isAdministrator')
        <div class="container-md">
           <a href="/register">Create a new user</a><br>
        </div> 
    @else
        <p>-- User registration is not authorized for your account. --</p>
    @endcan
    
    {{--
    @can('isAdmin')
        <div class="container-md">
           <a href="/users/create">Create a new user</a><br>
        </div>
        <form method="POST" action="/projects/{{ $projects->first()->id }}">
        	@method('delete')
        	@csrf
        	<button type="submit" class="btn btn-danger">delete</button>
    	</form>
    @else
        <p>-- Project deletion is not authorized for your account. --</p>
    @endcan
    --}}

</x-app-layout>


{{--
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
@endsection
--}}