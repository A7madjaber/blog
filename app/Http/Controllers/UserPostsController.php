<?php

namespace App\Http\Controllers;
use App\Category;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostEditRequest;
use App\photo;
use App\post;
use Illuminate\Support\Facades\Auth;

class UserPostsController extends Controller
{


    public function store(PostCreateRequest $request)
    {
        $input = $request->all();


        $user = Auth::user();

        if ($file=$request->file('photo_id')){

            $name=time().$file->getClientOriginalName();

            $file->move('images',$name);

            $photo=photo::create(['file'=>$name]);

            $input['photo_id']=$photo->id;


        }


        $user->posts()->create($input);
        session()->flash('comment_message','Data added successfully');
        return redirect()->route('blog.home');

    }



    public function edit($slug)
    {


        $post = Post::whereSlug($slug)->firstOrFail();

        if (Auth::user()->id==$post->user_id){
            return view('user.edit-post', compact('post', 'categories'));
        } else{
            return redirect()->back();
        }

    }


    public function update(PostEditRequest $request, $id){
        $input = $request->all();

        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;
        }

        $post=post::findOrFail($id);
        $post->update($input);
        session()->flash('comment_message', 'Data Updated successfully');
        return redirect()->route('blog.home');
    }


    public function destroy($slug){


        $post = Post::whereSlug($slug)->firstOrFail();

        if (Auth::user()->id==$post->user_id){
            if ($post->file) {
                unlink(public_path() . $post->photo->file);
            }
            $post->delete();
            session()->flash('comment_message', 'Data deleted successfully');
            return redirect()->route('blog.home');

        } else{
            return redirect()->back();


        }



}
