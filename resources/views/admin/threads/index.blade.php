<x-app-layout>
    {{-- Navigation side for admin dashboard --}}
    @include('admin.layouts.navigation')
    <x-slot name="header"> 
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-700 leading-tight">
                Créer une article
            </h2>
            <div class="flex items-center">
                <div class="w-10 h-10 bg-white rounded-2xl mr-2 flex items-center justify-center text-green-600">
                    <ion-icon name="notifications-outline"></ion-icon>
                </div>
                <div class="w-10 h-10 bg-white rounded-2xl mr-2 flex items-center justify-center text-green-600">
                    <ion-icon name="mail-outline"></ion-icon>
                </div>
                <x-button-search>
                    
                </x-button-search>
            </div>
        </div>
    </x-slot>
    <x-admin.table :threads="$threads"></x-admin.table>
    
    
    
    
</x-app-layout>
