<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;

    protected $guarded = [];

    // protected $with = ['owner', 'channel'];

    /* this function is triggred whenever a thread model make a database request
    and then foreach request we return a replies_count propertiy*/
    protected static function boot(){

        parent::boot();

        static::addGlobalScope('replyCount', function($builder){
            $builder->withCount('replies');
        });
        static::addGlobalScope('owner', function($builder){
            $builder->with('owner');
        });
        static::addGlobalScope('channel', function($builder){
            $builder->with('channel');
        });
        static::addGlobalScope('replies', function($builder){
            $builder->with('replies');
        });
        
        

    }

    public function owner(){

        return $this->belongsTo(User::class, 'user_id');
    }

    public function replies(){

        return $this->hasMany(Reply::class)
                        ->with('author');
    }

    public function channel(){

        return $this->belongsTo(Channel::class);
    }
    public function path(){

        return '/blog/' . $this->channel->name . '/' . $this->slug;
    }

    public function getThumbnailAttribute(){

        return 'https://picsum.photos/700';
    }
    public function getRouteKeyName(){

        return 'slug';
    }
    public function similarPosts(){

        return Thread::withoutGlobalScopes()->where('channel_id', $this->channel_id)->latest()->get();
    }

}
