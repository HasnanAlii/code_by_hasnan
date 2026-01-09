<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $table = 'pengeluarans';

    protected $fillable = [
        'keterangan',
        'jumlah',
    ];

    protected $casts = [
        'jumlah' => 'decimal:2',
    ];

    /**
     * Relasi ke tabel keuangan
     * 1 Pengeluaran bisa dipakai di banyak data keuangan
     */
    public function keuangans()
    {
        return $this->hasMany(Keuangan::class, 'id_pengeluaran');
    }
}
