<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perdorues;
use App\Models\LlojProdukti;
use App\Models\Produkt;
use App\Models\Kafshe;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AddProductsController extends Controller
{
    public function show(string $guid_id){
        $user = Perdorues::where('guid_id', $guid_id)->firstOrFail();
        $data = [
            'guid_id' => $guid_id,
            'username' => $user->username,
            'email' => $user->email,
            'is_admin' => $user->is_admin,
            'kafshet' => Kafshe::all(),
        ];
        return view('addProducts', ['data' => $data]);
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login');
    }

    public function addProduct(Request $request, $guid_id)
    {
        try {
            $validatedData = $request->validate([
                'lloji_id' => 'required|exists:llojprodukti,id',
                'sasia' => 'required|integer',
                'cmimi' => 'required|numeric',
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'pershkrim_produkti' => 'required|string',
                'is_active' => 'boolean',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors(['error' => 'Të gjitha fushat janë të detyrueshme!'])->withInput();
        }

           // Handle file upload
          if ($request->hasFile('foto')) {
              $image = $request->file('foto');
              $imageName = time() . '.' . $image->getClientOriginalExtension();
              $image->move(public_path('images'), $imageName); // Store the image in the public/images directory
             $photoPath = 'images/' . $imageName;
          }

        $product = Produkt::create([
            'lloji_id' => $validatedData['lloji_id'],
            'sasia' => $validatedData['sasia'],
            'cmimi' => $validatedData['cmimi'],
            'foto_path' => $photoPath,
            'pershkrim_produkti' => $validatedData['pershkrim_produkti'],
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('mainPage', ['guid_id' => $guid_id])->with('success', 'Product added successfully');

    }

    public function getProductTypes($kafsheId)
    {
        $productTypes = LlojProdukti::where('id_kafshe', $kafsheId)->get();
        return response()->json($productTypes);
    }
}
