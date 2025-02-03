<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perdorues;
use App\Models\Produkt;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Transaksion;
use App\Models\DetajeTransaksioni;
use Illuminate\Support\Facades\DB;

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
    
    
    public function addToWallet(Request $request, $guid_id)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);

        // Retrieve the user
        $user = Perdorues::where('guid_id', $guid_id)->firstOrFail();

        $user->balanca += $validatedData['amount']; 
        $user->save();

        return redirect()->back()->with('success', 'Amount added to wallet successfully!');
    }
    

    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login');
    }

    public function checkout(Request $request, $guid_id)
{
    DB::beginTransaction();
    try {
        $user = Perdorues::where('guid_id', $guid_id)->first();

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found.']);
        }

        if ($user->balanca < $request->total) {
            return response()->json(['success' => false, 'message' => 'Insufficient balance.']);
        }

        // Deduct the total from user's balance
        $user->balanca -= $request->total;
        $user->save();

        // Create the transaction
        $transaction = Transaksion::create([
            'id_perdoruesi' => $guid_id,
            'totali' => $request->total,
            'data_transaksionit' => now(),
            'created_at' => now()
        ]);

        // Insert transaction details
        foreach ($request->cart as $item) {
            DetajeTransaksioni::create([
                'id_produkti' => $item['id'],
                'id_transaksioni' => $transaction->id,
                'sasia' => $item['stock'],
                'shuma' => $item['price'] * $item['stock'],
                'created_at' => now()
            ]);
        }

        DB::commit();
        return response()->json(['success' => true]);

    } catch (\Exception $e) {
        DB::rollback();
        return response()->json(['success' => false, 'message' => $e->getMessage()]);
    }
}
}
