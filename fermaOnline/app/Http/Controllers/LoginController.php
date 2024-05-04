<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function show(){
        return view('login');
    }

    public function loginPost(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            session(['guid_id' => $user->guid_id]);
            return redirect()->intended(route('mainPage', ['guid_id' => Session::get('guid_id')]));
        }else {
            return redirect()->route('login');
        }
    }
}
