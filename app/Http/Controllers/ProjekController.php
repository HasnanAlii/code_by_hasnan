<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use App\Models\Media;
use App\Models\Projek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjekController extends Controller
{
    public function index(Request $request)
    {
        $query = Projek::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $projeks = $query
            ->latest()
            ->paginate(8)
            ->withQueryString();

        return view('projek.index', compact('projeks'));
    }


    public function create()
    {
        return view('projek.create');
    }



    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'harga' => 'required|integer',
            'nama_customer' => 'required',
            'deadline' => 'required|date',
            'status' => 'required',
            'foto.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $projek = Projek::create($request->only([
            'nama','jenis','harga','nama_customer','deadline','deskripsi','status'
        ]));

        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $file) {
                $path = $file->store('projek', 'public');

                Media::create([
                    'id_projek' => $projek->id,
                    'foto' => $path,
                ]);
            }
        }

        return redirect()->route('projek.index')->with('success', 'Projek berhasil disimpan.');
    }



    public function show(Projek $projek)
    {
        return view('projek.show', compact('projek'));
    }

    public function edit(Projek $projek)
    {
        return view('projek.edit', compact('projek'));
    }

   
public function update(Request $request, Projek $projek)
{
    $request->validate([
        'nama'          => 'required|string|max:255',
        'jenis'         => 'required|string|max:255',
        'harga'         => 'required|numeric|min:0',
        'nama_customer' => 'required|string|max:255',
        'deadline'      => 'required|date',
        'status'        => 'required|in:pending,proses,selesai,batal',
        'foto.*'        => 'nullable|image|mimes:jpg,jpeg,png|max:12048'
    ]);

    // Simpan status lama
    $statusLama = $projek->status;

    // Update data utama projek
    $projek->update($request->only([
        'nama','jenis','harga','nama_customer','deadline','deskripsi','status'
    ]));

    /* =======================
       HAPUS FOTO LAMA
    ======================= */
    if ($request->has('hapus_foto')) {
        foreach ($request->hapus_foto as $id) {
            $media = Media::where('id_projek', $projek->id)->where('id', $id)->first();
            if ($media) {
                Storage::disk('public')->delete($media->foto);
                $media->delete();
            }
        }
    }

    /* =======================
       TAMBAH FOTO BARU
    ======================= */
    if ($request->hasFile('foto')) {
        foreach ($request->file('foto') as $file) {
            $path = $file->store('projek', 'public');

            Media::create([
                'id_projek' => $projek->id,
                'foto'      => $path,
            ]);
        }
    }

    /* =======================
       CATAT KEUANGAN JIKA SELESAI
    ======================= */
    if ($statusLama !== 'selesai' && $request->status === 'selesai') {

        $saldoTerakhir = Keuangan::latest('id')->value('saldo_akhir') ?? 0;

        Keuangan::create([
            'jenis'       => 'masuk',
            'jumlah'      => $request->harga,
            'keterangan'  => 'Pendapatan dari projek: ' . $request->nama,
            'id_projek'   => $projek->id,
            'saldo_akhir' => $saldoTerakhir + $request->harga,
        ]);
    }

    return redirect()->route('projek.index')->with([
        'message' => 'Projek berhasil diperbarui',
        'alert-type' => 'success'
    ]);
}



    public function destroy(Projek $projek)
    {
        $projek->delete();

    return redirect()->route('projek.index')->with([
        'message' => 'Projek berhasil dihapus',
        'alert-type' => 'success'
    ]);
    }
}
