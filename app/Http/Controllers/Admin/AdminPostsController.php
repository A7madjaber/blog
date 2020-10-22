<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostEditRequest;
use App\photo;
use App\post;
use Illuminate\Support\Facades\Auth;


class AdminPostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index()
    {
        $posts = Post::whenSearch(request()->search)->paginate(5);
        return view('admin.post.index', compact('posts'));

    }


    public function create()

    {
        $categories = Category::pluck('name', 'id')->all();
        return view('admin.post.create', compact('categories'));
    }


    public function store(PostCreateRequest $request)
    {

        $input = $request->all();

        $user = Auth::user();

        if ($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = photo::create(['file' => $name]);

            $input['photo_id'] = $photo->id;


        }

        $user->posts()->create($input);
        session()->flash('success', 'Data added successfully');
        return redirect()->route('dashboard.post.index');


    }


    public function edit($id)
    {
        $categories = Category::pluck('name', 'id')->all();
        $post = post::findOrFail($id);
        return view('admin.post.edit', compact('post', 'categories'));
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
        session()->flash('success', 'Data Updated successfully');
        return redirect()->route('dashboard.post.index');
    }


    public function destroy($id){
        $post = post::findOrFail($id);
        if ($post->file) {
            unlink(public_path() . $post->photo->file);
        }
        $post->delete();
        session()->flash('success', 'Data deleted successfully');
        return redirect()->route('dashboard.post.index');
    }


}

