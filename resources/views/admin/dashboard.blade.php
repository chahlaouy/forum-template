<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <form action="{{route('threads.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        
        <div class="flex py-12 max-w-7xl mx-auto" x-data="{ result : '', title: 'Titre Ici' }">
            <div class="flex-1">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            
                            <label class="block mb-4">
                                <span class="text-gray-700">Nom de l'article</span>
                                <input 
                                type="text" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                                placeholder="Nom de l'article" 
                                name="title" 
                                x-model="title"
                                {{-- value="{{old('title')?:''}}" --}}
                                x-on:keyup="result = title.replace(/ /g, '-')"
                                >
                            </label>
                            <label class="block mb-4">
                                <span class="text-gray-700">Slug de la'article</span>
                                <input 
                                type="text" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                                placeholder="Slug" 
                                name="slug" 
                                x-model="result"
                                x-on:keyup="result = result.replace(/ /g, '-')"
                                >
                            </label>
                            <label class="block mb-4">
                                <span class="text-gray-700">Channel</span>
                                <select class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="channel_id" id="channel_id">
                                    <option value="" disabled selected>Choisissez</option>
                                    @foreach ($channels as $channel)  
                                        <option value="{{$channel->id}}">{{$channel->name}}</option> 
                                    @endforeach
                                </select>
                                </label>
                                <label class="block">
                                    <span class="text-gray-700">Contenu de l'article</span>
                                    <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="3" spellcheck="false" id="body" name="body" >
                                        {{old('body')}}
                                    </textarea>
                                </label>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-56 p-2">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                    <div class="p-2 bg-white border-b border-gray-200">
                        <button type="submit" class="py-2 w-full bg-blue-500 rounded text-gray-100 mb-4">Publish</button>
                    </div>
                    <div class="p-2 flex w-full">

                        <label class="block mb-4">
                            <span class="text-gray-700 block bg-gray-300 text-center rounded py-2">Image Thumbnail</span>
                            <input type="file" class="custom-file-input w-full" name="thumbnail" accept="file/*">
                        </label>
                    </div>
                    
                </div>
                @if ($errors->any())
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8 p-2">
                        
                        <ul class="list-disc">
                            @foreach ($errors->all() as $error)
                                <li class="text-red-500">{{ $error }}</li>
                                <hr>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </form>

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'body', {
            filebrowserUploadUrl: "{{route('CKEditor.store', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
    
</x-app-layout>
