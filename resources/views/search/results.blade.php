<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Search results
        </h2>
    </x-slot>
    
    
    <!--Body-->
    
    <div class=''>
        
        <div class='py-2'>
            <!--<h2>Results</h2>-->
                @if( $results->isEmpty() )
                    <p class='py-2 text-gray-400'>No results</p>
                @else
                    <div class=''>
                        @foreach( $results as $result)
                            @include('components.ldms.subject', ['subject' => $result])
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