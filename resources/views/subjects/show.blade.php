<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($subject->title) }}
        </h2>
    </x-slot>
    
    
    <!--Body-->
    
    <div class='py-2'>
        
        <input type="button" value="Details" onclick="clickBtn1()" class='detail_pulldown' />
        <div id='details'>
            <p class='text-sm'>Subject ID: {{ $subject->sub_number }}</p>
            <p class='text-xs'>Created at {{ $subject->created_at }}</p>
            <p class='text-xs'>Updated at {{ $subject->updated_at }}</p>
        </div>
        
        <script>
        //初期表示は非表示
        document.getElementById("details").style.display ='none';
        
        function clickBtn1(){
        	const details = document.getElementById('details');
        
        	if(details.style.display=='block'){
        		// noneで非表示
        		details.style.display ='none';
        	}else{
        		// blockで表示
        		details.style.display ='block';
        	}
        }
        </script>
        
    </div>
    
    <div class='py-2'>
        <h2>Objective</h2>
        <p class='text-sm'>{{ $subject->objective }}</p>
    </div>
    
    <div class='py-2'>
        <h2>Methods</h2>
        <p class='text-sm'>{{ $subject->lab_notes->first()->methods }}</p>
    </div>
    
    <div class='py-2'>
        <a href='/create/note/subjects/{{ $subject->id }}'>
            Create a new note
        </a> <br>
    </div>
        
    <div class='py-2'>
        <a href='/projects/{{ $subject->project->id }}'>
            Return to the project
        </a>
    </div>
    
    @can('isAdministrator')
        <div class=''>
           <a href="/register">Create a new user</a><br>
        </div> 
    @else
        <p class='caution'>-- User registration is not authorized for your account. --</p>
    @endcan

</x-app-layout>