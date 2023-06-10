<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Watchlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function loginUser(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        $remember = $request->remember;

        // true itu buat remember token
        if(Auth::attempt($credentials, true)){
            if($remember){
                Cookie::queue('cookie_email', $request->email, 120);
                Cookie::queue('cookie_password', $request->password, 120);
            }
            return redirect()->action([PageController::class, 'home']);
        }
        return back()->withErrors(['email' => 'Please re-check your email and password']);
    }

    public function registerUser(Request $request){
        $user = new User();

        $validation = [
            'username' => 'required | min:5',
            'email' => 'required',
            'password' => 'required | min:6 | alpha_num | confirmed',
            'password_confirmation' => 'required | min:6 | alpha_num',
        ];

        $validator = Validator::make($request->all(), $validation);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->date_joined = Carbon::now()->format("Y-m-d");

        $user->save();
        return redirect()->action([PageController::class, 'login']);
    }

    public function editUser(Request $request){
        $user = User::find($request->id);

        $validation = [
            'username' => 'required',
            'email' => 'required',
            'date_of_birth' => 'required | date_format:Y-m-d',
            'phone' => 'required | min:5 | max:13'
        ];

        $validator = Validator::make($request->all(), $validation);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $user->username = $request->username;
        $user->email = $request->email;
        $user->date_of_birth = $request->date_of_birth;
        $user->phone = $request->phone;

        $user->save();
        return redirect()->back();
    }

    public function editUserProfile(Request $request){
        $user = User::find($request->id);

        $validation = [
            'image' => 'required'
        ];

        $validator = Validator::make($request->all(), $validation);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $user->image_profile = $request->image;
        $user->save();
        return redirect()->back();
    }

    public function watchlist(){
        $data = array(
            'watchlists' => Watchlist::where('user_id', Auth::user()->id)->simplePaginate(4)
        );
        return view('watchlist', $data);
    }

    public function logout(){
        Auth::logout();
        Session::forget('');
        return redirect()->action([PageController::class, 'home']);
    }
}
