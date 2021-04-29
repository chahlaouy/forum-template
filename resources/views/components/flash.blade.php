@props(['type'])

<div class="fixed bottom-0 right-0 p-10" x-data="{open : true}">
    <div class="rounded-2xl p-8 flex justify-between items-center {{$type === 'error' ? 'bg-red-300' : 'bg-green-300'}} " x-show.transition="open">
        <div class="mr-3">
            {{$slot}}
        </div>
        <span x-on:click="open = false" class="cursor-pointer block flex bg-green-400 rounded-full w-10 h-10 items-center justify-center">&times;</span>
    </div>
</div>