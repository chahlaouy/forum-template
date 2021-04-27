<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function author(){

        return $this->belongsTo(User::class, 'user_id');
    }

    public function thread(){

        return $this->belongsTo(Thread::class);
    }

    public function favorites(){ 

        return $this->morphMany(Favorite::class, 'favorited');
    }

    public function favorite(){

        if(! $this->where('user_id', auth()->id())->first())
        $this->favorites()->create([
            'user_id'  => auth()->id()
        ]);
    }

    public function getRouteKeyName(){
        return 'id';
    }
}
