<div class="fixed z-50 bottom-0 right-0 p-8 bg-transparent cursor-pointer" x-data="{animation: false, count : 1}">
         
    <div 
        x-bind:class="{ 'animate__backOutUp': animation }"
        class="items-center flex w-16 h-16 rounded-full bg-green-300 justify-center text-lg text-blue-500 mb-1 animate__animated" 
        x-show="animation"
        x-text="count" 
    >
   </div>

    <div class="items-center flex w-16 justify-center text-sm text-blue-500 mb-4">
       <span class="block w-8 h-8 flex items-center justify-center bg-blue-200 rounded-full">
           25    
       </span>  
   </div>
   <div class="flex items-center justify-center w-16 h-16 rounded-full bg-blue-100 border-2 border-blue-500" x-on:click="
   animation = ! animation
   count++
   
   setTimeout(function(){
       animation = false
   }, 500)
   {{-- window.axios.post('/threads/favorites/{{$thread->slug}}', {}) --}}
   ">
       <div class="w-8 h-8 transform transition" :class="animation ? 'scale-150' : 'scale-100'">

           <x-clap-icon></x-clap-icon>
       </div>
   </div>
</div>