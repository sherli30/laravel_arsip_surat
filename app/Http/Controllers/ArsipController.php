<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\KategoriSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{
    public function index(Request $request)
    {
        $query = Arsip::with('kategori');

        if ($request->filled('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        $data = $query->orderBy('id', 'asc')->paginate(5);
        return view('arsip.index', compact('data'));
    }

    public function show($id)
    {
        $data = Arsip::with('kategori')->findOrFail($id);
        return view('arsip.lihat', compact('data'));
    }

    public function create()
    {
        $kategori = KategoriSurat::all();
        return view('arsip.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor'    => 'required|string|max:100',
            'kategori' => 'required|exists:kategori_surat,id',
            'judul'    => 'required|string|max:255',
            'file'     => 'required|mimes:pdf|max:2048',
        ]);

        $filename = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('arsip', $filename, 'public');
        }

        $arsip = Arsip::create([
            'nomor_surat' => $request->nomor,
            'kategori_id' => $request->kategori,
            'judul'       => $request->judul,
            'pdf'         => $filename,
        ]);

        return redirect()->route('arsip.index')
            ->with('success', "Arsip dengan Nomor Surat {$arsip->nomor_surat} berhasil ditambahkan.");
    }

    public function destroy($id)
    {
        $data = Arsip::findOrFail($id);

        if ($data->pdf && Storage::disk('public')->exists('arsip/' . $data->pdf)) {
            Storage::disk('public')->delete('arsip/' . $data->pdf);
        }

        $data->delete();

        return redirect()->route('arsip.index')
            ->with('success', 'Arsip berhasil dihapus.');
    }

    public function edit($id)
    {
        $data = Arsip::findOrFail($id);
        $kategori = KategoriSurat::all();
        return view('arsip.edit', compact('data', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor'    => 'required|string|max:100',
            'kategori' => 'required|exists:kategori_surat,id',
            'judul'    => 'required|string|max:255',
            'file'     => 'nullable|mimes:pdf|max:2048',
        ]);

        $data = Arsip::findOrFail($id);

        $data->nomor_surat = $request->nomor;
        $data->kategori_id = $request->kategori;
        $data->judul       = $request->judul;

        if ($request->hasFile('file')) {
            if ($data->pdf && Storage::disk('public')->exists('arsip/' . $data->pdf)) {
                Storage::disk('public')->delete('arsip/' . $data->pdf);
            }

            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('arsip', $filename, 'public');
            $data->pdf = $filename;
        }

        $data->save();

        return redirect()->route('arsip.show', $id)
            ->with('success', "Arsip dengan Nomor Surat {$data->nomor_surat} berhasil diperbarui.");
    }
}
