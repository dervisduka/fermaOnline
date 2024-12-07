<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perdorues;
use App\Models\Kafshe;
use Auth;

class AddAnimalController extends Controller
{
    public function show(string $guid_id){
        $user = Perdorues::where('guid_id', $guid_id)->firstOrFail();
        $data = [
            'guid_id' => $guid_id,
            'username' => $user->username,
            'email' => $user->email,
            'is_admin' => $user->is_admin,
        ];
        return view('addAnimal', ['data' => $data]);
    }
    
    public function store(Request $request, string $guid_id)
    {
        $request->validate([
            'emer_shkencor' => 'required|string|max:60',
            'lloji' => 'required|string|max:40',
            'rraca' => 'required|string|max:40',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pershkrim_kafshe' => 'nullable|string|max:65535',
        ]);
    
        // Handle file upload
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName); // Store the image in the public/images directory
            $photoPath = 'images/' . $imageName;
        }
    
        $animal = new Kafshe();
        $animal->emer_shkencor = $request->input('emer_shkencor');
        $animal->lloji = $request->input('lloji');
        $animal->rraca = $request->input('rraca');
        $animal->foto_path = $photoPath; // Save the file path
        $animal->pershkrim_kafshe = $request->input('pershkrim_kafshe');
        $animal->save();
    
        return redirect()->route('animal', ['guid_id' => $guid_id])->with('success', 'Animal added successfully');
    }
    
    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login');
    }
    
}
