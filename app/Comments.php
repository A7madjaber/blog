<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{

    protected $fillable = [

        'post_id',
        'user_id',
        'body',
        'is_active'


    ];

    public function post(){


        return $this->belongsTo('App\Post');

    }




    public function user(){


        return $this->belongsTo('App\user');


    }



    public function scopeWhenSearch($query, $search)
    {
        return $query->whereHas('user',function($q) use($search){
            return $q->where('name','like', "%$search%");

        });


    }


    public function scopeWhenActive($query , $status){

        return $query->when($status,function($q) use($status){
            return $q->where('is_active',$status);
        });

    }


}
