<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Search lab notes
        </h2>
    </x-slot>
    
    
    <!--Body-->
    
    
    <div class='max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8'>
        <form id="search", action="/search/results" method="GET" class="row">
        @csrf
            <!--<div class="grid grid-cols-3">-->
            
            <!--Search Box-->
            <div class='py-2'>
                <input name='search[words]' class='input'></textarea>
                <button type="submit" class="btn">Search</button>
            </div>
            
            <!--Date-->
            <div class="py-2">
                <label for="created_from"><h2>Date</h2></label>
                
                From <input name='search[created_from]' id='created_from' class='input w-24'/>
                To   <input name='search[created_to]' id='created_to' class='input w-24'/>
            </div>
            
            <!--</div>-->
        </form>
    </div>
    

</x-app-layout>