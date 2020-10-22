<?php

namespace App\Http\Controllers;

use App\Category;
use App\post;


class HomeController extends Controller
{


    public function index()
    {
        $posts=post::OrderBy('created_at','desc')->paginate(3);
        return view('front.index',compact('posts','categories'));
    }



    public function post($slug){

        $post = Post::whereSlug($slug)->firstOrFail();
        $comments=$post->comments()->whereIsActive(1)->get();
        return view('front.post',compact('post','comments','replies','categories'));
    }



    public function category($slug){
        $category = Category::whereSlug($slug)->firstOrFail();
        $posts=$category->post()->paginate(2);
        $category_name=$category->name;
        return view('front.category',compact('posts','categories','category_name'));
    }


    public function search(){

        $posts =post::whenSearch(request()->search)->paginate(2);
        return view('front.search', compact('posts', 'categories'));
    }

}

