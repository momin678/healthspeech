<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ReplyComment;

class ReplyCommentController extends Controller
{
    public function reply_comment_store(Request $request){
        $replyComment = new ReplyComment;
        $userID = Auth::user()->id;
        $replyComment->userID = $userID;
        $replyComment->commentID = $request->commentID;
        $replyComment->replyComment = $request->replyComment;
        // dd($replyComment);
        $replyComment->save();
        return back();
    }
}