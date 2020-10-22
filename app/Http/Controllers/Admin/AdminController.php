<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\post;
use App\User;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');

    }


    public function index()
    {
        $postsCount=post::count();
        $categoriesCount=Category::count();
        $UsersCount=User::count();
        return view('admin.index',compact('categoriesCount','postsCount','UsersCount'));

    }

}
