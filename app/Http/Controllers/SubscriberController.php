<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;
class SubscriberController extends Controller
{
    
    public function new_subscriber(Request $request){
        $new_sub = new Subscriber;
        $new_sub->subc_email = $request->subc_email;
        $new_sub->save();
        return back();
    }
    public function all_subscribe(Request $request){
        $all_subc = Subscriber::all();
        return view('backend.pages.subscriber_list', compact('all_subc'));
    }
}
