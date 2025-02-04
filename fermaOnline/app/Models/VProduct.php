<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VProduct extends Model
{
    protected $table = 'v_product';  // Specify the view name
    
    // Set the primary key if different from 'id'
    protected $primaryKey = 'id';  

    // Disable timestamps if the view doesn't have `created_at` and `updated_at`
    public $timestamps = false;

    // Add the columns if you want to make them fillable
    protected $fillable = [
        'lloji_id', 'sasia', 'cmimi', 'foto_path', 'pershkrim_produkti', 'is_active', 'lloji'
    ];
}
