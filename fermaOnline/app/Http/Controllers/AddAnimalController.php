<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perdorues;
use App\Models\Kafshe;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;


class AddAnimalController extends Controller
{
    public function show(string $guid_id){
        $user = Perdorues::where('guid_id', $guid_id)->firstOrFail();
        $kafshe = Kafshe::all();
        $data = [
            'guid_id' => $guid_id,
            'username' => $user->username,
            'email' => $user->email,
            'is_admin' => $user->is_admin,
        ];
        return view('addAnimal', ['data' => $data]);
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login');
    }
}
