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
        <link 
            rel="stylesheet" 
            href="{{ asset('css/app.css') }}"
        />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        />

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body class="antialiased bg-gray-100 text-gray-800">
        @if (Session::get('success'))    
            <x-flash type="success">
                {{Session::get('success')}}
            </x-flash>
        @endif
        @if (Session::get('error'))    
            <x-flash type="error">
                {{Session::get('error')}}
            </x-flash>
        @endif
        <div class="bg-gray-100">
            @auth
                @include('layouts.navigation.main-navigation')   
            @else
                @include('layouts.navigation.nav-guest')
            @endauth
            <div>
                @yield('header')
            </div>
        </div>
        <div class="px-4 max-w-7xl mx-auto sm:flex md:px-0">
            <div class="w-full sm:flex-1">
                @yield('content')
            </div>
        </div>
    </body>
</html>