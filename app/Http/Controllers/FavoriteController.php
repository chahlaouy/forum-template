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
    public function storeReply(Reply $reply){

        $reply->favorite();
        return $reply->favorites;
    }
    public function storeThread(Reply $reply){

        $reply->favorite();
        return $reply->favorites;
    }
}
