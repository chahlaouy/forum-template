@props(['thread'])
<div class="pb-4">
    <div class="w-full border-b-2 border-gray-300 flex justify-between items-center relative mb-4">
        <div class="flex font-semibold">
            <div class="py-2 border-b-2 border-blue-500 pr-4">
                {{ $thread->replies_count }} {{ Str::plural('Commentaire', $thread->replies_count) }}
            </div>
            <div class="py-2 border-b-2 border-gray-500 px-4">
                DIGi Forum
            </div>
        </div>
        @auth

        @else
            <div class="py-2 border-b-2 border-gray-700 text-gray-500 cursor-pointer" x-data="{toggleDropdown : false}">
                <div class="flex items-center  hover:text-gray-800" x-on:click="toggleDropdown = ! toggleDropdown">
                    <span class="mr-2">login</span>
                    <ion-icon name="chevron-down"></ion-icon>
                </div>
                <ul class="bg-white border-2 border-gray-600 absolute right-0 rounded" x-show.transition="toggleDropdown" x-on:click.away="toggleDropdown = false">
                    <li>
                        <a href="#" class="block py-2 px-4 capitalize hover:bg-blue-500 hover:text-gray-100">
                            facebook
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-4 capitalize hover:bg-blue-500 hover:text-gray-100">
                            google
                        </a>
                    </li>
                </ul>
            </div>
        @endauth

    </div>
    {{$slot}}

    <form action="/blog/{{$thread->channel->name}}/{{$thread->slug}}/replies" method="POST">
        @csrf
        <div class="flex mb-4">
            <div class="flex-shrink-0 w-24 mr-4">
                @auth
                    <img src="{{auth()->user()->avatar}}" alt="User avatar">
                @else
                    <img src="https://i.pravatar.cc/100" alt="User avatar" class="w-full rounded">
                @endauth
            </div>
            <div class="flex-1">
                <label class="block">
                    <textarea class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-400 focus:ring-0 focus:border-blue-500 bg-transparent" rows="5" placeholder="Commencez la discussion ..." name="body"></textarea>
                    @error('body')
                        <span class="text-red-500 text-xs">{{$message}}</span>
                    @enderror
                </label>
            </div>

        </div>

        <div class="md:flex w-full">
            @auth
               <div class="w-full flex items-center">
                    <div class="flex-1">
                    </div>       
                    <div class="flex-1">
                        <button type="submit" class="mt-4 w-full py-2 bg-blue-500 rounded text-gray-100">Commenter</button>
                    </div>       
                </div> 
            @else
                <div class="md:w-40 mr-4">
                    <span class="capitalize font-semibold text-sm text-gray-500 block pb-4">Login with</span>
                    <div class="flex-shrink-0 flex items-start w-full pb-4 md:pb-0">

                        <a href="#" class="flex items-center mr-3">
                            <ion-icon name="logo-facebook" class="text-3xl text-blue-600"></ion-icon>
                        </a>
                        <a href="#" class="flex items-center">
                            <ion-icon name="logo-google" class="text-3xl text-red-500"></ion-icon>
                        </a>
                    </div>
                </div>
            
                <div class="md:flex-1">
                    <label class="block">
                        <span class="text-gray-700">Nom</span>
                        <input type="text" class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-400 focus:ring-0 focus:border-blue-500 bg-transparent" placeholder="Votre Nom" name="name">
                        @error('name')
                            <span class="text-red-500 text-xs">{{$message}}</span>
                        @enderror
                    </label>
                    <label class="block">
                        <span class="text-gray-700">Email</span>
                        <input type="email" class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-400 focus:ring-0 focus:border-blue-500 bg-transparent" placeholder="Votre Email" name="email">
                        @error('email')
                            <span class="text-red-500 text-xs">{{$message}}</span>
                        @enderror
                    </label>
                    <label class="block">
                        <span class="text-gray-700">Password</span>
                        <input type="password" class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-400 focus:ring-0 focus:border-blue-500 bg-transparent" placeholder="Votre Mot de passe" name="password">
                        @error('password')
                            <span class="text-red-500 text-xs">{{$message}}</span>
                        @enderror
                    </label>
                    <button type="submit" class="mt-4 w-full py-2 bg-blue-500 rounded text-gray-100">Commenter</button>
                </div>
            @endauth
        </div>
    </form>
</div>