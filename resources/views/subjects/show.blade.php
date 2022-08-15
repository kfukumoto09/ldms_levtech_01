<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Subject | {{ __($subject->title) }}
        </h2>
    </x-slot>
    
    
    <!--Body-->
    
    <div class="grid grid-cols-3 gap-10">
        <!--Left | subject list-->
        <div>
            
            <!--Headline-->
            <div class="py-2">
                <h1 class="text-gray-600">Projects</h1>
            </div>
            
            <!--List of projects-->
            <div class='my-2'>
                <div class='leading-tight'>
                    @foreach( $projects_all as $project_tmp )
                        <div class="py-2">
                            <!--Project title-->
                            <div class="">
                                <a href="/projects/{{ $project_tmp->id }}">
                                    <h3 class="text-gray-700 font-semibold">{{ $project_tmp->title }}</h3>
                                </a>
                            </div>
                            
                            <!--Show details of the related project -->
                            @if( $project_tmp->id == $project->id )
                                <div class="">
                                    
                                    <!--Date on which the project was created-->
                                    <div>
                                        <p class='py-1 text-xs'>Created on: {{ $project->updated_at }}</p>
                                    </div>
                                    
                                    <!--List of the subjects-->
                                    <div class="py-1">
                                        @foreach( $project_tmp->subjects as $subject_tmp )
                                            <div class="mb-1 mx-4">
                                                <a href="/subjects/{{ $subject_tmp->id }}">
                                                    <h4 class="text-sm">- {{ $subject_tmp->title }}</h4>
                                                    @if( isset( $subject_tmp->lab_note()->performed_on ) )
                                                        <p class='text-xs text-gray-700'>   {{ $subject_tmp->lab_note()->performed_on }}</p>
                                                    @endif
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                    
                                </div>  
                            @endif  <!--Show details of the related project -->
                        </div>
                    @endforeach
                </div>
            </div> <!--List of projects-->
        </div> <!--Left-->
        
        <!--Right | detail of a subject-->
        <div class="col-span-2">
            <div class="py-2">
                <h1>{{ $subject->title }}</h2>
            </div>
            <div class='py-1'>
                <input type="button" value="Details" onclick="clickBtn1()" class='detail_pulldown' />
                <div id='details' class="text-sm">
                    <p>Subject ID: {{ $subject->sub_number }}</p>
                    <p>Created at {{ $subject->created_at }}</p>
                    <p>Updated at {{ $subject->updated_at }}</p>
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
                    <div class='py-1 mt-1'>
                        <a href='/edit/note/subject-{{ $subject->id }}'>
                            Edit the note
                        </a>
                    </div> 
                @endif
            </div>

            <!--Link for returning to the project-->
            <div class='py-1'>
                <a href='/projects/{{ $subject->project->id }}'>
                    Return to the project
                </a>
            </div>
        </div> <!--right-->
    </div> <!--grid-->

</x-app-layout>