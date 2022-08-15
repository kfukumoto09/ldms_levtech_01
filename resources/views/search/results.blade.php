@extends('layouts.search')

@section('title', 'Search lab notes')

@section('results')

    <div class='py-2'>
        @if( $results->isEmpty() )
            <p class='py-2 text-gray-400'>No results</p>
        @else
            <div class=''>
                @foreach( $results as $result)
                    <div class="mb-8">
                        @include('components.ldms.search-result', ['subject' => $result, 'lab_note' => $result->lab_note()])
                    </div>
                @endforeach
            </div>
        @endif
    </div>

@endsection