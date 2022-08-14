<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Console') }}
        </h2>
    </x-slot>
    
    
    <!--Body-->
    
    <div class="grid grid-cols-2">
        <!--Grid left-->
        <div>
            <div class="py-2">
                <h1>Users</h1>
            </div>
            
            <div class="py-2">
                <p>Following users have been registered:</p>
                <p>- {{ $administrators->count() }} administrators</p>
                <p>- {{ $managers->count() }} managers</p>
                <p>- {{ $players->count() }} players</p>
            </div>
            
            <div class='py-2'>
                <h2>Administrator(s)</h2>
                <div class="py-1">
                    @each('components.ldms.user', $administrators, 'user')
                </div>
            </div>
            
            <div class='py-2'>
                <h2>Manager(s)</h2>
                <div class="py-1">
                    @each('components.ldms.user', $managers, 'user')
                </div>
            </div>
            
            <div class='py-2'>
                <h2>Player(s)</h2>
                <div class="py-1">
                    @each('components.ldms.user', $players, 'user')
                </div>
            </div>
            
            <!--Link for creating a new user-->
            @can('isManager')
                <div class="py-1">
                   <a href="/register">Create a new user</a><br>
                </div> 
            @endcan
            
            <!--Link for authorizing projects to a user-->
            @can('isManager')
                <div class="">
                   <a href="/users/manager/authorize-projects">Authorize projects for managers</a><br>
                </div> 
            @endcan
        </div> <!--Grid left-->
        
        <!--Grid right-->
        <div>
            <div class="py-2">
                <h1>Projects</h1>
            </div>
        
            <div class="py-2">
                <p>Following items have been recorded:</p>
                <p>- {{ $projects->count() }} projects</p>
                <p>- {{ $subjects->count() }} subjects</p>
            </div>
            
            <div class='py-2'>
                <h2>Project(s)</h2>
                <div class="py-1">
                    @each('components.ldms.project', $projects, 'project')
                </div>
            </div>
            
            <div class='py-2'>
                <h2>Subject(s)</h2>
                <div class="py-1">
                    @each('components.ldms.subject', $subjects, 'subject')
                </div>
            </div>

            <!--Link for creating a new project-->
            <div class='py-1'>
                <a href="/create/project">Create a new project</a>
            </div>

        </div> <!--Grid right-->
        
    </div> <!--Grid layout-->


</x-app-layout>
