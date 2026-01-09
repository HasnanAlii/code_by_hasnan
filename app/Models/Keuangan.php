<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    use HasFactory;

    protected $table = 'keuangans';

    protected $fillable = [
        'jenis',
        'jumlah',
        'keterangan',
        'id_pengeluaran',
        'id_projek',
        'saldo_akhir',
    ];

    protected $casts = [
        'jumlah' => 'decimal:2',
    ];

    /**
     * Relasi ke tabel projek
     * Keuangan milik satu projek
     */
    public function projek()
    {
        return $this->belongsTo(Projek::class, 'id_projek');
    }

    /**
     * Relasi ke tabel pengeluaran
     * Keuangan milik satu pengeluaran
     */
    public function pengeluaran()
    {
        return $this->belongsTo(Pengeluaran::class, 'id_pengeluaran');
    }
}
