<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $fillable = [
        'external_id', 
        'name', 
        'username', 
        'email', 
        'address',
        'phone',
        'website',
        'company',
        'lot_id'
    ];

    protected $casts = [
        'address' => 'array',
        'company' => 'array',
    ];

    // Relación (Un vendedor pertenece a un Lote)
    public function lot() {
        return $this->belongsTo(Lot::class);
    }
}
