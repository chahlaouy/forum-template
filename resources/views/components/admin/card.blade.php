@props(['threads'])

    <div class="grid grid-cols-3 gap-4">
        @forelse ($threads as $thread)
            <div class="flex items-center bg-white shadow-2xl p-4 rounded-2xl w-72">
                <div class="">
                    <h2 class="text-xl text-green-800 font-bold text-green-900">
                        {{$thread->title}}
                    </h2>
                    <div class="text-sm text-gray-500 py-1">
                        Date de création : <span class="text-sm text-indigo-500">{{$thread->created_at->diffForHumans()}}</span>
                    </div>
                    <div class="text-sm text-gray-500 py-1">
                        Dérniere mise a jour : <span class="text-sm text-indigo-500">{{$thread->updated_at->diffForHumans()}}</span>
                    </div>
                    <div class="text-sm text-gray-500 py-1">
                        Nombre des claps : <span class="text-sm text-indigo-500">{{$thread->replies_count}}</span>
                    </div>
                    <div class="text-sm text-gray-500 mb-6">
                        Nombre des commentaires : <span class="text-sm text-indigo-500">{{$thread->replies_count}}</span>
                    </div>
                    <div class="flex items-center justify-end">
                        <a href="{{$thread->path()}}" class="block w-12 h-12 rounded-2xl bg-green-100 shadow-2xl flex items-center justify-center">
                            <ion-icon name="play-circle"></ion-icon>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-white shadow p-4 rounded-2xl">
                Vous n'avez pas encore d'article<a href="{{route('threads.create')}}" class="text-green-800 underline"> Publiez-en un nouveau</a>
            </div>
        @endforelse
    </div>