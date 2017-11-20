<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'full_name',
        'email',
        'password',
        'avatar',
        'gender',
        'address',
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

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id');
    }

    public function rates()
    {
        return $this->hasMany(Rate::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }

    public function forks()
    {
        return $this->hasMany(Fork::class, 'user_id');
    }

    public function plans()
    {
        return $this->hasMany(Plan::class, 'user_id');
    }

    public function requestServices()
    {
        return $this->hasMany(RequestService::class, 'user_id');
    }

    public function isLocalAvatar($name)
    {
        $length = strlen(strstr($name, 'https://'));
        if($length > 0 ) {
            return true;
        }
        
        return false;
    }

    public function getAvatarAttribute()
    {
        $avatarName = $this->attributes['avatar'];
        if ($this->isLocalAvatar($avatarName)) {
            return $avatarName;
        }

        return asset(config('setting.defaultPath') . $avatarName);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function followerUsers()
    {
        return $this->hasMany(Follow::class, 'follower_id');
    }

    public function followingUsers()
    {
        return $this->hasMany(Follow::class, 'following_id');
    }

    public function scopeWhereFollowing($query, $id)
    {
        return $query = User::Where('id', $id)->with('followerUsers.followingUser')->first();
    }

    public function scopeWhereFollower($query, $id)
    {
        return $query = User::Where('id', $id)->with('followingUsers.followerUser')->first();
    }
}
