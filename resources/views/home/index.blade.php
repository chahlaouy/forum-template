@extends('layouts.master')

@section('header')
    <div class="max-w-7xl mx-auto flex items-center h-96">
        <div class="flex-1 text-center bg-green-300 shadow p-4 rounded-lg">
            <h1 class="text-2xl font-bold text-gray-800 pb-4">
                Consulting, c'est plus que donner des conseils
            </h1>
            <p class="tracking-wide leading-loose text-gray-600 text-sm max-w-sm mx-auto pb-4">
                Pour réussir en affaires aujourd'hui, vous devez être flexible et avoir une bonne planification
            </p>
            <a href="#" class="inline-block text-gray-100 w-56 text-center py-2 rounded shadow bg-blue-500"
            {{-- style="background: 
                background: rgb(251,171,126);
                background: linear-gradient(62deg, rgba(251,171,126,1) 0%, rgba(247,206,104,1) 100%);" --}}
            >Commencer  Maintenant
            </a>
            <a href="#" class="inline-block text-blue-500 w-56 text-center py-2 rounded">Nos Références
            </a>
        </div>
        <div class="flex-1">

        </div>
    </div>
@endsection
@section('content')
    <div class="pt-12 ">
        @foreach ($threads as $thread)     
            <div class="max-w-2xl mx-auto mb-24">
                <div class="overflow-hidden shadow-sm sm:rounded-lg">
                    {{-- post header --}}
                    <div class="mb-3">
                        <span class="text-gray-700">Publié</span>
                        <span class="text-gray-800">{{$thread->updated_at->diffForHumans()}}</span>
                    </div>
                    <a href="{{$thread->path()}}" class="block text-3xl font-black mb-3">{{$thread->title}}</a>
                    <div class="relative z-20">
                        {{-- <div class="absolute w-full h-full bg-gray-900 bg-opacity-25 z-30"></div> --}}
                        <div class="absolute top-0 left-0 p-4 z-40">
                            <span class="px-3 py-2 rounded-full bg-blue-600 text-white uppercase text-xs">
                                {{$thread->channel->name}}
                            </span>
                        </div>
                        <a href="{{$thread->path()}}" class="block h-96 mb-4">

                            <img src="{{$thread->thumbnail}}" alt="article image thumbnail" class="w-full h-full bg-cover object-cover bg-center rounded-lg">
                        </a>
                    </div>

                    {{-- <div class="p-4 bg-white border-b border-gray-200">
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
                                    <ion-icon name="chatbubble-ellipses" class="text-green-500"></ion-icon>    
                                </span>
                                <span class="mr-2">{{ $thread->replies_count }}</span>
                                <span class="mr-2">
                                    <ion-icon name="thumbs-up" class="text-blue-500"></ion-icon>   
                                </span>
                                <span>{{ 0 }}</span>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <p class="tracking-wider leading-loose text-black text-lg mb-3">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae beatae aliquid tempore exercitationem mollitia. Consectetur culpa praesentium deserunt.
                </p>
                <a href="{{$thread->path()}}" class="block font-bold text-green-600 text-sm tracking-wide leading-loose mb-4">En savoir plus sur l'article</a>
                <div class="flex justify-between items-center">
                    <div>
                        <span class="text-xs text-gray-600">{{ $thread->created_at->diffForHumans() }}</span> 
                    </div>
                    <div class="flex items-center text-sm text-gray-600">

                        <ion-icon name="chatbubble-ellipses" class="mr-2"></ion-icon>    

                        <span class="mr-2">{{ $thread->replies_count }}</span>

                        <div class="w-5 h-5 transform transition mr-2">

                            <x-custom.clap-icon></x-custom.clap-icon>
                        </div>

                        <span>{{ 0 }}</span>
                    </div>
                </div>
            </div>
            
        @endforeach
    </div>
    <div class="w-56 mx-auto my-6">
        {{$threads->links()}}
    </div>
    
@endsection