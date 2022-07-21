<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("$user->name's page") }}
        </h2>
    </x-slot>
    
    
    <!--Body-->
    <div>
        <p>Account status:</p>
        <p>- {{ $user->category->first()->name }}'s authority </p>
        <p>- {{ $user->authorized_projects->count() }} authorized projects.</p>
        @if( $user->category->name == 'player' )
            <p>- managed by {{ $user->authorized_by->name }} </p>
        @elseif ( $user->category->name == 'manager' )
            <p>- authorized by {{ $user->authorized_by->name }}</p>
        @endif
    </div>

    
    <div class='py-2'>
        <h2>Authorized projects(s)</h2>
        <div class="py-1">
            @each('components.ldms.project', $user->authorized_projects, 'project')
        </div>
    </div>

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