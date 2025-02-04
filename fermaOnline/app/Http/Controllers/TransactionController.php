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
    
        // Fetch records based on whether the user is an admin or not
        if (!$user->is_admin) {
            $records = UserTransactionDetail::where('guid_id', $guid_id)->orderBy('created_at', 'desc')->get();
        } else {
            $records = UserTransactionDetail::orderBy('created_at', 'desc')->get();
        }
    
        // Group transactions by 'guid_id'
        $groupedTransactions = $records->groupBy('id')->map(function ($transactionGroup) {
            // Get the total amount for each group and the first transaction's created_at date
            $totalAmount = $transactionGroup->sum('shuma');
            $createdAt = $transactionGroup->first()->created_at; // Assuming created_at is the same for all in the group
    
            // Return a grouped result with the sum and creation date, without the 'guid_id'
            return [
                'total' => $totalAmount,
                'created_at' => $createdAt,
                'transactions' => $transactionGroup, // Child transactions under the group
            ];
        });
    
        // Return the data to the view
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
