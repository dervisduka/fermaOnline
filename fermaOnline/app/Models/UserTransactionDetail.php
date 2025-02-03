<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTransactionDetail extends Model
{
    // The name of the view or table
    protected $table = 'user_transaction_details';

    // Since it's a view, we want to prevent Laravel from trying to insert or update rows
    public $incrementing = false;
    protected $primaryKey = null;

    // Define the columns that are accessible (if needed)
    protected $fillable = ['guid_id', 'totali', 'sasia', 'shuma', 'foto_path','id','created_at'];

    // Disable timestamps as views don't have timestamps
    public $timestamps = false;
}
