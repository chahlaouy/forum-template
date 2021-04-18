<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\User;
use App\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     ** @param  \App\Models\Thread  $thread
     * @param   $channel
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $channel, Thread $thread)
    {
        if (auth()->user()){
            $attributes = $request->validate([
                'body' => 'required|max:255',
            ]);

            $reply = auth()->user()->replies()->create([
                'body'  => $attributes['body'],
                'thread_id' => $thread->id
            ]);

            return back();
            
            
        }else{
            $attributes = $request->validate([
                'body' => 'required|max:255',
                'name'  => 'required|unique:users,name|max:50',
                'email' => 'required|unique:users,email|email',
                'password' => 'required|max:255'
            ]);

            $user = User::create([
                'name'  =>  $attributes['name'],
                'email'  =>  $attributes['email'],
                'password'  =>  \Hash::make($attributes['password']),
            ]);

            $reply = $user->replies()->create([
                'body'  => $attributes['body'],
                'thread_id' => $thread->id,
            ]);
            
            event(new Registered($user));

            Auth::login($user);

            return back();

        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Reply $reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function edit(Reply $reply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reply $reply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
        //
    }
}
