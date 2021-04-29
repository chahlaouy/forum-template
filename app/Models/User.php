<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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

    public function getAvatarAttribute(){

        return 'https://i.pravatar.cc/100';
        // return $this->avatar ?: 'https://i.pravatar.cc/100';
    }

    public function path(){

        return  '/profiles/' . $this->name;
    }
    function getRouteKeyName(){
 
        return 'name';
    }
}
