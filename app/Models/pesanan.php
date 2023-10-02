<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pesanan extends Model
{
    use HasFactory;
    public function detail_pesanan(): HasMany
    {
        return $this->hasMany(detail_pesanan::class);
    }

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function Pembayaran(): HasOne
    {
        return $this->hasOne(Pembayaran::class);
    }

}