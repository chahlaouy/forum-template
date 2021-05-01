<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;
use App\Notifications\FollowNotification;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot(){
        parent::boot();
        static::addGlobalScope('threadCount', function($builder){
            $builder->withCount('threads');
        });
    }
    

    public function threads(){

        return $this->hasMany(Thread::class);
    }

    public function replies(){

        return $this->hasMany(Reply::class);
    }

    public function timeline(){
         $following = $this->follows->pluck('id');

         return Thread::whereIn('user_id', $following)
                            ->orWhere('user_id', $this->id)
                            ->latest()->paginate(10);
    }

    public function getAvatarAttribute(){

        return 'https://i.pravatar.cc/300';
        // return $this->avatar ?: 'https://i.pravatar.cc/100';
    }

    public function path(){

        return  '/profiles/' . $this->name;
    }
    // function getRouteKeyName(){
 
    //     return 'name';
    // }

    public function followers(){
        
        return $this->belongsToMany(User::class, 'follows','following_user_id', 'user_id');
    }
    public function follows(){
        return $this->belongsToMany(User::class, 'follows','user_id', 'following_user_id');

    }

    public function follow(User $user){
        return $this->follows()->save($user);
    }
    public function unfollow(User $user){
        return $this->follows()->detach($user);
    }

    public function toggleFollow(User $user){
        if($this->isFollowing($user)){
            Notification::send([$user], new FollowNotification([
                'name' => $this->name,
                'action' => 'unfollow'
            ]));
            return $this->unfollow($user);
        }
        Notification::send([$user], new FollowNotification([
            'name' => $this->name,
            'action' => 'follow'
        ]));
        return $this->follow($user);
    }

    public function isFollowing($user){
        return $this->follows()->where('following_user_id', $user->id)->exists();
    }
}
