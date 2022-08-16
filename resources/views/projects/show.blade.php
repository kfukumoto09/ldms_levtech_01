@extends('layouts.index')

@section('title')
    Project | {{ $project->title }}
@endsection

@section('contents')
    <div class="py-2">
        <h1>{{ $project->title }}</h2>
    </div>
    <div class='py-2'>
        <input type="button" value="Details" onclick="clickBtn1()" class='detail_pulldown' />
        <div id='details' class="text-sm">
            <p>Project ID: {{ $project->id }}</p>
            <p>Created at {{ $project->created_at }}</p>
            <p>Updated at {{ $project->updated_at }}</p>
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
        <h2>Purpose</h2>
        <p class='text-sm'>{{ $project->purpose }}</p>
    </div>
    
    <div class=''>
        <div>
            <h2>Subjects</h2>
        </div>
        <div class='py-1 mb-2'>
            @if( $subjects->isEmpty() )
                <p class="text-sm">No subjects were recorded in this project.</p>
            @else
                @foreach( $subjects as $subject )
                    @include('components.ldms.subject', ['subject' => $subject])
                @endforeach 
            @endif
        </div>
    </div>

    <!--Link for returning to the project index-->
    <div class='py-1'>
        <a href='/projects/index'>
            Return to the index
        </a>
    </div>
    
    <!--Link for authorizing projects to a user-->
    @can('higherThanManager')
        <div class="py-1">
            <a href='/users/player/authorize-projects'>Authorize projects for users</a>
        </div>
    @endcan
    
@endsection