<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HealthSpeech;
use App\Models\Comment;
use App\Models\HealthTopic;
use App\Models\SubSubHS;
use App\Models\SubHealthSpeech;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class HealthSpeechController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // }
    public function index(){
        $allHealthSpeech = HealthSpeech::all();
        return \view('backend.pages.health-speech.all-health-speech', compact('allHealthSpeech'));
    }
    public function add_health_speech(){
        $allTopics = HealthTopic::all();
        return \view('backend.pages.health-speech.add-health-speech', compact('allTopics'));
    }
    public function store_health_speech(Request $request){
        $request ->validate([
            'hs_tipics_id'=>'required',
            'hs_title'=>'required',
            'slug'=>'required',
            'hs_description'=>'required',
        ],
        [
            'hs_tipics_id.required' => 'Topics Must-be Select!',
            'hs_title.required' => 'Title Must-be Required!',
            'hs_description.required' => 'Description Must-be Required!',
        ]);
        $user = Auth::user();
        $health_speech = new HealthSpeech([
            'hs_tipics_id'=> $request->get('hs_tipics_id'),
            'hs_title'=> $request->get('hs_title'),
            'hs_description'=> $request->get('hs_description'),
            'hs_meta_title'=> $request->get('hs_meta_title'),
            'hs_meta_tages'=> $request->get('hs_meta_tages'),
            'hs_meta_description'=> $request->get('hs_meta_description'),
        ]);
        $health_speech->hs_meta_keywords = $request->hs_meta_keywords;
        $image = $request->file('hs_image');
        if($image !== null){
            $imageName = time().'.'.$image->extension();
            $image->move(\public_path('images/main-topic-pic'), $imageName);
            $health_speech->hs_image = $imageName;
        }
        // $health_speech->slug = Str::slug($request->get('hs_title'), '-').'-'.Str::random(3);
        $health_speech->slug = Str::slug($request->get('slug'), '-');
        $health_speech->added_by = 1;
        $health_speech->save();
        return back()->with('success', 'Main Health Topic Insert Successfully');
    }

    public function edit_health_speech($id){
        $getTopic = HealthTopic::all();
        $getData = HealthSpeech::where('id', $id)->first();
        return view('backend.pages.health-speech.edit-health-speech', compact('getData', 'getTopic'));
    }
    public function update_health_speech(Request $request, $id){
        $request ->validate([
            'hs_tipics_id'=>'required',
            'hs_title'=>'required',
            'hs_description'=>'required'
        ],
        [
            'hs_tipics_id.required' => 'Topics Must-be Select!',
            'hs_title.required' => 'Title Must-be Required!',
            'hs_description.required' => 'Description Must-be Required!'
        ]);
        $health_speech = HealthSpeech::find($id);
        $health_speech->hs_tipics_id = $request->hs_tipics_id;
        $health_speech->hs_title = $request->hs_title;
        $health_speech->hs_description = $request->hs_description;
        $health_speech->hs_meta_title = $request->hs_meta_title;
        $health_speech->hs_meta_tages = $request->hs_meta_tages;
        $health_speech->hs_meta_description = $request->hs_meta_description;
        $health_speech->hs_meta_keywords = $request->hs_meta_keywords;
        $image = $request->file('hs_image');
        if($image != null){
            $image_path = public_path('images/main-topic-pic').'/'.$health_speech->hs_image;
            $imageName = time().'.'.$image->extension();
            $image->move(\public_path('images/main-topic-pic'), $imageName);
            $health_speech->hs_image = $imageName;
        }
        // $health_speech->slug = Str::slug($request->get('hs_title'), '-').'-'.Str::random(3);
        $health_speech->slug = Str::slug($request->get('slug'), '-');
        $health_speech->save();
        return back()->with('success', 'Main Health Speech Upload Successfully');
    }
    public function delete_health_speech($id){
        $health_topic = HealthSpeech::find($id);
        $image_path = public_path('images/main-topic-pic').'/'.$health_topic->hs_image;
        if($health_topic->hs_image){
          unlink($image_path);  
        }
        $health_topic->delete();
        return back()->with('success', 'Health Speech Delete Successfull!');
    }
    public function active_health_speech(Request $request, $id){
        HealthSpeech::where('id',$id)->update(['status'=>0]);
        return back()->with('success', 'This Health Speech Deactive Successfully');
    }
    public function deactive_health_speech(Request $request, $id){
        HealthSpeech::where('id',$id)->update(['status'=>1]);
        return back()->with('success', 'This Health Speech Active Successfully');
    }
    public function details_health_speech($id){
        $details = HealthSpeech::find($id);
        $subDetails = SubHealthSpeech::where('hs_tipics_id', $id)->get();
        $subSubDetails = SubSubHS::all();
        return \view('backend.pages.health-speech.details-health-speech', compact('details', 'subDetails', 'subSubDetails'));
    }
    public function section_health_speech($id){
        $section = SubHealthSpeech::where('hs_tipics_id', $id)->get();
        return \view('backend.pages.health-speech.section-health-speech', compact('section'));
    }
}
