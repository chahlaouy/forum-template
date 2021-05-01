<div class="my-8 border border-gray-300 rounded-lg p-4">


    @foreach ($thread->replies as $reply)

        <div class="flex mb-4">
            <div class="rounded-lg mr-4 flex-shrink-0">
                <img src="{{$reply->author->avatar}}" alt="Author avatar" class="w-12 h-12 bg-cover object-cover bg-center rounded-lg">
            </div>
            <div>
                <div class="uppercase block pb-4 font-semibold text-sm">
                    <span class="text-gray-500 uppercase">{{$reply->author->name}}</span> 
                    <span class="uppercase">a dit</span> 
                    <span class="text-gray-500 uppercase">{{$reply->updated_at->diffForHumans()}}</span>
                </div>
                <p class="tracking-wider leading-loose text-gray-600 text-sm">
                    {{$reply->body}}
                </p>
            </div>
        </div>

        
    @endforeach

</div>