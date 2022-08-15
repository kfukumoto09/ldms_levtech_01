<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($lab_note->subject->title) }}
        </h2>
    </x-slot>
    
    
    <!--Body-->

    <div class='py-2'>
        <p class='text-sm'>Project Title: {{ $project->title }}</p>
        <p class='text-sm'>ID: {{ $project->id }}-{{ $subject->sub_number }}</p>
        <p class='text-xs'>
            Created at {{ $subject->created_at }}<br> 
            Updated at {{ $subject->updated_at }}
        </p>
    </div>
    
    <div class='py-2'>
        <h2>Objective</h2>
        <p class='text-sm'>{{ $subject->objective }}</p>
    </div>
    
    <div class="py-2">
        <form id="create", action="/create/note/subject-{{ $subject->id }}" method="POST" class="row">
            @csrf
            <!--Preparation-->
            <div class="py-2">
                <label for="preparation"><h2>Preparation</h2></label>
                <textarea name="lab_note[preparation]" id="preparation" rows="4" 
                            class='textarea w-full h-64' >{{ old('lab_note.preparation', $last_note->preparation) }}</textarea>
            </div>
            
            <!--Methods-->
            <div class="py-2">
                <label for="methods"><h2>Methods</h2></label>
                <textarea name="lab_note[methods]" id="methods" rows="4" 
                            class='textarea w-full h-64' >{{ old('lab_note.methods', $last_note->methods) }}</textarea>
            </div>
            
            <!--Datepicker-->
            <div class='py-2'>
                <label for='date'><h2>Date</h2></label>
                <div inline-datepicker data-date={{ date('yyyy-mm-dd') }} name='lab_note[performed_on]' id='date'></div>
            </div>
            
            <!--Hidden: subject_id-->
            <input name='lab_note[subject_id]' class='hidden' value='{{ $subject->id }}'/>
            
            <div class='py-2'>
                <button type="submit" class="btn"> Submit </button>
            </div>
        </form>
    </div>
        
    <div class='py-2'>
        <a href='/subjects/{{ $subject->id }}'>
            Return to the subject
        </a>
    </div>

</x-app-layout>
