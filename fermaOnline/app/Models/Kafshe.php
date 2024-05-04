<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kafshe extends Model
{
    use HasFactory;

    protected $table = 'kafshe'; // Specify the table name explicitly

    protected $fillable = [ // Define the fillable attributes
        'emer_shkencor',
        'lloji',
        'rraca',
        'foto_path',
        'pershkrim_kafshe',
        'updated_at',
        'created_at',
    ];

    protected $dates = ['created_at', 'updated_at']; // Define the columns that should be treated as dates
}
