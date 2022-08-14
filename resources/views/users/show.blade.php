<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("$user->name's page") }}
        </h2>
    </x-slot>
    
    
    <!--Body-->
    <div>
        <p>Account status:</p>
        <p>- {{ $category->name }}'s authority </p>
        <p>- {{ $projects->count() }} authorized projects.</p>
        @if( isset( $authorizing_user ) )
            @if( $category->name == 'player' )
                <p>- managed by {{ $authorizing_user->name }} </p>
            @elseif ( $category->name == 'manager' )
                    <p>- authorized by {{ $authorizing_user->name }}</p>
            @endif
        @else
            <p>- no one authorizes this user.</p>
        @endif
    </div>

    
    <div class='py-2'>
        <h2>Authorized project(s)</h2>
        <div class="py-1">
            @each('components.ldms.project', $projects, 'project')
        </div>
    </div>
    
    <div class='py-2'>
        @can('isAdministrator')
            <a href='/console'>
                Return to the console
            </a>
        @else
            <p class='caution'>-- Console is not authorized for your account.</p>
        @endcan
    </div>
    
</x-app-layout>