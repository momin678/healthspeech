<?php

namespace App\Http\Controllers;
use App\Models\HealthTopic;
use App\Models\SubHealthSpeech;
use App\Models\SubSubHS;

use Illuminate\Http\Request;

class SubSubHSController extends Controller
{
    public function index(){
        $allSubSubHSController = SubSubHS::all();
        return \view('backend.pages.sub-sub-hs.all-sub-hs', compact('allSubSubHSController'));
    }
    public function add_sub_sub_hs(Request $request, $id){
        $id = $id;
        return \view('backend.pages.sub-sub-hs.add-sub-sub-hs', compact('id'));
    }
    public function store_sub_sub_hs(Request $request){
        $request ->validate([
            'sub_sub_hs_title'=>'required'
        ],
        [
            'sub_sub_hs_title.required' => 'Title Must-be Required!',
        ]);
        $sub_sub_health_speech = new SubSubHS;
        $sub_sub_health_speech->sub_hs_topics_id = $request->topicID;
        $sub_sub_health_speech->sub_sub_hs_title = $request->sub_sub_hs_title;
        $sub_sub_health_speech->sub_sub_hs_description = $request->sub_sub_hs_description;

        $image = $request->file('sub_sub_hs_image');
        if($image !== null){
        $imageName = time().'.'.$image->extension();
        $image->move(\public_path('images/sub-sub-topic-pic'), $imageName);
        $sub_sub_health_speech->sub_sub_hs_image = $imageName;
        }
        $sub_sub_health_speech->save();
        return back()->with('success', 'Sub Health Topic Insert Successfully');
    }

    public function edit_sub_sub_hs($id){
        $id = $id;
        $getTopic = HealthTopic::all();
        $getData = SubSubHS::where('id', $id)->first();
        return view('backend.pages.sub-sub-hs.edit-sub-sub-hs', compact('getData', 'getTopic', 'id'));
    }
    public function update_sub_sub_hs(Request $request, $id){
         $request ->validate([
            'sub_sub_hs_title'=>'required'
        ],
        [
            'sub_sub_hs_title.required' => 'Title Must-be Required!',
        ]);
        $sub_sub_health_speech = SubSubHS::find($id);
        $image = $request->file('sub_sub_hs_image');
        if($image == null){
            $sub_sub_health_speech->sub_sub_hs_title = $request->sub_sub_hs_title;
            $sub_sub_health_speech->sub_sub_hs_description = $request->sub_sub_hs_description;
            $sub_sub_health_speech->save();
        }else{
            $sub_sub_health_speech->sub_sub_hs_title = $request->sub_sub_hs_title;
            $sub_sub_health_speech->sub_sub_hs_description = $request->sub_sub_hs_description;
            $imageName = time().'.'.$image->extension();
            $image->move(\public_path('images/sub-sub-topic-pic'), $imageName);
            $sub_sub_health_speech->sub_sub_hs_image = $imageName;
            $sub_sub_health_speech->save();
        }
        return back()->with('success', 'Sub-sub Health Speech Upload Successfully');

    }
    public function delete_sub_sub_hs($id){
        $health_topic = SubSubHS::find($id);
        $image_path = public_path('images/sub-sub-topic-pic').'/'.$health_topic->sub_sub_hs_image;
        if($health_topic->sub_sub_hs_image){
            unlink($image_path);
        }
        $health_topic->delete();
        return back()->with('success', 'Health Speech Delete Successfull!');
    }
    public function active_sub_sub_hs(Request $request, $id){
        SubSubHS::where('id',$id)->update(['status'=>0]);
        return back()->with('success', 'This Health Speech Deactive Successfully');
    }
    public function deactive_sub_sub_hs(Request $request, $id){
        SubSubHS::where('id',$id)->update(['status'=>1]);
        return back()->with('success', 'This Health Speech Active Successfully');
    }
    public function details_sub_sub_hs($id){
        $getData = SubSubHS::where('id', $id)->first();
        return view('backend.pages.sub-sub-hs.details-sub-hs', compact('getData'));
    }
    public function section_sub_health_speech($id){
        $section = SubSubHS::where('sub_hs_topics_id', $id)->get();
        return \view('backend.pages.sub-sub-hs.section-sub-sub-hs', compact('section'));
    }

}
