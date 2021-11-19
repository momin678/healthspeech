<?php

namespace App\Http\Controllers;
use App\Models\HealthSpeech;
use App\Models\HealthTopic;
use App\Models\SubHealthSpeech;
use App\Models\SubSubHS;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class SubHealthSpeechController extends Controller
{
    public function index(){
        $allSubHealthSpeech = SubHealthSpeech::all();
        return \view('backend.pages.sub-hs.all-sub-hs', compact('allSubHealthSpeech'));
    }
    public function add_sub_hs(Request $request, $id){
        $id = $id;
        $allID = SubHealthSpeech::all();
        return \view('backend.pages.sub-hs.add-sub-hs', compact('id', 'allID'));
    }
    public function store_sub_hs(Request $request){
        $request ->validate([
            'sub_hs_title'=>'required'
        ],
        [
            'sub_hs_title.required' => 'Title Must-be Required!',
        ]);
        $sub_health_speech = new SubHealthSpeech([
            'hs_tipics_id'=> $request->get('topicID'),
            'sub_hs_title'=> $request->get('sub_hs_title'),
            'sub_hs_description'=> $request->get('sub_hs_description'),
            'summery_of_topics'=> $request->get('summery_of_topics'),
        ]);
        $image = $request->file('sub_hs_image');
        if($image !== null){
            $imageName = time().'.'.$image->extension();
            $image->move(\public_path('images/sub-topic-pic'), $imageName);
            $sub_health_speech->sub_hs_image = $imageName;
        }
        $sub_health_speech->save();
        return back()->with('success', 'Sub Health Topic Upload Successfully');
    }

    public function edit_sub_hs($id){
        $id = $id;
        $getTopic = HealthTopic::all();
        $getData = SubHealthSpeech::where('id', $id)->first();
        return view('backend.pages.sub-hs.edit-sub-hs', compact('getData', 'getTopic', 'id'));
    }
    public function update_sub_hs(Request $request, $id){
        // dd($request);
        $request ->validate([
            'sub_hs_title'=>'required'
        ],
        [
            'sub_hs_title.required' => 'Title Must-be Required!',
        ]);
        $image = $request->file('sub_hs_image');
        if($image == null){
            $sub_health_speech = SubHealthSpeech::find($id);
            $sub_health_speech->sub_hs_title = $request->sub_hs_title;
            $sub_health_speech->sub_hs_description = $request->sub_hs_description;
            $sub_health_speech->summery_of_topics = $request->summery_of_topics;
            $sub_health_speech->save();
        }else{
            $sub_health_speech = SubHealthSpeech::find($id);
            $sub_health_speech->sub_hs_title = $request->sub_hs_title;
            $sub_health_speech->sub_hs_description = $request->sub_hs_description;
            $sub_health_speech->summery_of_topics = $request->summery_of_topics;
            $imageName = time().'.'.$image->extension();
            $image->move(\public_path('images/sub-topic-pic'), $imageName);
            $sub_health_speech->sub_hs_image = $imageName;
            $sub_health_speech->save();
        }
        return back()->with('success', 'Main Health Speech Upload Successfully');

    }
    public function delete_sub_hs($id){
        $health_topic = SubHealthSpeech::find($id);
        $image_path = public_path('images/sub-topic-pic').'/'.$health_topic->sub_hs_image;
        if($health_topic->sub_hs_image){
            unlink($image_path);
        }
        $health_topic->delete();
    }
    public function active_sub_hs(Request $request, $id){
        SubHealthSpeech::where('id',$id)->update(['status'=>0]);
        return back()->with('success', 'This Health Speech Deactive Successfully');
    }
    public function deactive_sub_hs(Request $request, $id){
        SubHealthSpeech::where('id',$id)->update(['status'=>1]);
        return back()->with('success', 'This Health Speech Active Successfully');
    }
    public function details_sub_hs($id){
        $getData = SubHealthSpeech::where('id', $id)->first();
        return view('backend.pages.sub-hs.details-sub-hs', compact('getData'));
    }
    public function section_sub_health_speech($id){
        // dd(23);
        $section = SubSubHS::where('sub_hs_topics_id', $id)->get();
        return \view('backend.pages.sub-hs.section-sub-health-speech', compact('section'));
    }

}
