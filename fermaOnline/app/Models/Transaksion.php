<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksion extends Model
{
    use HasFactory;

    protected $table = 'transaksion'; // Specify the table name explicitly

    protected $fillable = [ // Define the fillable attributes
        'id_perdoruesi',
        'totali',
        'data_transaksionit',
        'updated_at',
        'created_at',
    ];

    protected $dates = ['created_at', 'updated_at', 'data_transaksionit']; // Define the columns that should be treated as dates

    public function perdorues()
    {
        return $this->belongsTo(Perdorues::class, 'id_perdoruesi', 'guid_id');
    }
}
