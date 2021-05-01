@props(['thread'])

<div class="md:flex md:items-center md:justify-between">
    <div class="flex items-center justify-around md:justify-start pb-4 md:pb-0">
        <span class="block flex items-center border border-gray-300 rounded-2xl text-gray-700 text-sm mr-2 px-2 py-1">
            <ion-icon name="share-social" class="mr-2"></ion-icon>
            <span>16</span>
        </span>
        <a href="#" class="flex items-center mr-3">
            <ion-icon name="logo-facebook" class="text-3xl text-blue-600"></ion-icon>
        </a>
        <a href="#" class="flex items-center mr-3">
            <ion-icon name="logo-github" class="text-3xl text-gray-600"></ion-icon>
        </a>
        <a href="#" class="flex items-center mr-3">
            <ion-icon name="logo-google" class="text-3xl text-red-500"></ion-icon>
        </a>
        <a href="#" class="flex items-center mr-3">
            <ion-icon name="logo-twitter" class="text-3xl text-blue-400"></ion-icon>
        </a>
        <a href="#" class="flex items-center">
            <ion-icon name="logo-pinterest" class="text-3xl text-red-600"></ion-icon>
        </a>
    </div>
    <div class="flex items-center justify-center md:justify-start"> 
        <div class="block flex items-center border border-gray-300 rounded-2xl text-gray-700 text-sm mr-2 px-2 py-1">
            <ion-icon name="eye" class="mr-2"></ion-icon>
            <span class="pr-2 mr-3 border-r  border-gray-300">16</span>
            <span>{{ $thread->replies->count() }} {{ Str::plural('Commentaire', $thread->replies_count) }}</span>
        </div>
    </div>
</div>