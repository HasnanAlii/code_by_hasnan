<?php

namespace Database\Seeders;

use App\Models\Pengeluaran;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PengeluaranSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['keterangan' => 'Pembelian ATK', 'jumlah' => 500000],
            ['keterangan' => 'Hosting & Domain', 'jumlah' => 1200000],
            ['keterangan' => 'Transportasi Operasional', 'jumlah' => 300000],
            ['keterangan' => 'Listrik Kantor', 'jumlah' => 750000],
            ['keterangan' => 'Air & Kebersihan', 'jumlah' => 250000],
            ['keterangan' => 'Internet Bulanan', 'jumlah' => 650000],
            ['keterangan' => 'Pemeliharaan Komputer', 'jumlah' => 900000],
            ['keterangan' => 'Pembelian Printer', 'jumlah' => 2500000],
            ['keterangan' => 'Bensin Operasional', 'jumlah' => 400000],
            ['keterangan' => 'Konsumsi Rapat', 'jumlah' => 350000],

            ['keterangan' => 'Biaya Fotokopi', 'jumlah' => 200000],
            ['keterangan' => 'Biaya Cetak Laporan', 'jumlah' => 450000],
            ['keterangan' => 'Perbaikan AC', 'jumlah' => 1800000],
            ['keterangan' => 'Biaya Keamanan', 'jumlah' => 600000],
            ['keterangan' => 'Pembelian Software', 'jumlah' => 3200000],
            ['keterangan' => 'Pelatihan Staf', 'jumlah' => 1500000],
            ['keterangan' => 'Biaya Administrasi', 'jumlah' => 275000],
            ['keterangan' => 'Perawatan Gedung', 'jumlah' => 2100000],
            ['keterangan' => 'Biaya Lembur Pegawai', 'jumlah' => 850000],
            ['keterangan' => 'Biaya Konsumsi Acara', 'jumlah' => 1250000],
        ];

        $startDate = Carbon::now()->subMonths(6);

        foreach ($data as $index => $item) {
            Pengeluaran::create([
                'keterangan' => $item['keterangan'],
                'jumlah'     => $item['jumlah'],
                'created_at'    => Carbon::now()->subMonths(6),
                'updated_at'    => Carbon::now()->subMonths(6),
            ]);
        }
    }
}
