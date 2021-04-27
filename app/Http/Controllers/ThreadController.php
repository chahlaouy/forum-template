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
                'threads'   =>  Thread::withoutGlobalscopes()
                                        ->where('user_id', $user->id)
                                            ->withCount('replies')->get()
            ]);
        }
        if( $request['popular']){

            
            return view('threads.index', [
                'threads'   =>  Thread::withoutGlobalscopes()
                                            ->orderBy('replies_count', 'desc')
                                                ->withCount('replies')->get(),
            ]);
        }
        return view('threads.index', [
            'threads'   =>  Thread::latest()->get()
        ]);
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

        $thread = auth()->user()->threads()->create($attributes);
        
        return redirect()->route('threads.create');
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
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        //
    }
}
