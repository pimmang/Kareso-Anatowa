<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Barang extends Model
{
    use HasFactory;

    public function detail_pesanan(): HasMany
    {
        return $this->hasMany(detail_pesanan::class);
    }
    
    public function Gambar_Barang(): HasMany
    {
        return $this->hasMany(Gambar_Barang::class);
    }
    public function Kategori(): BelongsToMany
    {
        return $this->belongsToMany(Kategori::class, 'barang_kategoris', 'barang_id', 'kategori_id');
    }
    
    protected $fillable = [
        'nama_barang',
        'harga',
        'stok',
        'deskripsi',
        'merk',
        'berat',
    ];
}
