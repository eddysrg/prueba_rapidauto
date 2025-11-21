<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address'];

    // Relación 1 a M (Un lote tiene muchos vendedores)
    public function sellers() {
        return $this->hasMany(Seller::class);
    }
}
