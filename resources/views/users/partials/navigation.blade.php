<x-slot name="sidenavbar">
    <ul>
        <li>
            <x-custom.nav-link 
            :href="route('dashboard')" 
            name="chevron-forward-outline" 
            :route="request()->routeIs('dashboard')">
                Dashboard
            </x-custom.nav-link>
        </li>
        <li>
            <x-custom.dropdown>
                <x-slot name="trigger">
                    <x-custom.nav-link 
                        href="#" 
                        name="chevron-forward-outline" 
                        :route="request()->routeIs('threads.create')">
                            Acticles
                    </x-custom.nav-link>
                </x-slot>
                <x-slot name="content">
                    <div class="ml-3">
                        <x-custom.nav-link 
                            :href="route('threads.create')" 
                            name="chevron-forward-outline" 
                            :route="request()->routeIs('threads.create')">
                                Créer une article
                        </x-custom.nav-link>
                        <x-custom.nav-link 
                            :href="route('author.threads.index')" 
                            name="chevron-forward-outline" 
                            :route="request()->routeIs('author.threads.index')">
                                Liste des article
                        </x-custom.nav-link>
                    </div>
                </x-slot>
            </x-custom.dropdown>
        </li>
        <li>
            <x-custom.nav-link 
            :href="route('home')" 
            name="chevron-forward-outline" 
            :route="request()->routeIs('home')">
                Historique
            </x-custom.nav-link>
        </li>
        <li>
            <x-custom.nav-link 
            :href="route('home')" 
            name="chevron-forward-outline" 
            :route="request()->routeIs('home')">
                Messages
            </x-custom.nav-link>
        </li>
        <li>
            <x-custom.nav-link 
            :href="route('home')" 
            name="chevron-forward-outline" 
            :route="request()->routeIs('home')">
                Notifications
            </x-custom.nav-link>
        </li>
        <li>
            <x-custom.nav-link 
            :href="route('home')" 
            name="chevron-forward-outline" 
            :route="request()->routeIs('home')">
                Commentaires
            </x-custom.nav-link>
        </li>
        <li>
            <x-custom.nav-link 
            :href="route('home')" 
            name="chevron-forward-outline" 
            :route="request()->routeIs('home')">
                Catégories
            </x-custom.nav-link>
        </li>
        <li>
            <x-custom.nav-link 
            :href="route('logout')" 
            name="chevron-forward-outline" 
            :route="request()->routeIs('home')">
                Déconnexion
            </x-custom.nav-link>
        </li>
        

    </ul>
</x-slot>