<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Search lab notes
        </h2>
    </x-slot>
    
    
    <!--Body-->
    
    <div class='max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8'>
        
        <div class='py-2'>
            <h2>Results</h2>
                @if( $results->isEmpty() )
                    <p class='py-2 text-gray-300'>No results</p>
                @else
                    <div class=''>
                        @foreach( $results as $result)
                            @include('components.ldms.subject', ['subject' => $result->subject])
                        @endforeach
                    </div>
                @endif
        </div>
        
        
        
        <div class='py-2'>
            <a href='/search'>
                Search again
            </a>
        </div>
        
    </div>
    
</x-app-layout>