<?php

namespace Database\Seeders;

use App\Models\Projek;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ProjekSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // ====== AKAN TERHAPUS (selesai & > 5 bulan) ======
            ['Website Sekolah', 'IT', 15000000, 'SMA Pasundan', -7, 'selesai'],
            ['Aplikasi Keuangan', 'Aplikasi', 25000000, 'Yayasan Pendidikan', -8, 'selesai'],
            ['Website Profil Yayasan', 'Web', 10000000, 'Yayasan Harapan', -6, 'selesai'],
            ['Landing Page Sekolah', 'Web', 6000000, 'TK Ceria', -9, 'selesai'],
            ['Website Donasi', 'Web', 11000000, 'Yayasan Sosial', -10, 'selesai'],

            // ====== TIDAK TERHAPUS (selesai tapi masih baru) ======
            ['Website Event Sekolah', 'Web', 7000000, 'SMA Kreatif', -2, 'selesai'],
            ['Aplikasi Try Out', 'Aplikasi', 17000000, 'Bimbel Cerdas', -3, 'selesai'],

            // ====== TIDAK TERHAPUS (masih proses) ======
            ['Sistem Absensi', 'Aplikasi', 12000000, 'SMP Negeri 1', 2, 'proses'],
            ['Portal Alumni', 'Web', 8000000, 'SMK Informatika', 3, 'proses'],
            ['E-Learning Sekolah', 'Aplikasi', 30000000, 'SMA Negeri 2', 4, 'proses'],
            ['Sistem Perpustakaan', 'Aplikasi', 18000000, 'SMP Plus', 1, 'proses'],
            ['Aplikasi Inventaris', 'Aplikasi', 20000000, 'SMK Teknik', 2, 'proses'],
            ['Sistem SPP Online', 'Aplikasi', 35000000, 'SMA Islam', 5, 'proses'],
            ['Website Akademik', 'IT', 22000000, 'Universitas Swasta', 4, 'proses'],
            ['Aplikasi Payroll', 'Aplikasi', 28000000, 'Yayasan Sejahtera', 4, 'proses'],
            ['Sistem PPDB Online', 'Aplikasi', 40000000, 'SMA Favorit', 6, 'proses'],
            ['Aplikasi Monitoring', 'IT', 26000000, 'Dinas Pendidikan', 5, 'proses'],
            ['Sistem Arsip Digital', 'Aplikasi', 16000000, 'SMK Arsip', 2, 'proses'],
        ];

        foreach ($data as $item) {
            Projek::create([
                'nama'          => $item[0],
                'jenis'         => $item[1],
                'harga'         => $item[2],
                'nama_customer' => $item[3],
                'deadline'      => Carbon::now()->addMonths(abs($item[4])),
                'status'        => $item[5],
                'created_at'    => Carbon::now()->subMonths(6),
                'updated_at'    => Carbon::now()->subMonths(6),
            ]);
        }
    }
}
