<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>LDMS Cloud</title>  <!-- 元々は {{ config('app.name', 'LDMS cloud') }} -->

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
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main class="text-gray mx-auto py-6 px-4 sm:px-6 lg:px-8">  <!-- class="max-w-7xl" を削除した -->
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
