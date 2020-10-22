<?php
use Illuminate\Support\Facades\Route;

/////////////////DashBoard////////////////
Route::prefix('dashboard')
    ->name('dashboard.')
    ->namespace('Admin')
    ->group(function (){

        Route::get('/home','AdminController@index')->name('index');
        Route::resource('categories','AdminCategoryController');
        Route::resource('admin/post','AdminPostsController');
        Route::resource('user','AdminUsersController');
        Route::resource('comments','CommentsController');
        Route::get('comments/update/{id}/{status}','CommentsController@update')->name('comments.update');
    });



Route::resource('user/post','UserPostsController');


Route::resource('profile','UserProfileController');
Route::post('comment/add','Admin\CommentsController@comment')->name('add.comment');

Auth::routes();
// /Blog Routes
////////////////////////////
Route::get('/','HomeController@index')->name('blog.home');
Route::get('/search','HomeController@search')->name('blog.search');
Route::get('post/{slug}','HomeController@post')->name('blog.post');
Route::get('category/{slug}','HomeController@category')->name('category');
