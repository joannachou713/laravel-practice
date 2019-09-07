<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post as PostEloquent;
use App\Comment as PostCommentsEloquent;
use App\SocialUser as SocialUserEloquent;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(PostEloquent::class);
    }

    public function comments()
    {
        return $this->hasMany(PostCommentsEloquent::class);
    }

    public function socialuser()
    {
        return $this->hasOne(SocialUserEloquent::class);
    }

    public function getAvatarUrl()
    {
        if (empty($this->avatar)) {
            return URL::asset('image/avatar/default.jpg');
        } else {
            if (!preg_match("/^[a-zA-Z]+:\/\//", $this->avatar)) {
                return URL::asset($this->avatar);
            } else {
                return $this->avatar;
            }
        }
    }

    public function isAdmin()
    {
        return $this->type == 1;
    }
}
