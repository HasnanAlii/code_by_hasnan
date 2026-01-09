<?php

namespace Database\Seeders;

use App\Models\Keuangan;
use App\Models\Projek;
use App\Models\Pengeluaran;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class KeuanganSeeder extends Seeder
{
    public function run(): void
    {
        $projekIds = Projek::pluck('id')->toArray();
        $pengeluaranIds = Pengeluaran::pluck('id')->toArray();

        $data = [
            ['masuk', 5000000, 'Pembayaran DP Projek'],
            ['keluar', 750000, 'Biaya operasional'],
            ['masuk', 10000000, 'Pelunasan Tahap 1'],
            ['keluar', 1250000, 'Pembelian perangkat'],
            ['masuk', 8000000, 'Pembayaran jasa'],
            ['keluar', 300000, 'Transportasi'],
            ['masuk', 12000000, 'Termin proyek'],
            ['keluar', 500000, 'Konsumsi rapat'],
            ['masuk', 15000000, 'Pelunasan proyek'],
            ['keluar', 950000, 'Biaya internet'],

            ['masuk', 4000000, 'Pembayaran tambahan'],
            ['keluar', 600000, 'Biaya administrasi'],
            ['masuk', 9000000, 'Pembayaran layanan'],
            ['keluar', 2000000, 'Pembelian software'],
            ['masuk', 7000000, 'Pembayaran modul'],
            ['keluar', 450000, 'Cetak dokumen'],
            ['masuk', 11000000, 'Termin akhir'],
            ['keluar', 800000, 'Perawatan sistem'],
            ['masuk', 6500000, 'Pembayaran maintenance'],
            ['keluar', 1200000, 'Biaya pelatihan'],
        ];

        $saldo = 0;
        $startDate = Carbon::now()->subMonths(6);

        foreach ($data as $index => $item) {
            [$jenis, $jumlah, $keterangan] = $item;

            // HITUNG SALDO
            $saldo += $jenis === 'masuk' ? $jumlah : -$jumlah;

            Keuangan::create([
                'jenis'          => $jenis,
                'jumlah'         => $jumlah,
                'keterangan'     => $keterangan,
                'saldo_akhir'    => $saldo,

                'id_projek' => $jenis === 'masuk'
                    ? $projekIds[array_rand($projekIds)]
                    : null,

                'id_pengeluaran' => $jenis === 'keluar'
                    ? $pengeluaranIds[array_rand($pengeluaranIds)]
                    : null,

                // DATA LAMA (AMAN UNTUK CLEANUP TEST)
                'created_at'    => Carbon::now()->subMonths(6),
                'updated_at'    => Carbon::now()->subMonths(6),
            ]);
        }
    }
}
