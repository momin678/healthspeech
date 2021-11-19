<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\HealthSpeech;
use App\Models\SubHealthSpeech;
use App\Models\SubSubHS;
class FrontendController extends Controller
{
    public function index(Request $request){
        $socialShare = \Share::page(
            'https://www.nicesnippets.com/blog/laravel-custom-foreign-key-name-example',
            'Laravel Custom Foreign Key Name Example',
        )
        ->facebook()
        ->twitter()
        ->reddit()
        ->linkedin()
        ->whatsapp()
        ->telegram();
        $allHealthSpeech = HealthSpeech::orderBy('id', 'DESC')->paginate(10);
    //     $data ='';
    //   if ($request->ajax()) {
    //       return view('frontend.pages.load_more_data', compact('allHealthSpeech'));
    //   }
        return view('frontend.pages.home', compact('allHealthSpeech', 'socialShare'));
    }
    public function feedbackInsert(Request $request){
        DB::table('feedback')->insert([
            'post_id' => $request->post_id, //This Code coming from ajax request
            'feedback' => $request->feedback, //This Chief coming from ajax request
        ]);
        return ['success'=>true, 'message'=>'data insert successfull!'];
    }
}
