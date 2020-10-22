<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use App\photo;
use App\Role;
use App\User;
    class AdminUsersController extends Controller{

        public function __construct(){
        $this->middleware('admin');
    }



    public function index(){

            $users=User::whenSearch(request()->search)->paginate(5);
            return view('admin.users.index',compact('users'));
    }


    public function create(){
            $roles=Role::pluck('name','id')->all();
            return view('admin.users.create',compact('roles'));
        }





    public function store(UserRequest $request){

            if(trim($request->password)==''){
                $input=$request->except('password');
            }

        else{
            $input=$request->all();
            $input['password']=bcrypt($request->password);
        }

        if ($file=$request->file('photo_id')){
            $name=time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo=photo::create(['file'=>$name]);
            $input['photo_id']=$photo->id;
        }

        User::create($input);
        session()->flash('success','Data added successfully');
        return redirect()->route('dashboard.user.index');
    }


    public function edit($id){
            $user=User::findOrFail($id);
            $roles=Role::pluck('name','id')->all();
            return view('admin.users.edit',compact('user','roles'));
        }







    public function update(UserEditRequest $request, $id){
            $user = User::findOrFail($id);

            if(trim($request->password) == ''){
                $input = $request->except('password');
            } else {
                $input = $request->all();
                $input['password'] = bcrypt($request->password);
            }


            if($file = $request->file('photo_id')){
                $name = time() . $file->getClientOriginalName();
                $file->move('images', $name);
                $photo = photo::create(['file'=>$name]);
                $input['photo_id'] = $photo->id;
            }

            $user->update($input);
            session()->flash('success','Data updated successfully');
            return redirect()->route('dashboard.user.index');
        }


        public function destroy($id){

            $user=User::findOrFail($id);
            if($user->file) {
                unlink(public_path() . $user->photo->file);
            }

            $user->delete();
            session()->flash('success','Data deleted successfully');
            return redirect()->route('dashboard.user.index');
        }
}
