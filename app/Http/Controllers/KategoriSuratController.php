<?php

namespace App\Http\Controllers;

use App\Models\KategoriSurat;
use Illuminate\Http\Request;

class KategoriSuratController extends Controller
{
    public function index(Request $request)
    {
        $query = KategoriSurat::query();

        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $data = $query->orderBy('id', 'asc')->paginate(5);

        return view('kategori_surat.index', compact('data'));
    }

    public function create()
    {
        return view('kategori_surat.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'       => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $kategori = KategoriSurat::create($validated);

        return redirect()
            ->route('kategori_surat.index')
            ->with('success', "Kategori {$kategori->nama} berhasil ditambahkan.");
    }

    public function edit($id)
    {
        $data = KategoriSurat::findOrFail($id);

        return view('kategori_surat.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama'       => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $data = KategoriSurat::findOrFail($id);
        $data->update($validated);

        return redirect()
            ->route('kategori_surat.index')
            ->with('success', "Kategori {$data->nama} berhasil diperbarui.");
    }

    public function destroy($id)
    {
        $data = KategoriSurat::findOrFail($id);
        $nama = $data->nama;
        $data->delete();

        return redirect()
            ->route('kategori_surat.index')
            ->with('success', "Kategori '{$nama}' berhasil dihapus.");
    }
}
