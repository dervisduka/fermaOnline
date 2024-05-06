<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perdorues;
use App\Models\LlojProdukti;
use App\Models\Produkt;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;


class AddProductsController extends Controller
{
    public function show(string $guid_id){
        $user = Perdorues::where('guid_id', $guid_id)->firstOrFail();
        $data = [
            'guid_id' => $guid_id,
            'username' => $user->username,
            'email' => $user->email,
            'is_admin' => $user->is_admin,
            'productTypes' => LlojProdukti::all(),
        ];
        return view('addProducts', ['data' => $data]);
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login');
    }

    public function addProduct(Request $request, $guid_id)
    {
        $validatedData = $request->validate([
            'lloji_id' => 'required|exists:llojprodukti,id',
            'sasia' => 'required|integer',
            'cmimi' => 'required|numeric',
            'foto_path' => 'required|string',
            'pershkrim_produkti' => 'required|string',
            'is_active' => 'boolean',
        ]);
    
        $product = new Produkt();
        $product->lloji_id = $validatedData['lloji_id'];
        $product->sasia = $validatedData['sasia'];
        $product->cmimi = $validatedData['cmimi'];
        $product->foto_path = $validatedData['foto_path'];
        $product->pershkrim_produkti = $validatedData['pershkrim_produkti'];
        $product->is_active = $request->has('is_active');
        $product->save();
    
        return redirect()->back()->with('success', 'Product added successfully');
    }    
}
