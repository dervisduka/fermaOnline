<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perdorues;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class MainPageController extends Controller
{
    public function show(string $guid_id){
        $user = Perdorues::where('guid_id', $guid_id)->firstOrFail();
        $data = [
            'guid_id' => $guid_id,
            'username' => $user->username,
            'name' => $user->emer,
            'surname' => $user->mbiemer,
            'email' => $user->email,
            'address' => $user->adresa,
            'phoneNumber' => $user->numer_kontakti,
            'dob' => $user->data_e_lindjes,
            'is_admin' => $user->is_admin,
        ];
        return view('mainPage', ['data' => $data]);
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login');
    }
}
