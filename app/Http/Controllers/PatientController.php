<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Question;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class PatientController extends Controller
{
    public function index(){
        $userID = Auth::user();
        // dd($userID);
        $education = ['Phd Degree', 'Masters', 'Honours', 'Intermediate'];
        $occupation = ['Doctor', 'Profesor', 'Engineer', 'Master', 'Businesman', 'Student', 'Others'];
        return view('frontend.pages.users.profile', compact('userID', 'occupation', 'education'));
    }
    public function my_account(){
        $userID = Auth::user();
        return view('frontend.pages.users.my-account', compact('userID'));
    }

    public function user_picture(Request $request){
        $userID = Auth::user();
        $image = $request->file('userPicture');
        $image_path = $userID->userPicture;
        if($image_path == null){
            $imageName = time().'.'.$image->extension();
            $image->move(\public_path('images/userPicture'), $imageName);
            $userID->userPicture = $imageName;
            $userID->save();
            return back();
        }else{
            $image_path = public_path('images/userPicture').'/'.$userID->userPicture;
            unlink($image_path);
            $imageName = time().'.'.$image->extension();
            $image->move(\public_path('images/userPicture'), $imageName);
            $userID->userPicture = $imageName;
            $userID->save();
            return back();
        }
    }
    public function user_about(Request $request){
        
        $occupation = ['Doctor', 'Profesor', 'Engineer', 'Master', 'Businesman', 'Student', 'Others'];
        $education = ['Phd Degree', 'Masters', 'Honours', 'Intermediate'];
        $userID = Auth::user();
        // dd($userID);
        return view('frontend.pages.users.aboutForm' , compact('userID', 'occupation', 'education'));
    }
    public function user_about_store(Request $request){
        $id = Auth::user()->id;
            $userID =User::find($id);
            $userID->country = $request->country;
            $userID->city = $request->city;
            $userID->birthday = $request->birthday;
            $userID->gender = $request->gender;
            $userID->hightsEduction = $request->hightsEduction;
            $userID->occupation = $request->occupation;
            $userID->phone = $request->phone;
            $userID->address = $request->address;
            $userID->aboutme = $request->aboutme;
            $userID->save();
            return back();
    }

    public function change_name_password(Request $request){
        $id = Auth::user()->id;
        $userID = User::find($id);
        $userID->name = $request->userName;
        $userID->password = Hash::make($request['password']);
        $userID->save();
        return back();
    }
    public function user_bio(Request $request){
        $request->validate([
            'bio'=>'required|max:100'
        ],
        [
            'bio.required' => 'Not Empty for submit!',
            'bio.max' => 'Bio 100 Characters Limited!'
        ]);
        $id = Auth::user()->id;
        $userID =User::find($id);
        $userID->bio = $request->bio;
        $userID->save();
        return back();
    }
    
    public function user_profile_view(Request $request, $id){
        $userID = User::find($id);
        return view('frontend.pages.users.user-profile-view', compact('userID'));
    }
    
    public function my_question(){
        $user_id = Auth::user()->id;
        $my_question = Question::where('user_id', $user_id)->get();
        return view('frontend.pages.users.my-question', compact('my_question'));
    }
    public function user_list(){
        return back();
    }
}
