<?php

namespace App\Http\Controllers;

use App\Models\QuestionComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionCommentController extends Controller
{
    public function question_comment(Request $request){
        $ques_comment = new QuestionComment;
        $user_id = Auth::user()->id;
        $ques_comment->user_id = $user_id;
        $ques_comment->question_id = $request->question_id;
        $ques_comment->question_comment = $request->question_comment;
        // dd($ques_comment);
        $ques_comment->save();
        return back();
    }
}
