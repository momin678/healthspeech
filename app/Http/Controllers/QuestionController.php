<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Question;
use App\Models\HealthTopic;
use App\Models\QuestionComment;
use App\Models\User;
class QuestionController extends Controller
{
    public function aske_question(){
        $allQuestion  = Question::limit(10)->get();
        $healthTopic = HealthTopic::all();
        return view('frontend.pages.qustionFrom', compact('allQuestion', 'healthTopic'));
    }
    public function index(Request $request)
    {
        $allUsers = User::all();
        $questions = Question::paginate(2);
        $data ='';
        if ($request->ajax()) {
            return view('frontend.pages.more_questions', compact('questions', 'allUsers'));
        }
        return view('frontend.pages.allQuestion', compact('questions', 'allUsers'));
    }

    public function question_store(Request $request){
        $request->validate([
            'question'=>'required|max:250',
            'topic_id'=>'required'
        ],
        [
            'question.required'=> 'Somthing writing about question',
            'question.max'=> 'Somthing writing about question',
            'topic_id.required'=> 'Please select Topic for get answer.'
        ]
    );
    $userID = Auth::id();
    if($userID == null){
        return back()->with('error', 'Please login at first!');
    }
    $question = new Question;
    $question-> user_id = $userID;
    $question-> topic_id = $request->topic_id;
    $question-> name = $request->name;
    $question-> question = $request->question;
    $question->save();
    return back()->with('success', 'Question Ask Successfully!');
    }
    
    public function see_anser_question(Request $request, $id){
        $ques_info = Question::find($id);
        $related_question  = Question::where('topic_id', $ques_info->topic_id)->limit(10)->get();
        $ques_commnent = QuestionComment::where('question_id', $ques_info->id)->get();
        // dd($ques_commnent);
        $userInfo = User::find($ques_info->user_id);
        return view('frontend.pages.single_question', compact('ques_info', 'userInfo', 'ques_commnent', 'related_question'));
    }

}