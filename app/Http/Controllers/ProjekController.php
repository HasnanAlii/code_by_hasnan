<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use App\Models\Projek;
use Illuminate\Http\Request;

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
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'nama_customer' => 'required|string|max:255',
            'deadline' => 'required|date',
            'status' => 'required',
        ]);

        Projek::create($request->all());



        return redirect()->route('projek.index')
            ->with('success', 'Projek berhasil ditambahkan');
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
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'nama_customer' => 'required|string|max:255',
            'deadline' => 'required|date',
            'status' => 'required',
        ]);

        $projek->update($request->all());

        if($request->status === 'selesai') {
        Keuangan::create([
            'jenis' => 'masuk',
            'jumlah' => $request->harga,
            'keterangan' => 'Pendapatan dari projek : ' . $request->nama,
            'id_projek' => Projek::latest()->first()->id,
            'saldo_akhir' => Keuangan::latest('id')->value('saldo_akhir') + $request->harga,
        ]);
        }

        return redirect()->route('projek.index')
            ->with('success', 'Projek berhasil diperbarui');
    }

    public function destroy(Projek $projek)
    {
        $projek->delete();

        return redirect()->route('projek.index')
            ->with('success', 'Projek berhasil dihapus');
    }
}
