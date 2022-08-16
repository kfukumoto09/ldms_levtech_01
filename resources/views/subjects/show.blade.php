@extends('layouts.index')

@section('title')
    Subject | {{ $subject->title }}
@endsection

@section('contents')
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
@endsection
