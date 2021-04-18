<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function owner(){

        return $this->belongsTo(User::class, 'user_id');
    }

    public function replies(){

        return $this->hasMany(Reply::class);
    }

    public function channel(){

        return $this->belongsTo(Channel::class);
    }
    public function path(){

        return '/threads/' . $this->channel->name . '/' . $this->slug;
    }

    public function getThumbnailAttribute(){

        return 'https://picsum.photos/700';
    }
    public function getRouteKeyName(){

        return 'slug';
    }
    public function similarPosts($channel_id){

        return Thread::where('channel_id', $channel_id)->get();
    }

}
