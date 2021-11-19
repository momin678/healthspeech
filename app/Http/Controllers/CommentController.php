<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment(Request $request){
        $userID = Auth::user()->id;
        $comment = new Comment;
        $comment->userID = $userID;
        $comment->postID = $request->postID;
        $comment->comment = $request->comment;
        // dd($comment);
        $comment->save();
        return back();
    }
    public function comment_reply(Request $request ){
        $id = $request->get('id');
        $commentID = Comment::where('id', $id)->first();
        // error_log($id);
        return view('frontend.pages.users.replyForm', compact('commentID'));
    }
}
