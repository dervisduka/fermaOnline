<?php

namespace App\Http\Controllers;

use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\Perdorues;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:perdorues',
            'email' => 'required|email|unique:perdorues',
            'password' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'dob' => 'required',
        ]);

        $isEmpty = false;
        foreach ($request->all() as $key => $value) {
            if (empty($value)) {
                $isEmpty = true;
                break;
            }
        }

        if($validator->fails()){
            if($isEmpty) $validator->errors()->add('required', 'All fiends are required');
            return redirect()->route('signup')->withErrors($validator)->withInput();
        }

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

        // Mail::to($request->email)->send(new WelcomeEmail());
        
        return redirect()->route('login')->with('success', 'Account created successfully');
    }
}
