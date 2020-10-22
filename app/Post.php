<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;


class post extends Model
{


    use Sluggable;


    public function searchableAs()
    {
        return 'title';
    }

    public function sluggable()
    {
        return [
            'slug' => [

                'source' => 'title',
                'onUpdate' => true

            ]
        ];
    }


    protected $fillable = [
        'title',
        'body',
        'user_id',
        'photo_id',
        'category_id',

    ];

    public function user()
    {
        return $this->belongsTo('App\User');

    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');

    }


    public function category()
    {
        return $this->belongsTo('App\Category');

    }

    public function scopeWhenSearch($query, $search)
    {

        return $query->when($search, function ($q) use ($search) {
            return $q->where('title', 'like', "%$search%")
                ->orWhere('body', 'like', "%$search%");

        });


    }

    public function comments(){
        return $this->hasMany('App\Comments');

    }
}
