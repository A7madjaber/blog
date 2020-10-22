<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AdminCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $categories =Category::whenSearch(request()->search)->paginate(5);
        return view('admin.categories.index',compact('categories'));
    }


         public function create()
    {

        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Category::create($request->all());
        session()->flash('success','Data added successfully');
        return redirect()->route('dashboard.categories.index');

    }


    public function edit($id)
    {
       $category= Category::findOrFail($id);
        return view('admin.categories.edit',compact('category'));
    }


    public function update(Request $request, $id)
    {
        $input = $request->all();
        Category::findOrfail($id)->update($input);
        session()->flash('success','Data Updated successfully');
        return redirect()->route('dashboard.categories.index');

    }


    public function destroy($id)
    {
        $category=  Category::findOrFail($id);
        $category->delete();
        session()->flash('success','Data deleted successfully');
        return redirect()->route('dashboard.categories.index');

    }
}
