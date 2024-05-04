<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LlojProdukti extends Model
{
    use HasFactory;

    protected $table = 'llojprodukti'; // Specify the table name explicitly

    protected $fillable = [ // Define the fillable attributes
        'id_kafshe',
        'lloji_produktit',
        'updated_at',
        'created_at',
    ];

    protected $dates = ['created_at', 'updated_at']; // Define the columns that should be treated as dates

    public function kafshe()
    {
        return $this->belongsTo(Kafshe::class, 'id_kafshe');
    }
}
