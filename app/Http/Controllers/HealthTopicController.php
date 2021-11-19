<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HealthTopic;
use App\Models\HealthSpeech;
use Illuminate\Support\Str;
class HealthTopicController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index(){
        $allTopics = HealthTopic::all();
        return \view('backend.pages.health-topic.all-health-topic', compact('allTopics'));
    }
    public function add_health_topic(){
        return \view('backend.pages.health-topic.add-health-topic');
    }
    public function store_health_topic(Request $request){
        $request->validate([
            'health_topic_name'=>'required|unique:health_topics,health_topic_name'
        ],
        [
            'health_topic_name.required' => 'Health Topic Name Must-be Required!',
            'health_topic_name.unique' => 'Health Topic Name Must-be Unique!',
            'health_topic_name.max' => 'Health Topic Name Must-be 100 Charectar!'
        ]);
        $health_topic = new HealthTopic([
            'health_topic_name'=> $request->get('health_topic_name'),
            'slug'=>Str::slug($request->get('health_topic_name'), '-'),
        ]);
        $health_topic->save();
        return back()->with('success', 'News Category Add Successfully');
    }
    public function edit_health_topic($id){
        $getData = HealthTopic::where('id', $id)->first();
        return view('backend.pages.health-topic.edit-health-topic', compact('getData'));
    }
    public function update_health_topic(Request $request, $id){
        $request->validate([
            'health_topic_name'=>'required'
        ],
        [
            'health_topic_name.required' => 'Health Topic Name Must-be Required!',
        ]);
        $health_topic = HealthTopic::find($id);
        $health_topic->health_topic_name = $request->health_topic_name;
        $health_topic->slug = Str::slug($request->get('health_topic_name'), '-');
        $health_topic->save();
        return back()->with('success', 'Health Topic Update Successfully');
    }
    public function delete_health_topic($id){
        $health_topic = HealthTopic::find($id);
        $health_topic->delete();
        return back()->with('success', 'Health Topic Delete Successfull!');
    }
    public function active_health_topic(Request $request, $id){
        HealthTopic::where('id',$id)->update(['status'=>0]);
        return back()->with('success', 'This Health Topic Active Successfully');
    }
    public function deactive_health_topic(Request $request, $id){
        HealthTopic::where('id',$id)->update(['status'=>1]);
        return back()->with('success', 'This Health Topic Deactive Successfully');
    }
    public function all_health_topic(){
        $allTopics = HealthTopic::all();
        return view('frontend.pages.all-health-topic', compact('allTopics'));
    }
    public function blog_list_by_topic($slug){
        $topic = HealthTopic::where('slug', $slug)->first();
        $healthPost = HealthSpeech::where('hs_tipics_id', $topic->id)->paginate(10);
        return view('frontend.pages.all-health-post', compact('healthPost'));
    }
}
