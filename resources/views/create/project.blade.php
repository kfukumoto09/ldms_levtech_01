<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create a new project
        </h2>
    </x-slot>
    
    
    <!--Body-->
    
    <div class="py-2">
        <form id="create", action="/create/project" method="POST" class="row">
            @csrf
            <!--Title-->
            <div class="py-2">
                <label for="title"><h2>Title</h2></label>
                <textarea name="project[title]" id="title" rows="4" 
                            class='textarea w-full h-10' >{{ old('project.title') }}</textarea>
            </div>
            
            <!--Purpose-->
            <div class="py-2">
                <label for="purpose"><h2>Purpose</h2></label>
                <textarea name="project[purpose]" id="purpose" rows="4" 
                            class='textarea w-full h-64' >{{ old('project.purpose') }}</textarea>
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