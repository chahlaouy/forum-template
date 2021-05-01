
<nav x-data="{ open: false, dropdown: false, dropdownBrowse : false}" class="">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex justify-between w-full">
                <!-- Logo -->
                <div class="flex">

                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('threads.index') }}">
                            <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                        </a>
                    </div>
    
                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <div class="relative z-50">
                            <div
                                class="cursor-pointer block inline-flex items-center h-full px-1 pt-1 border-b-2 border-blue-600 text-sm font-medium leading-5 text-gray-700 focus:outline-none hover:border-indigo-700 transition duration-150 ease-in-out hover:text-gray-900"
                                x-on:click="dropdownBrowse = !dropdownBrowse"
                                >
                                    <span>Browse</span> 
                                    <ion-icon name="caret-down"></ion-icon>
                            </div>
                            <ul class="w-56 bg-white rounded-lg absolute py-px border border-gray-200" x-show.transition="dropdownBrowse" x-on:click.away="dropdownBrowse = false">
                                
                                <li>
                                    <a href="{{route('threads.index')}}?popular=true" class="block py-2 pl-4 hover:bg-gray-100">
                                        Populaires
                                    </a>
                                </li>
    
                            </ul>
                            
                        </div> 
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <div class="relative z-40">
                                <div
                                class="cursor-pointer block inline-flex items-center h-full px-1 pt-1 border-b-2 text-sm font-medium leading-5 text-gray-700 focus:outline-none hover:border-blue-600 transition duration-150 ease-in-out hover:text-gray-900"
                                x-on:click="dropdown = !dropdown"
                                >
                                    <span>Category</span> 
                                    <ion-icon name="caret-down"></ion-icon>
                                </div>
                            <ul class="w-56 bg-white rounded-lg absolute py-px border border-gray-200" x-show.transition="dropdown" x-on:click.away="dropdown = false">
                                @foreach ($channels as $channel) 
                                    <li>
                                        <a href="{{$channel->path()}}" class="block py-2 pl-4 hover:bg-gray-100">
                                            {{$channel->name}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('login')">
                        {{ __('Login') }}
                    </x-nav-link>
                    <x-nav-link :href="route('register')"> 
                        {{ __('Register') }}
                    </x-nav-link>                 
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('threads.index')">
                {{ __('Home') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('login')">
                {{ __('Login') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('register')">
                {{ __('Register') }}
            </x-responsive-nav-link>
        </div>
        
    </div>
</nav>
