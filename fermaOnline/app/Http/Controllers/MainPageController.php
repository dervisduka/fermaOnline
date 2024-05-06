<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perdorues;
use App\Models\Produkt;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class MainPageController extends Controller
{
    public function show(string $guid_id){
        $user = Perdorues::where('guid_id', $guid_id)->firstOrFail();
        $produkt = Produkt::all();
        $data = [
            'guid_id' => $guid_id,
            'username' => $user->username,
            'email' => $user->email,
            'is_admin' => $user->is_admin,
            'produkte' => $produkt,
        ];
        return view('mainPage', ['data' => $data]);
    }

    public function updateProduct(Request $request, $guid_id, $product_id)
    {
        $validatedData = $request->validate([
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'is_active' => 'boolean', 
        ]);
    

        $product = Produkt::findOrFail($product_id);
    

        $product->sasia = $validatedData['stock'];
        $product->cmimi = $validatedData['price'];
        $product->is_active = $request->has('is_active');
        $product->save();
    
        return redirect()->back()->with('success', 'Product updated successfully');
    }
    
    
    

    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login');
    }
}
