<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follower;
class FollowerController extends Controller
{
    public function follower_create(Request $request){
        $follower =Follower::create([
            'follow_user_id' => $request['follow_user_id'],
            'my_user_id' => $request['my_user_id'],
        ]);
        // dd($follower);
        $follower->save();
        return back();
    }
}
