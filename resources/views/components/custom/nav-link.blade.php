@props(['route', 'href', 'name'])

@php
    $class = $route ? '' : 'opacity-0'
@endphp
    <a href="{{$href}}" class="block py-2 text-green-800 font-semibold flex items-center">
        <ion-icon name="{{$name}}" class="block mr-2 {{$class}}"></ion-icon>
        <span class="block">
            {{ $slot }}
        </span>
    </a>
    
