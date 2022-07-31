<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($project->title) }}
        </h2>
    </x-slot>
    
    
    <!--Body-->

    <div class='my-5'>
        <p class='text-sm'>Project ID: {{ $project->id }}</p>
        <p class='text-xs'>
            Created at {{ $project['created_at'] }}<br> 
            Updated at {{ $project['updated_at'] }}
        </p>
    </div>
    
    <div class='py-2'>
        <h2>Purpose</h2>
        <p class='text-sm'>{{ $project->purpose }}</p>
    </div>
    
    <div class='py-2'>
        <h2>Subjects</h2>
        <div class=''>
            @each('components.ldms.subject', $project->subjects, 'subject')
        </div>
    </div>
    
    <a href='/projects/index'>
        Return to the index
    </a>
    
    @can('higherThanManager')
        <div class=''>
            <a href='/projects/{{ $project->id }}/create'>
                Authorize projects for users
            </a>
        </div> 
    @else
        <p class='caution'>-- Manager authorization is not displayed for your account. --</p>
    @endcan
    
    @can('isAdministrator')
        <div class=''>
           <a href="/register">Create a new user</a><br>
        </div> 
    @else
        <p class='caution'>-- User registration is not authorized for your account. --</p>
    @endcan

</x-app-layout>