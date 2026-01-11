<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use App\Models\Projek;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class KeuanganController extends Controller
{

    public function index(Request $request)
    {
        $query = Keuangan::query();

        if ($request->filter === 'harian' && $request->tanggal) {
            $query->whereDate('created_at', $request->tanggal);
        }

        if ($request->filter === 'bulanan' && $request->bulan) {
            $bulan = Carbon::parse($request->bulan);
            $query->whereMonth('created_at', $bulan->month)
                ->whereYear('created_at', $bulan->year);
        }

        if ($request->filter === 'tahunan' && $request->tahun) {
            $query->whereYear('created_at', $request->tahun);
        }

        $pemasukan = (clone $query)
            ->where('jenis', 'masuk')
            ->sum('jumlah');

        $pengeluaran = (clone $query)
            ->where('jenis', 'keluar')
            ->sum('jumlah');

        $saldo = Keuangan::latest('id')->value('saldo_akhir') ?? 0;


        $keuangans = $query
            ->latest()
            ->paginate(6)
            ->withQueryString();

        return view('keuangan.index', compact(
            'keuangans',
            'pemasukan',
            'pengeluaran',
            'saldo'
        ));
    }

    public function create()
    {
        $projeks = Projek::all();
        $pengeluarans = Pengeluaran::all();

        return view('keuangan.create', compact('projeks', 'pengeluarans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required|in:masuk,keluar',
            'jumlah' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
            'id_projek' => 'nullable|exists:projeks,id',
            'id_pengeluaran' => 'nullable|exists:pengeluarans,id',
        ]);

        // Ambil saldo terakhir
        $lastSaldo = Keuangan::latest('id')->value('saldo_akhir') ?? 0;

        $saldoAkhir = $request->jenis === 'masuk'
            ? $lastSaldo + $request->jumlah
            : $lastSaldo - $request->jumlah;

        Keuangan::create([
            'jenis'          => $request->jenis,
            'jumlah'         => $request->jumlah,
            'keterangan'     => $request->keterangan,
            'id_projek'      => $request->id_projek,
            'id_pengeluaran' => $request->id_pengeluaran,
            'saldo_akhir'    => $saldoAkhir,
        ]);

        return redirect()->route('keuangan.index')->with([
            'message' => 'Data keuangan berhasil ditambahkan',
            'alert-type' => 'success'
        ]);

    }


    public function edit(Keuangan $keuangan)
    {
        $projeks = Projek::all();
        $pengeluarans = Pengeluaran::all();

        return view('keuangan.edit', compact(
            'keuangan',
            'projeks',
            'pengeluarans'
        ));
    }

    public function update(Request $request, Keuangan $keuangan)
    {
        $request->validate([
            'jenis' => 'required|in:masuk,keluar',
            'jumlah' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
            'id_projek' => 'nullable|exists:projeks,id',
            'id_pengeluaran' => 'nullable|exists:pengeluarans,id',
        ]);

        // Hitung selisih lama vs baru
        $oldValue = $keuangan->jenis === 'masuk'
            ? $keuangan->jumlah
            : -$keuangan->jumlah;

        $newValue = $request->jenis === 'masuk'
            ? $request->jumlah
            : -$request->jumlah;

        $diff = $newValue - $oldValue;

        // Update data utama
        $keuangan->update([
            'jenis'          => $request->jenis,
            'jumlah'         => $request->jumlah,
            'keterangan'     => $request->keterangan,
            'id_projek'      => $request->id_projek,
            'id_pengeluaran' => $request->id_pengeluaran,
        ]);

        // Update saldo setelahnya
        Keuangan::where('id', '>=', $keuangan->id)
            ->orderBy('id')
            ->each(function ($row) use ($diff) {
                $row->saldo_akhir += $diff;
                $row->save();
            });

        return redirect()->route('keuangan.index')->with([
            'message' => 'Data keuangan berhasil diperbarui',
            'alert-type' => 'success'
        ]);
    }


    public function destroy(Keuangan $keuangan)
    {
        $keuangan->delete();

        return redirect()->route('keuangan.index')->with([
            'message' => 'Data keuangan berhasil dihapus',
            'alert-type' => 'success'
        ]);
    }

    public function exportPdf(Request $request)
    {
        $query = Keuangan::query();

        if ($request->filter === 'harian' && $request->tanggal) {
            $query->whereDate('created_at', $request->tanggal);
        }

        if ($request->filter === 'bulanan' && $request->bulan) {
            $bulan = \Carbon\Carbon::parse($request->bulan);
            $query->whereMonth('created_at', $bulan->month)
                ->whereYear('created_at', $bulan->year);
        }

        if ($request->filter === 'tahunan' && $request->tahun) {
            $query->whereYear('created_at', $request->tahun);
        }

        $keuangans = $query->orderBy('created_at')->get();

        return Pdf::loadView('keuangan.pdf', compact('keuangans'))
            ->setPaper('A4', 'portrait')
            ->stream('laporan-keuangan.pdf');
    }
}
