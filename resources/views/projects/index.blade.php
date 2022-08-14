@extends('layouts.index')

@section('footer')

    <!--Link for creating a new project-->
    <div class='py-1'>
        <a href="/create/project">Create a new project</a>
    </div>
    
    <!--Link for authorizing projects to a user-->
    <div class='py-1'>
        @can('higherThanManager')
            <div>
               <a href="/users/player/authorize-projects">Authorize projects for players</a>
            </div> 
        @endcan
    </div>

    <!--Link for crating a new user-->
    <div class='py-1'>
        @can('isAdministrator')
            <div class="container-md">
               <a href="/register">Create a new user</a><br>
            </div> 
        @endcan               
    </div>
    
@endsection