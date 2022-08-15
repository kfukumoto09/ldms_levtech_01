<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @yield('title')
        </h2>
    </x-slot>
    
    
    <!--Body-->
    
    <div class="grid grid-cols-3 gap-10">
        <!--Left | subject list-->
        <div>
            
            <!--Headline-->
            <div class="py-2">
                <h1 class="text-gray-600">Projects</h1>
            </div>
            
            <!--List of projects-->
            <div class='my-2'>
                <div class='leading-tight'>
                    @foreach( $projects_all as $project_tmp )
                        <div class="py-2">
                            <!--Project title-->
                            <div class="">
                                <a href="/projects/{{ $project_tmp->id }}">
                                    <h3 class="text-gray-700 font-semibold">{{ $project_tmp->title }}</h3>
                                </a>
                            </div>
                            
                            <!--Show details of the related project -->
                            @if( $project_tmp->id == $project->id )
                                <div class="">
                                    
                                    <!--Date on which the project was created-->
                                    <div>
                                        <p class='py-1 text-xs'>Created on: {{ $project->updated_at }}</p>
                                    </div>
                                    
                                    <!--List of the subjects-->
                                    <div class="py-1">
                                        @foreach( $project_tmp->subjects as $subject_tmp )
                                            <div class="mb-1 mx-4">
                                                <a href="/subjects/{{ $subject_tmp->id }}">
                                                    <h4 class="text-sm">- {{ $subject_tmp->title }}</h4>
                                                    @if( isset( $subject_tmp->lab_note()->performed_on ) )
                                                        <p class='text-xs text-gray-700'>   {{ $subject_tmp->lab_note()->performed_on }}</p>
                                                    @endif
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                    
                                </div>  
                            @endif  <!--Show details of the related project -->
                        </div>
                    @endforeach
                </div>
            </div> <!--List of projects-->
        </div> <!--Left-->
        
        <!--Right | detail of a subject-->
        <div class="col-span-2">
            @yield('contents')
        </div> <!--right-->
    </div> <!--grid-->

</x-app-layout>




{{--

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <script src="https://unpkg.com/flowbite@1.5.1/dist/datepicker.js"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="mx-auto py-6 px-4 sm:px-6 lg:px-8">  <!-- class="max-w-7xl" を削除した -->
                    <h2 class="font-semibold text-xl text-gray-700 leading-tight">
                        {{ __('Index') }}  
                    </h2>
                </div>
            </header>

            <!-- Page Content -->
            <main class="text-gray mx-auto py-6 px-4 sm:px-6 lg:px-8">
                
                
            </main>
        </div>
    </body>
</html>

--}}