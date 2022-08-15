<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Authorize projects to a player
        </h2>
    </x-slot>
    
    
    <!--Body-->

    <div class="container">
        <form id="authorize", action="/users/player/authorize-projects" method="POST" class="row">
            @csrf

            <div class="py-2">
                <label for="authorized_user"><h2>Choose a user to be authorized</h2></label>
                <x-select id="authorized_user" 
                            class="block mt-1 w-64" 
                            name="updated_user_id"
                            :collection="$users"
                            :value="old('name')" required autofocus />
            </div>
            
            <div class="py-2">
                <label for="projects"><h2>Choose projects to be authorized</h2></label>
                <div class="py-2">
                    @foreach( $projects as $project )
                    <div class="flex items-center mb-2">
                        <input id="project_{{ (string) $project->id }}" name="project_ids[]" type="checkbox" value={{ $project->id }} class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="project_{{ (string) $project->id }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">#{{ $project->id }} | {{ $project->title }}</label>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class='py-2'>
                <button type="submit" class="btn"> Submit </button>
            </div>

        </form>
    </div>
        
    <div class='py-2'>
        <a href='/projects/index'>
            Return to the index
        </a>
    </div>

</x-app-layout>