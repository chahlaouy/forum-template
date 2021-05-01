@extends('layouts.master')

@section('header')
<div class="max-w-3xl mx-auto h-56 flex items-end">
    
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
            <span class="block px-4 text-center py-2 mr-3">
                125 followers
            </span>
            <span class="block px-4 text-center py-2 mr-3">
                {{$userProfile->threads_count}} {{Str::plural('article', $userProfile->threads_count)}}
            </span>
            
        </div>
    </div>
</div>
@endsection
@section('content')
    <div class="max-w-3xl mx-auto my-8">
        <h1 class="text-2xl font-bold mb-8">Followers</h1>
        <ul>
            @forelse ($userProfile->followers as $user)
                <li class="mb-4">
                    <div class="flex text-sm items-center">
                        <img 
                        src="{{$user->avatar}}" 
                        alt="user avatar"
                        class="w-24 h-24 rounded-full mr-4"
                        >
                        <div>
                            <span class="block text-lg font-bold tracking-wider leading-loose text-black">{{$user->name}}</span>
                            <span class="text-sm text-gray-700">{{$user->email}}</span>
                            
                        </div>
                    </div>    
                </li>    
            @empty
                <div class="text-lg font-bold tracking-wider leading-loose text-black">{{$userProfile->name}} n'a pas encore d'abonnés!</div>
            @endforelse
        </ul>
    </div>


@endsection