<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($lab_note->subject->title) }}
        </h2>
    </x-slot>
    
    
    <!--Body-->

    <div class='py-2'>
        <p class='text-sm'>Project Title: {{ $lab_note->subject->project->title }}</p>
        <p class='text-sm'>ID: {{ $lab_note->subject->project->id }}-{{ $lab_note->subject->sub_number }}</p>
        <p class='text-xs'>
            Created at {{ $lab_note['subject']['created_at'] }}<br> 
            Updated at {{ $lab_note['subject']['updated_at'] }}
        </p>
    </div>
    
    <div class='py-2'>
        <h2>Objective</h2>
        <p class='text-sm'>{{ $lab_note->subject->objective }}</p>
    </div>
    
    <div class="py-2">
        <form id="create", action="/create/notes" method="POST" class="row">
            @csrf
            <div class="py-1">
                <label for="methods"><h2>Methods</h2></label>
                <textarea name="lab_note[methods]" id="methods" rows="4" class='' >{{ old('lab_note.methods') }}</textarea>
                <p class="purpose__error" style="color:red">{{ $errors->first('project.purpose') }}</p>
            </div>
            <button type="submit" class="btn btn-default"> Submit </button>
        </form>
    </div>
        
    <div class='py-2'>
        <a href='/subjects/{{ $lab_note->subject_id }}'>
            Return to the subject
        </a>
    </div>

</x-app-layout>

{{--
@extends('layouts.master')

@section('title', 'LDMS Cloud')

@section('content')
    <div class="container">
        <p>Create a new project.</p>
        <a href="/index">Return</a><br>
        <br>
        <form id="create", action="/create/notes" method="POST" class="row">
            @csrf
            <div class="col-sm-8">
                
                <div class="form-group">
                    <label for="methods"> Methods </label>
                    <textarea name="lab_note[methods]" id="methods" rows="4" class="form-control" >{{ old('lab_note.methods') }}</textarea>
                    <p class="purpose__error" style="color:red">{{ $errors->first('project.purpose') }}</p>
                </div>
                
                <button type="submit" class="btn btn-default"> Submit </button>
            </div><!-- col-sm-8 -->
        </form>
    </div>
@endsection
--}}
