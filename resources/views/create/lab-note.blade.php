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
            <div class="py-1">
                <label for="preparation"><h2>Preparation</h2></label>
                <textarea name="lab_note[preparation]" id="preparation" rows="4" 
                            class='textarea w-full h-64' >{{ old('lab_note.preparation', $last_note->preparation) }}</textarea>
            </div>
            <div class="py-1">
                <label for="methods"><h2>Methods</h2></label>
                <textarea name="lab_note[methods]" id="methods" rows="4" 
                            class='textarea w-full h-64' >{{ old('lab_note.methods', $last_note->methods) }}</textarea>
            </div>
            <script src="../path/to/flowbite/dist/datepicker.js"></script>
                <div class="relative">
                  <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                  </div>
                  <input datepicker type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                </div>
            <input name='lab_note[subject_id]' class='hidden' value='{{ $subject->id }}'/>
            <button type="submit" class="btn"> Submit </button>
        </form>
    </div>
        
    <div class='py-2'>
        <a href='/subjects/{{ $subject->id }}'>
            Return to the subject
        </a>
    </div>

</x-app-layout>
