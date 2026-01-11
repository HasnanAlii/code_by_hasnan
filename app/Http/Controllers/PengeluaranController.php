<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use App\Models\Pengeluaran;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PengeluaranController extends Controller
{

    public function index(Request $request)
    {
        $query = Pengeluaran::query();

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

        $totalPengeluaran = (clone $query)->sum('jumlah');

        $jumlahPengeluaran = (clone $query)->count();

        $pengeluaran = $query
            ->latest()
            ->paginate(7)
            ->withQueryString();

        return view('pengeluaran.index', compact(
            'pengeluaran',
            'totalPengeluaran',
            'jumlahPengeluaran'
        ));
    }

    public function create()
    {
        return view('pengeluaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'keterangan' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:0',
        ]);

        Pengeluaran::create($request->all());

        Keuangan::create([
            'jenis' => 'keluar',
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
            'id_pengeluaran' => Pengeluaran::latest()->first()->id,
            'id_projek' => null,
            'saldo_akhir' => Keuangan::latest('id')->value('saldo_akhir') - $request->jumlah,
        ]);

        return redirect()->route('pengeluaran.index')->with([
            'message' => 'Pengeluaran berhasil disimpan',
            'alert-type' => 'success'
        ]);

    }

    public function edit(Pengeluaran $pengeluaran)
    {
        return view('pengeluaran.edit', compact('pengeluaran'));
    }

    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $request->validate([
            'keterangan' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:0',
        ]);

        $pengeluaran->update($request->all());

        Keuangan::where('id_pengeluaran', $pengeluaran->id)->update([
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
            'saldo_akhir' => Keuangan::latest('id')->value('saldo_akhir') - $request->jumlah,
        ]);

        return redirect()->route('pengeluaran.index')->with([
            'message' => 'Pengeluaran berhasil diperbarui',
            'alert-type' => 'success'
        ]);

    }

    public function destroy(Pengeluaran $pengeluaran)
    {
        $pengeluaran->delete();

        return redirect()->route('pengeluaran.index')->with([
            'message' => 'Pengeluaran berhasil dihapus',
            'alert-type' => 'success'
        ]);

    }


    public function exportPdf(Request $request)
    {
        $query = Pengeluaran::query();

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

        $pengeluaran = $query
            ->orderBy('created_at')
            ->get();

        return Pdf::loadView('pengeluaran.pdf', compact('pengeluaran'))
            ->setPaper('A4', 'portrait')
            ->stream('laporan-pengeluaran.pdf');
    }
}
