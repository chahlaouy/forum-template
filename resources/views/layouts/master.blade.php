<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased bg-gray-100">
        <div>
            @auth
                @include('layouts.main-navigation')   
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Connexion</a>
    
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Inscription</a>
            @endauth
        </div>

        @yield('content')
        
    </body>
</html>