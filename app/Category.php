<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use Sluggable;

    protected $fillable=['name','slug'];


    public function sluggable()
    {
        return [
            'slug' => [

                'source' => 'name',
                'onUpdate'=>true

            ]
        ];
    }


    public function post()
    {
        return $this->hasMany('App\post');

    }




    public function scopeWhenSearch($query,$search)
    {

        return $query->when($search, function ($q) use ($search) {
            return $q->where('name', 'like', "%$search%");

        });


    }
}
