<?php

namespace App\Http\Controllers;

use App\Models\Perdorues;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show(string $guid_id){
        $user = Perdorues::where('guid_id', $guid_id)->firstOrFail();
        $data = [
            'guid_id' => $guid_id,
            'username' => $user->username,
            'name' => $user->emer,
            'surname' => $user->mbiemer,
            'email' => $user->email,
            'phoneNumber' => $user->numer_kontakti,
            'address' => $user->adresa,
            'dob' => $user->data_e_lindjes,
            'is_admin' => $user->is_admin,
            'balanca' => $user->balanca,
        ];
        return view('profile', ['data' => $data]);
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login');
    }
    public function changePassword(Request $request){
        $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required',
            'newPasswordConfirmation' => 'required',
        ]);
    
        $data = [
            'oldPassword' => $request->oldPassword,
            'newPassword' => $request->newPassword,
            'newPasswordConfirmation' => $request->newPasswordConfirmation,
        ];
    
        $user = Auth::user();
    
        if(Hash::check($data['oldPassword'], $user->password) && $data['newPassword'] == $data['newPasswordConfirmation']) {
            Perdorues::where('guid_id', Session::get('guid_id'))->update(['password' => Hash::make($data['newPassword'])]);
            return redirect()->route('profile', ['guid_id' => Session::get('guid_id')])->with('success', 'Password changed successfully.');
        } else {
            return redirect()->route('profile', ['guid_id' => Session::get('guid_id')])->with('error', 'Password change failed. Please check your old password and try again.');
        }
    }    
}

