@extends('layouts.master')
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