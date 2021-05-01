@extends('layouts.master')

@section('header')
<div class="max-w-7xl mx-auto h-56 flex items-end">
    <div class="w-96">

    </div>
    <div class="flex-1">
        <h1 class="text-3xl font-bold tracking-wider text-gray-700">{{$userProfile->name}}</h1>
        <span class="block text-xs mb-4">{{$userProfile->email}}</span>
        <div class="flex items-center">
            
            <form action="/profiles/{{$userProfile->name}}/follow" method="post">
                @csrf
                <button type="submit" class="focus:outline-none block px-14 text-center text-gray-100 py-2 bg-blue-600 rounded-full shadow mr-3">
                    
                    @auth
                        {{auth()->user()->isFollowing($userProfile) ? 'unfollow' : 'follow'}}
                    @else
                        follow
                    @endauth
                </button>
            </form>
            <a href="/profiles/{{$userProfile->name}}/followers" class="block px-4 text-center py-2 mr-3">
                125 followers
            </a>
            <span class="block px-4 text-center py-2 mr-3">
                {{$userProfile->threads_count}} {{Str::plural('article', $userProfile->threads_count)}}
            </span>
            
        </div>
    </div>
</div>
@endsection
@section('content')
    <div class="max-w-7xl mx-auto flex">
        <div class="w-96 p-8 -mt-48">
            <div class="w-full h-96 relative">
                <div class="absolute w-full h-full z-20 bg-gray-900 bg-opacity-25 rounded-t-2xl">

                </div>
                <img src="{{$userProfile->avatar}}" class="w-full h-full bg-cover bg-center object-cover rounded-t-2xl relative z-10" alt="user-profile-avatar">
                <div class="absolute bottom-0 right-0 p-4 w-full flex z-30 items-center justify-between">
                    <form action="/profiles/{{$userProfile->name}}/follow" method="post">
                        @csrf
                        <button type="submit" class="focus:outline-none block px-5 text-center text-gray-700 py-2 bg-green-300 rounded-full shadow mr-3 font-semibold">
                            @auth
                        {{auth()->user()->isFollowing($userProfile) ? 'unfollow ' : 'follow '}}
                        @else
                            follow 
                        @endauth
                        {{$userProfile->name}}
                        </button>
                    </form>
                    
                    <span class="flex items-center justify-center w-10 h-10 bg-gray-900 bg-opacity-50 font-bold rounded-full text-gray-100 border border-gray-500">
                        <ion-icon name="ellipsis-horizontal"></ion-icon>
                    </span>
                </div>
            </div>

            {{-- profile description --}}
            <div class="p-4 bg-white shadow rounded-b-2xl">
                <span class="block pb-4 font-bold text-sm uppercase">A propos</span>
                <p class="tracking-wide leading-loose text-gray-600 text-xs mb-8">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, perspiciatis at ab alias vitae accusamus est eaque? Nesciunt similique culpa dicta mollitia perspiciatis! Maiores deleniti accusamus quae dolorum earum ab!
                </p>
                {{-- <a href="#" class="block text-center py-2 rounded-full w-48 text-gray-700 font-semibold border border-gray-300 mb-4">Lire plus</a> --}}

                <ul>
                   <li class="py-2 flex items-center justify-between text-gray-600 font-bold text-sm uppercase border-b border-gray-200">
                        <span>Followers</span>
                        <span>125</span>
                    </li> 
                   <li class="py-2 flex items-center justify-between text-gray-600 font-bold text-sm uppercase border-b border-gray-200">
                        <span>articles</span>
                        <span>125</span>
                    </li> 
                </ul>
            </div>

        </div>
        <div class="flex-1">
            {{-- <h1 class="font-bold text-4xl my-12 text-gray-900">Les Articles</h1> --}}
            @forelse ($threads as $thread) 
                <div class="max-w-xl mx-auto my-24">
                    {{-- post header --}}
                    <div class="mb-3">
                        <span class="text-gray-700">Publié le</span>
                        <span class="text-gray-800">{{$thread->updated_at->diffForHumans()}}</span>
                    </div>
                    <a href="{{$thread->path()}}" class="block text-3xl font-black mb-3">{{$thread->title}}</a>
                    <a href="{{$thread->channel->path()}}" class="block text-sm uppercase text-gray-700 mb-3">{{$thread->channel->name}}</a>
                    <a href="{{$thread->path()}}" class="block w-full h-96 mb-3">
                        <img src="{{$thread->thumbnail}}" alt="article image thumbnail" class="w-full h-full bg-cover object-cover bg-center rounded-lg">
                    </a>
                    <p class="tracking-wider leading-loose text-black text-lg pb-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae beatae aliquid tempore exercitationem mollitia. Consectetur culpa praesentium deserunt.
                    </p>
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-xs text-gray-600">{{ $thread->created_at->diffForHumans() }}</span> 
                        </div>
                        <div class="flex items-center text-sm text-gray-600">

                            <ion-icon name="chatbubble-ellipses" class="mr-2"></ion-icon>    
    
                            <span class="mr-2">{{ $thread->replies_count }}</span>
    
                            <div class="w-5 h-5 transform transition mr-2">
    
                                <x-clap-icon></x-clap-icon>
                            </div>
    
                            <span>{{ 0 }}</span>
                        </div>
                    </div>
                </div>
                <div>
                    {{$threads->links()}}
                </div>
            @empty
                
            @endforelse
        </div>
    </div>
@endsection