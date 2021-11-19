<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function redirectTo(){
        if(Auth()->user()->user_type == 'admin'){
            return redirect()->route('admin.home');
        }elseif(Auth()->user()->user_type == 'user'){
            return redirect()->route('user.dashboard');
        }
    }
    public function login(Request $request){
        $input = $request->all();
        $this->validate($request,[
            'email' => 'required|email',
            'password' =>'required'
        ]);
        if(auth()->attempt(array('email'=>$request['email'], 'password'=>$request['password'])) ){
            if(Auth()->user()->user_type == "admin"){
            // dd('I am admin');
                return redirect()->route('admin.deshbord');
            }elseif(Auth()->user()->user_type == "user"){
            // dd('I am user');
                return redirect()->route('user.my-profile');
            }
        }else{
            return redirect()->route('login')->with('error', 'Invalid Email or Password');
        }
    }
}
