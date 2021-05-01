<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\User;
use Illuminate\Http\Request;

class ThreadController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if( $request['by']){

            $user= User::where('name', $request['by'])->firstOrFail();
            return view('threads.index', [
                'threads'   =>  Thread::where('user_id', $user->id)
                                            ->withCount('replies')->paginate(10)
            ]);
        }
        if( $request['popular']){

            
            return view('threads.index', [
                'threads'   =>  Thread::orderBy('replies_count', 'desc')
                                                ->withCount('replies')->paginate(10),
            ]);
        }
        if( $request['timeline']){

            
            return view('threads.index', [
                'threads'   =>  Thread::orderBy('replies_count', 'desc')
                                                ->withCount('replies')->paginate(10),
            ]);
        }
        return view('threads.index', [
            'threads'   =>  Thread::latest()->simplePaginate(10)
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AuthorIndex()
    {
        
        if(auth()->user()->can('viewAny', Thread::class)){
            return view('admin.threads.index', [
                'threads'   =>  auth()->user()->threads()->latest()->paginate(10)
            ]);
        }else{
            return redirect()->route('home');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.threads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $attributes = $request->validate([
            'body' => 'required',
            'title' => 'required | max:255',
            'slug'  => 'required | max:255 | unique:threads,slug',
            // 'thumbnail'  => 'required | image',
            'channel_id' => 'required | exists:channels,id',
        ]);

        if(auth()->user()->can('create', Thread::class)){
            $thread = auth()->user()->threads()->create($attributes);
            if($thread){
    
                return back()->with('success', 'Article Creér avec Succés');
            }else{
                return back()->with('error', "Il ya une erreur s' il vous plais essayer plus tard");
            }
        }else{
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de supprimer cette article");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show($channel, Thread $thread)
    {   
        // return $thread;
        return view('threads.show', [

            'thread' => $thread,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $channel
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy($channel, Thread $thread)
    {
        // dd($thread);
        if(auth()->user()->can('delete', $thread)){
            $thread->delete();
            return back()->with('success', 'Article Supprimée avec succés');
        }else{
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit de supprimer cette article");
        }
    }
}
