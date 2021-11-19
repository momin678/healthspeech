<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Likedislike;
class LikedislikeController extends Controller
{
    public function likedislike_store(Request $request){
        $like_dislike = new Likedislike;
        $like_dislike->user_id = $request->get('user_id');
        $like_dislike->question_id = $request->get('question_id');
        if($request->get('likes')){
            $like_dislike->likes = $request->get('likes');
        }else{
            $like_dislike->likes = 0;
        }
        if($request->get('dislike')){
            $like_dislike->dislike = $request->get('dislike');
        }else{
            $like_dislike->dislike = 0;
        }
        if($like_dislike->save()){
            return true;
        }else{
            return false;
        }
    }
}
