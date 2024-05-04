<?php

namespace App\Http\Controllers;

use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\Perdorues;
use App\Mail\WelcomeEmail;

class SignUpController extends Controller
{
    public function show(){
        return view('signup');
    }

    public function generateGUID(){
        while(true){
            $guid = Str::uuid();
            if(Perdorues::where('guid_id', $guid)->count() == 0) return $guid->toString();
        }
    }

    public function signupPost(Request $request){
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:perdorues',
            'password' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'dob' => 'required',
        ]);
        
        $data['guid_id'] = $this->generateGUID();
        $data['username'] = $request->username;
        $data['password'] = Hash::make($request->password);
        $data['emer'] = $request->name;
        $data['mbiemer'] = $request->surname;
        $data['email'] = $request->email;
        $data['is_admin'] = false;
        $data['numer_kontakti'] = $request->phone;
        $data['balanca'] = 0;
        $data['adresa'] = $request->address;
        $data['data_e_lindjes'] = $request->dob;

        $user = Perdorues::create($data);
        if(!$user){
            return redirect()->route('signup');
        }
        else {
            // Mail::to($request->email)->send(new WelcomeEmail());
        }
        return redirect()->route('login');
    }
}
