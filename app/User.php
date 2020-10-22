<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;



    protected $fillable = [
        'name', 'email', 'password','role_id','photo_id','bio'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];



    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


 public  function role(){
    return $this->belongsTo('App\Role');
}


public function photo(){

    return $this->belongsTo('App\photo');
}


    public function setPasswordAttribute($password){


        if(!empty($password)){

            $this->attributes['password'] = bcrypt($password);

        }

        $this->attributes['password'] = $password;

    }




    public function isAdmin(){


        if($this->role->name  == "admin"){


            return true;

        }

        return false;


    }


    public function posts(){


        return $this->hasMany('App\post');


    }

    public function comments(){


        return $this->hasMany('App\Comments');


    }

    public function replies(){


        return $this->hasMany('App\CommentsReplay');


    }


    public function scopeWhenSearch($query, $search)
    {

        return $query->when($search, function ($q) use ($search) {
            return $q->where('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%");

        });



    }


}
