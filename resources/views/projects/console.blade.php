<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Console') }}
        </h2>
    </x-slot>
    
    
    <!--Body-->

    <div class="py-2">
        <h1>** This is a console page for administrators. **</h1>
    </div>
    
    <div class="py-2">
        <p>Following users have been registered:</p>
        <p>- {{ $user->administrators()->count() }} administrators</p>
        <p>- {{ $user->managers()->count() }} managers</p>
        <p>- {{ $user->players()->count() }} players</p>
    </div>
    
    <div class='py-2'>
        <h2>Administrator(s)</h2>
        <div class="py-1">
            @each('components.ldms.user', $user->administrators(), 'user')
        </div>
    </div>
    
    <div class='py-2'>
        <h2>Manager(s)</h2>
        <div class="py-1">
            @each('components.ldms.user', $user->managers(), 'user')
        </div>
    </div>
    
    <div class='py-2'>
        <h2>Player(s)</h2>
        <div class="py-1">
            @each('components.ldms.user', $user->players(), 'user')
        </div>
    </div>
    
    @can('isManager')
        <div class="py-1">
           <a href="/register">Create a new user</a><br>
        </div> 
    @else
        <p class='caution'>-- User registration is not authorized for your account. --</p>
    @endcan
    
    @can('isManager')
        <div class="">
           <a href="/console/authorize">Authorize projects for managers</a><br>
        </div> 
    @else
        <p class='caution'>-- Manager authorization is not displayed for your account. --</p>
    @endcan

</x-app-layout>
