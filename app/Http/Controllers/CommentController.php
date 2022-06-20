<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Session;
class CommentController extends Controller
{
    public function storeComment(Request $request){
        $data =$request->all();
        $validateData=$request->validate([
            'content'=> 'required',
            'name'=>'required',
            'email'=> 'required',

        ]);
        $comment = new Comment();
        $comment->content = $data['content'];
        $comment->name = $data['name'];
        $comment->email = $data['email'];
        $comment->website_url = $data['website_url'];
        $comment->blog_id = $data['blog_id'];
        $comment->save();
        Session::flash('success_message', 'Comment Has Been Added Successfully');
        return redirect()->back(); 



    }
}
