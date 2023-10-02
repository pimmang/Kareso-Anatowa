<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Pembayaran extends Model
{
    use HasFactory;
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function Pesanan(): BelongsTo
    {
        return $this->belongsTo(Pesanan::class);
    }
    protected $fillable = [
        'status',
    ];
}
