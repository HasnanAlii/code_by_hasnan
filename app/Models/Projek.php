<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projek extends Model
{
    use HasFactory;

    protected $table = 'projeks';

    protected $fillable = [
        'nama',
        'jenis',
        'harga',
        'nama_customer',
        'deadline',
        'status',
    ];

    protected $casts = [
        'deadline' => 'date',
        'harga' => 'decimal:2',
    ];

    /**
     * Relasi ke tabel keuangan
     * 1 Projek memiliki banyak data keuangan
     */
    public function keuangans()
    {
        return $this->hasMany(Keuangan::class, 'id_projek');
    }
}
