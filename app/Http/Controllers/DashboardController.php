<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Keuangan;
use App\Models\Pengeluaran;
use App\Models\Projek;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{       

public function index(Request $request)
{
    $selectedMonth = $request->month ?? now()->month;
    $selectedYear  = $request->year ?? now()->year;

    $months = collect(range(1, 12))->mapWithKeys(fn ($m) => [
        $m => Carbon::create()->month($m)->translatedFormat('F')
    ]);

    $years = range(now()->year - 5, now()->year + 1);

    $keuanganBulanan = Keuangan::whereMonth('created_at', $selectedMonth)
        ->whereYear('created_at', $selectedYear);

    $totalMasuk  = (clone $keuanganBulanan)->where('jenis', 'masuk')->sum('jumlah');
    $totalKeluar = (clone $keuanganBulanan)->where('jenis', 'keluar')->sum('jumlah');

    $saldo = Keuangan::latest('id')->value('saldo_akhir') ?? 0;


    $totalProjekSelesai = Projek::where('status', 'selesai')
        ->whereMonth('updated_at', $selectedMonth)
        ->whereYear('updated_at', $selectedYear)
        ->count();

    return view('dashboard', [
        'months' => $months,
        'years' => $years,
        'selectedMonth' => $selectedMonth,
        'selectedYear' => $selectedYear,
        'totalMasuk' => $totalMasuk,
        'totalKeluar' => $totalKeluar,
        'saldo' => $saldo, 
        'totalProjekSelesai' => $totalProjekSelesai,
        'logs' => $keuanganBulanan->latest()->limit(3)->get(),
    ]);
}

public function cleanupOldData()
{
    DB::transaction(function () {

        $limitDate = Carbon::now()->subMonths(5);

        Projek::where('status', 'selesai')
            ->where('created_at', '<', $limitDate)
            ->delete();

        // =====================
        // HAPUS KEUANGAN LAMA
        // =====================
        Keuangan::where('created_at', '<', $limitDate)
            ->delete();

        Pengeluaran::where('created_at', '<', $limitDate)
            ->delete();
    });


    return redirect()
        ->route('dashboard')
        ->with([
            'message' => 'Data lebih dari 5 bulan berhasil dibersihkan.',
            'alert-type' => 'success'
        ]);
}
}