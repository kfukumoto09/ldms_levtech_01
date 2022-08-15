<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($subject->title) }}
        </h2>
    </x-slot>
    
    
    <!--Body-->
    
    <div class="grid grid-cols-3">
        <div class='mx-16'>
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
        </div>
        
        <div>
            <div class='py-2'>
                <h2>Objective</h2>
                <p class='text-sm'>{{ $subject->objective }}</p>
            </div>
            
            <div class=''>
                @if( is_null($lab_note) )
                    <div class='py-2'>
                        <a href='/create/note/subject-{{ $subject->id }}'>
                            Create a new note
                        </a>
                    </div> 
                @else
                    <div class='py-2'>
                        @if( isset($lab_note->preparation) )
                            <h2>Preparation</h2>
                            <p class='text-sm'>{{ $lab_note->preparation }}</p>
                        @endif
                    </div>
                    <div class='py-2'>
                        @if( isset($lab_note->methods) )
                            <h2>Methods</h2>
                            <p class='text-sm'>{{ $lab_note->methods }}</p>
                        @endif
                    </div>
                    <div class='py-2'>
                        @if( isset($lab_note->updated_at) )
                            <h2>Performed</h2>
                            <p class='text-sm'>{{ $lab_note->performed_on }}</p>
                        @endif
                    </div>
                    <div class='py-2'>
                        @if( isset($lab_note->updated_at) )
                            <h2>Updated</h2>
                            <p class='text-sm'>{{ $lab_note->updated_at }}</p>
                        @endif
                    </div>
                    <div class='py-2'>
                        <a href='/edit/note/subject-{{ $subject->id }}'>
                            Edit the note
                        </a>
                    </div> 
                @endif
            </div>
        </div>
        
        <div>
            <div class='py-2'>
                <a href='/projects/{{ $subject->project->id }}'>
                    Return to the project
                </a>
            </div>
        </div>
    </div>

</x-app-layout>