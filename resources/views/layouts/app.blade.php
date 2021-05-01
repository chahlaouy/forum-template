<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
        <script type="module" src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule="" src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.js"></script>

        <!-- Styles -->
        <!-- Styles -->
        <link 
            rel="stylesheet" 
            href="{{ asset('css/app.css') }}"
        />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        />
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased text-gray-700">
        @if (Session::get('success'))    
            <x-custom.flash type="success">
                {{Session::get('success')}}
            </x-custom.flash>
        @endif
        @if (Session::get('error'))    
            <x-custom.flash type="error">
                {{Session::get('error')}}
            </x-custom.flash>
        @endif
        
        <div class="min-h-screen bg-green-100">
            @include('layouts.partials.main-navigation')

            <div class="flex justify-between">

                <div class="w-72 py-6 px-4 sm:px-6 lg:px-8 border-r border-gray-300">
                    {{ $sidenavbar }}
                </div>
                <div class="flex-1">
                    <!-- Page Heading -->
                    <header class="max-w-7xl mx-auto mx-4 sm:mx-6 lg:mx-8">
                        <div class="border-b border-gray-300 py-6">
                            {{ $header }}
                        </div>
                    </header>
                    <!-- Page Content -->
                    <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $slot }}
                    </main>
                </div>
            </div>
            
        </div>

    </body>
</html>
