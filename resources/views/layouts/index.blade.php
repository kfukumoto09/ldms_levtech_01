<x-app-layout>
    
    <!--head-->

    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Index
        </h2>
    </x-slot>
    
    
    <!--Body-->
    
    <!-- Index -->
    <div class="grid grid-cols-3">
        <!-- Left bar | project list -->
        <div class='py-2'>
            <h2 class="text-gray-600">Projects</h2>
            <div class='my-2'>
                <div class='py-2 leading-tight'>
                    <script>
                        var array_project_id = [];
                    </script>
                    @foreach( $projects as $project)
                        
                        <input type="button" value="{{ $project->title }}" onclick="clickBtn1()" class='text-gray-700 font-semibold text-sm' />
                        
                        <!--Show only when the project title was clicked -->
                        <div id="show_project_{{ $project->id }}">
                            <p class='text-xs'>{{ $project->updated_at }}
                                @foreach( $project->subjects as $subject )
                                    <div class="py-1 mx-4">
                                        <h4>{{ $subject->title }}</h4>
                                        <!--<p class='text-xs'>{{ $subject->updated_at }}                                -->
                                    </div>
                                @endforeach
                        </div>  <!--Show only when the project title was clicked -->
                        <script>
                            // Hidden at first
                            array_project_id.push("show_project_" + "{{ $project->id }}");
                            var number = {{ $project->id }} -1;
                            console.log("project_id: " + {{ $project->id }});
                            console.log("number: " + number);
                            console.log("id: " + array_project_id[number]);
                            document.getElementById(array_project_id[number]).style.display ='none';
                            
                            function clickBtn1(){
                            	const show = document.getElementById(array_project_id[number]);
                            
                            	if(show.style.display=='block'){
                            		// none = Hidden
                            		show.style.display ='none';
                            	}else{
                            		// block = show
                            		show.style.display ='block';
                            	}
                            }
                        </script>
                    @endforeach
                </div>
                {{-- @each('components.ldms.project', $projects, 'project') --}}
            </div>
        </div>
        
        <!-- Main contents -->
        <div>
            @yield('contents')
        </div>
    </div>
    
    <hr>
    
    <!-- footer -->
    <div class="py-2">
        @yield('footer')
    </div>
    
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