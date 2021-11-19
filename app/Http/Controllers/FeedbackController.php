<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
class FeedbackController extends Controller
{
    //
    public function store(Request $request){
        $feedback = new Feedback([
            'post_id'=> $request->get('post_id'),
            'feedback'=> $request->get('feedback')
        ]);
        $feedback->save();
        return ['success'=>true, 'message'=>'data insert successfull!'];
    }
}
