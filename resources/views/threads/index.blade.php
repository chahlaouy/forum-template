@extends('layouts.master')

@section('header')
    <div class="max-w-7xl mx-auto flex items-center h-96">
        <div class="flex-1 text-center bg-white shadow p-4 rounded-lg">
            <h1 class="text-2xl font-bold text-gray-700 pb-4">
                Consulting, c'est plus que donner des conseils
            </h1>
            <p class="tracking-wide leading-loose text-gray-700 text-sm max-w-sm mx-auto pb-4">
                Pour réussir en affaires aujourd'hui, vous devez être flexible et avoir une bonne planification
            </p>
            <a href="#" class="inline-block text-gray-100 w-56 text-center py-2 rounded shadow bg-blue-600 border-2 border-blue-600">Commencer  Maintenant
            </a>
            <a href="#" class="inline-block text-blue-600 w-56 text-center py-2 rounded border-2 border-blue-600">Nos Références
            </a>
        </div>
        <div class="flex-1">

        </div>
    </div>
@endsection
@section('content')
    <div class="pt-12 sm:grid sm:grid-cols-2 sm:gap-4 lg:grid-cols-3 lg:gap-8">
        @foreach ($threads as $thread)
            
            <div class="">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="relative z-20">
                        <div class="absolute w-full h-full bg-gray-900 bg-opacity-25 z-30"></div>
                        <div class="absolute top-0 left-0 p-4 z-40">
                            <span class="px-3 py-2 rounded-full bg-blue-600 text-white uppercase text-xs">
                                {{$thread->channel->name}}
                            </span>
                        </div>
                        <img src="{{$thread->thumbnail}}" alt="" class="w-full h-48 bg-cover bg-center object-cover relative z-20">
                    </div>
                    <div class="p-4 bg-white border-b border-gray-200">
                        <h2>
                            <a href="{{$thread->path()}}" class="capitalize tracking-wide font-bold text-lg hover:text-blue-500">

                                {{$thread->	title}}
                            </a>
                        </h2>
                        <div class="flex justify-between items-center pt-8">
                            <div>
                                <span class="text-xs text-gray-600">{{ $thread->created_at->diffForHumans() }}</span> 
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <span class="mr-2">
                                    <ion-icon name="chatbubble-ellipses-outline" ></ion-icon>    
                                </span>
                                <span class="mr-2">{{ $thread->replies_count }}</span>
                                <span class="mr-2">
                                    <ion-icon name="thumbs-up-outline"></ion-icon>   
                                </span>
                                <span>{{ 0 }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
@endsection