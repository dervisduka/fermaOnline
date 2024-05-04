<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetajeTransaksioni extends Model
{
    use HasFactory;

    protected $table = 'detaje_transaksioni'; // Specify the table name explicitly

    protected $fillable = [ // Define the fillable attributes
        'id_produkti',
        'id_transaksioni',
        'sasia',
        'shuma',
        'updated_at',
        'created_at',
    ];

    protected $dates = ['created_at', 'updated_at']; // Define the columns that should be treated as dates

    public function produkt()
    {
        return $this->belongsTo(Produkt::class, 'id_produkti');
    }

    public function transaksion()
    {
        return $this->belongsTo(Transaksion::class, 'id_transaksioni');
    }
}
