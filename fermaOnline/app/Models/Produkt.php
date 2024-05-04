<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produkt extends Model
{
    use HasFactory;

    protected $table = 'produkt'; // Specify the table name explicitly

    protected $fillable = [ // Define the fillable attributes
        'lloji_id',
        'sasia',
        'cmimi',
        'foto_path',
        'pershkrim_produkti',
        'updated_at',
        'created_at',
        'is_active',
    ];

    protected $dates = ['created_at', 'updated_at']; // Define the columns that should be treated as dates

    public function llojProdukti()
    {
        return $this->belongsTo(LlojProdukti::class, 'lloji_id');
    }
}
