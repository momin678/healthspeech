<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReplyCommentQuestion;
use Illuminate\Support\Facades\Auth;

class ReplyCommentQuestionController extends Controller
{
    public function reply_comment_store(Request $request){
        $replyComment = new ReplyCommentQuestion;
        $userID = Auth::user()->id;
        $replyComment->userID = $userID;
        $replyComment->commentID = $request->commentID;
        $replyComment->replyComment = $request->replyComment;
        // dd($replyComment);
        $replyComment->save();
        return back();
    }
}
