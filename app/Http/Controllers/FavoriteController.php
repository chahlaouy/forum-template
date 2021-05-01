<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reply;

class FavoriteController extends Controller
{
    /**
     *  @param \App\Models\Reply $reply
     * @return \Illuminate\Http\Response
     */
    public function favoriteReply(Reply $reply){

        $reply->favorite();
        return $reply->favorites;
    }
    public function favoriteThread(Reply $reply){

        $reply->favorite();
        return $reply->favorites;
    }
}
