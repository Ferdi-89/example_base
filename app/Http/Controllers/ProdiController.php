<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodi;

class ProdiController extends Controller
{
    /**
     * Tampilkan daftar semua prodi.
     */
    public function index()
    {
        $prodis = Prodi::latest()->paginate(10);
        return view('prodi.index', ['prodis' => $prodis]);
    }

    /**
     * Tampilkan form tambah prodi.
     */
    public function create()
    {
        return view('prodi.create');
    }

    /**
     * Simpan prodi baru ke database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_prodi'    => 'required|string|max:50|unique:prodis,nama_prodi',
            'jenjang_studi' => 'required|string|max:2|in:D2,D3,D4,S1,S2,S3',
            'keterangan'    => 'nullable|string|max:255',
        ]);

        Prodi::create($validatedData);

        return redirect('/prodi')->with('success', 'Data Prodi berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit prodi.
     */
    public function edit(string $id)
    {
        $prodi = Prodi::findOrFail($id);
        return view('prodi.edit', ['prodi' => $prodi]);
    }

    /**
     * Update data prodi di database.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama_prodi'    => 'required|string|max:50|unique:prodis,nama_prodi,' . $id,
            'jenjang_studi' => 'required|string|max:2|in:D2,D3,D4,S1,S2,S3',
            'keterangan'    => 'nullable|string|max:255',
        ]);

        $prodi = Prodi::findOrFail($id);
        $prodi->update($validatedData);

        return redirect('/prodi')->with('success', 'Data Prodi berhasil diperbarui!');
    }

    /**
     * Hapus data prodi dari database.
     */
    public function destroy(string $id)
    {
        $prodi = Prodi::findOrFail($id);
        $prodi->delete();

        return redirect('/prodi')->with('success', 'Data Prodi berhasil dihapus!');
    }
}
