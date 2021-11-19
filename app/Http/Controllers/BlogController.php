<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\HealthSpeech;
use App\Models\SubHealthSpeech;
use App\Models\SubSubHS;
use App\Models\HealthTopic;
use App\Models\Comment;
use App\Models\User;

class BlogController extends Controller
{

    public function blog_details($slug){
        $details = HealthSpeech::where("slug", $slug)->first();
        if($details){
            $add_by = Admin::where('id', $details->added_by)->first();
            $allComments = Comment::where('postID', $details->id)->get();
            $subDetails = SubHealthSpeech::where('hs_tipics_id', $details->id)->get();
            $subSubDetails = SubSubHS::all();
            $health_topic = HealthTopic::where('id', $details->hs_tipics_id)->first();
            $blogList = HealthSpeech::where('hs_tipics_id', $details->hs_tipics_id)->whereNotIn('id', [$details->id])->get();
            return view('frontend.pages.blog-details',  compact('details', 'subDetails', 'subSubDetails', 'allComments', 'health_topic', 'add_by', 'blogList'));
        }
        abort(404);
    }
}
