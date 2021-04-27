@extends('layouts.master')
@section('content')
    {{-- section for favoriting a thread --}}

    <div class="fixed z-50 bottom-0 right-0 p-8 bg-transparent cursor-pointer" x-data="{animation: false, count : 1}">
         
         <div class="items-center flex w-16 justify-center text-lg text-blue-500 mb-1">
             <span class="block h-8 flex items-center justify-center" x-show.transition.1000ms="animation">+</span> 
             <span class="block h-8 flex items-center justify-center" x-text="count" x-show.transition.1000ms="animation"></span> 
        </div>
         <div class="items-center flex w-16 justify-center text-sm text-blue-500 mb-4">
            <span class="block w-8 h-8 flex items-center justify-center bg-blue-200 rounded-full">
                25    
            </span>  
        </div>
        <div class="flex items-center justify-center w-16 h-16 rounded-full bg-blue-100 border-2 border-blue-500" x-on:click="
        animation = true
        count++
        fetch('http://127.0.0.1/replies/favorites/1').then(data => console.log).catch(e => console.log)
        setTimeout(function(){
            animation = false
        }, 100)
    ">
            <div class="w-8 h-8 transform transition sc" :class="animation ? 'scale-150' : 'scale-100'">

                <x-clap-icon></x-clap-icon>
            </div>
        </div>
    </div>
    <div class="pt-12 lg:flex">

        <div class="flex-1 lg:mr-8">
            <div class="px-4 lg:px-24 pb-8">
                <img src="{{$thread->thumbnail}}" alt="" class="w-full h-96 bg-cover object-cover bg-center rounded-lg">
            </div>
            <span class="px-3 py-2 rounded-full bg-blue-600 text-white uppercase text-xs">
                {{$thread->channel->name}}
            </span>
            {{-- channel --}}
            <h1 class="text-black text-5xl tracking-wide my-8 font-semibold">{{$thread->title}}</h1>

            {{-- author --}}
            <div class="md:flex md:items-center pb-8">
                <div class="flex items-center justify-around md:justify-start mb-4 md:mb-0">
                    <img src="{{$thread->owner->avatar}}" alt="" class="w-12 rounded-full mr-4">
                    <span class="capitalize mr-2 text-gray-500">par</span>
                    <a href="{{ $thread->owner->path() }}" class="text-blue-500 mr-4">{{$thread->owner->name}}</a>
                </div>
                <div class="flex items-center justify-around md:justify-start">
                    <span class="capitalize mr-2 text-gray-500">dernière mise à jour: </span>
                    <span class="text-gray-800 mr-4">{{$thread->updated_at->diffForHumans()}}</span>
                </div>
            </div>
            <x-social-icons :thread="$thread"></x-social-icons>
            
            <div class="my-8">
                <article class="prose prose-sm sm:prose lg:prose-lg xl:prose-xl">
                    {!! $thread->body !!}
                </article>
            </div>
            <x-social-icons :thread="$thread"></x-social-icons>

            {{-- author link and description --}}
            <div class="my-8 border border-gray-300 rounded-lg p-4 flex">
                <div class="border border-gray-300 rounded-lg mr-4 flex-shrink-0">
                    <img src="{{$thread->owner->avatar}}" alt="Author avatar" class="w-32 h-32 bg-cover object-cover bg-center rounded-lg">
                </div>
                <div>
                    <span class="uppercase block pb-4 font-semibold">{{$thread->owner->name}}</span>
                    <p class="tracking-wider leading-loose text-gray-600 text-sm">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum doloribus, saepe debitis similique minima amet veniam voluptatem culpa dolores neque est eius ipsam
                    </p>
                </div>
            </div>
            {{-- Similar posts --}}
            <div class="mb-8 border border-gray-300 rounded-lg p-4">
                <h2 class="capitalize text-2xl font-semibold flex items-center pb-8 flex text-gray-700"><span class="mr-4">Vous aimerez également</span> <ion-icon name="chevron-forward-outline" class="text-blue-500"></ion-icon></h2>
                <div class="sm:grid sm:grid-cols-2 sm:gap-4 lg:grid-cols-3 lg:gap-8">
                    @foreach ($thread->similarPosts() as $similarPost)
                        <div class="">
                            <img src="{{$similarPost->thumbnail}}" alt="similar post thumbnail" class="w-full rounded-lg mb-4">
                            <h2>
                                <a href="{{$similarPost->path()}}" class="capitalize tracking-wide font-bold text-lg hover:text-blue-500">
    
                                    {{$similarPost->title}}
                                </a>
                            </h2>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- comments section --}}

            

            <x-comment-component :thread="$thread">
                @include('layouts.old-comments')
            </x-comment-component>
        </div>
        <x-sidebar></x-sidebar>
        
    </div>
@endsection