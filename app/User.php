<?php

namespace App;

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


    public function questions(){
        return $this->hasMany('App\Question');
    }

    //Answer relation
    public function answers(){
        return $this->hasMany('App\Answer');
    }

    public function getUrlAttribute()
    {
//        return route('questions.show',$this->id);
        return "#";
    }
    public function getAvatarAttribute()
    {
//        return route('questions.show',$this->id);
        $email = $this->email;
        $size = 32;
        return "https://www.gravatar.com/avatar/" . md5(strtolower(trim($email))) . "&s" . $size;
    }
}
