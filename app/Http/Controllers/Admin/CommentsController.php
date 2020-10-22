<?php

namespace App\Http\Controllers\Admin;
use App\Comments;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller{


    public function index(){
        $comments=Comments::WhenActive(request()->status)
            ->whenSearch(request()->search)->paginate(6);
        return view('admin.comments.index',compact('comments'));
    }




    public function destroy($id){
        Comments::findOrFail($id)->delete();
        session()->flash('success','comment has been deleted');
        return redirect()->back();
    }


    public function comment(Request $request){
        $request->validate([
            'body' => 'required',
        ]);

        $user=Auth::user();
        $data=['post_id'=>$request->post_id,
            'author'=>$user->name,
            'email'=>$user->email,
            'body'=>$request->body,
            'user_id'=>$request->user_id,
        ];

        Comments::create($data);
        $request->session()->flash('comment_message','your message has been submitted and is waiting moderation');
        return redirect()->back();
    }


            public function show ($id){
                $comment= Comments::findOrFail($id);
                return view('admin.comments.show',compact('comment'));
            }


            public function update( $id,$status){
                $comment=   Comments::findOrFail($id);
                $comment-> update(['is_active'=>$status]);
                session()->flash('success','Status has been Updated');
                return redirect()->back();
            }


    }

