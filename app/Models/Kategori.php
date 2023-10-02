<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Kategori extends Model
{
    use HasFactory;
    public function Barang(): BelongsToMany
    {
        return $this->belongsToMany(Barang::class, 'barang_kategoris', 'kategori_id', 'barang_id');
    }
    protected $fillable = [
        'nama_kategori',
    ];
}
