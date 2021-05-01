<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Thread;
use App\Models\user;
use Carbon\Carbon;
class AdminController extends Controller
{
    
    public function index(){

        $stats = [
            'dayOne' =>  [
                'date' => Carbon::now()->sub(7, 'day')->toDateString(),
                'threads_count' => 0
            ],
            'dayTwo' => [
                'date' => Carbon::now()->sub(6, 'day')->toDateString(),
                'threads_count' => 0
            ],
            'dayThree' =>  [
                'date' => Carbon::now()->sub(5, 'day')->toDateString(),
                'threads_count' => 0
            ],
            'dayfour' =>  [
                'date' => Carbon::now()->sub(4, 'day')->toDateString(),
                'threads_count' => 0
            ],
            'dayfive' =>  [
                'date' => Carbon::now()->sub(3, 'day')->toDateString(),
                'threads_count' => 0
            ],
            'daySix' =>  [
                'date' => Carbon::now()->sub(2, 'day')->toDateString(),
                'threads_count' => 0
            ],
            'daySeven' =>  [
                'date' => Carbon::now()->toDateString(),
                'threads_count' => 0
            ]
        ];


        $startDate = Carbon::now()->sub(7, 'day');
        $endDate = Carbon::now();

        $threads = auth()->user()->threads()->whereBetween('created_at', [$startDate, $endDate])
                            ->get();

        foreach($threads as $thread){

            switch($thread->created_at->toDateString()){
                case $stats['dayOne']['date'] :
                    $stats['dayOne']['threads_count'] = $stats['dayOne']['threads_count'] + 1;
                    break;
                case $stats['dayTwo']['date'] :
                    $stats['dayTwo']['threads_count'] = $stats['dayTwo']['threads_count'] + 1;
                    break;
                case $stats['dayThree']['date'] :
                    $stats['dayThree']['threads_count'] = $stats['dayThree']['threads_count'] + 1;
                    break;
                case $stats['dayfour']['date'] :
                    $stats['dayfour']['threads_count'] = $stats['dayfour']['threads_count'] + 1;
                    break;
                case $stats['dayfive']['date'] :
                    $stats['dayfive']['threads_count'] = $stats['dayfive']['threads_count'] + 1;
                    break;
                case $stats['daySix']['date'] :
                    $stats['daySix']['threads_count'] = $stats['daySix']['threads_count'] + 1;
                    break;
                case $stats['daySeven']['date'] :
                    $stats['daySeven']['threads_count'] = $stats['daySeven']['threads_count'] + 1;
                    break;

            }
        }
        $data = [
            'threads'   => auth()->user()->threads()->orderBy('updated_at', 'DESC')->take(3)->get(),
            'stats' => $stats
        ];
        return view('users.author.dashboard', $data);
    }
}
