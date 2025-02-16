<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perdorues;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\UserTransactionDetail;

class TransactionController extends Controller
{
    public function show(string $guid_id)
    {
        $user = Perdorues::where('guid_id', $guid_id)->firstOrFail();
    
        if (!$user->is_admin) {
            $records = UserTransactionDetail::where('guid_id', $guid_id)->orderBy('created_at', 'desc')->get();
        } else {
            $records = UserTransactionDetail::orderBy('created_at', 'desc')->get();
        }
    
        $groupedTransactions = $records->groupBy('id')->map(function ($transactionGroup) {
            $totalAmount = $transactionGroup->sum('shuma');
            $createdAt = $transactionGroup->first()->created_at; 
            return [
                'total' => $totalAmount,
                'created_at' => $createdAt,
                'transactions' => $transactionGroup,
            ];
        });
    
        $data = [
            'guid_id' => $guid_id,
            'username' => $user->username,
            'email' => $user->email,
            'is_admin' => $user->is_admin,
            'transactions' => $groupedTransactions,
        ];
    
        return view('transaction', ['data' => $data]);
    }
    
    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login');
    }
}
