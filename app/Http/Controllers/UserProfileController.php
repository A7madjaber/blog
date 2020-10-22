<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserEditRequest;
use App\photo;
use App\User;


class UserProfileController{

    public function index(){
        return view('user.profile.index');
    }

    public function update(UserEditRequest   $request, $id)
    {


        $user = User::findOrFail($id);

        if(trim($request->password) == ''){
            $input = $request->except('password');
        }
        else
            {
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
        session()->flash('success');
        return redirect()->back();
    }


}
