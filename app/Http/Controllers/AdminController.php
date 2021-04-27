<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Thread;
use App\Models\user;

class AdminController extends Controller
{
    
    public function index(){

        $data = [
            'threads'   => auth()->user()->threads->take(3)
            // 'threads'   => Thread::where('user_id', auth()->id())->orderBy('id', 'desc')->take(3)->get()
        ];
        return view('admin.dashboard', $data);
    }
}
