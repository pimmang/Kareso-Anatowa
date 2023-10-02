<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gambar_Barang extends Model
{
    use HasFactory;
    public function Barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class);
    }
    protected $fillable = [
        'barang_id',
        'gambar_barang',
    ];
 
}
