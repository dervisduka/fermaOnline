<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;

class LoginController extends Controller
{
    public function show(){
        return view('login');
    }

    public function loginPost(Request $request){
        $validator = Validator::make($request->all(),[
            'username' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()) return redirect()->route('login')->with('required', 'Te gjitha fushat jane te detyrueshme');

        $credentials = $request->only('username', 'password');
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            session(['guid_id' => $user->guid_id]);
            return redirect()->intended(route('mainPage', ['guid_id' => Session::get('guid_id')]));
        }else {
            return redirect()->route('login')->with('wrong_credentials', 'Username ose fjalekalim te pasakte');
        }
    }
}
