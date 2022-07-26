<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("$user->name's page") }}
        </h2>
    </x-slot>
    
    
    <!--Body-->
    <div>
        <p>Account status:</p>
        <p>- {{ $user->category->name }}'s authority </p>
        <p>- {{ $user->authorized_projects->count() }} authorized projects.</p>
        @if( $user->category->name == 'player' )
            <p>- managed by {{ $user->authorized_by->name }} </p>
        @elseif ( $user->category->name == 'manager' )
            <p>- authorized by {{ $user->authorized_by->name }}</p>
        @endif
    </div>

    
    <div class='py-2'>
        <h2>Authorized projects(s)</h2>
        <div class="py-1">
            @each('components.ldms.project', $user->authorized_projects, 'project')
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