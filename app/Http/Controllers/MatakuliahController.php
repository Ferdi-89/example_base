<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\matakuliah;

class MatakuliahController extends Controller
{
    public function index(){
        $mk = matakuliah::paginate(5);
        return view('akademik.matakuliah', ['mk' => $mk]);
    }
    public function create (){
        return view('akademik.matakuliah.create');
    }
    public function store (Request $request){
        $request->validate([
            'kode_matakuliah' => 'required|string|max:10',
            'nama_matakuliah' => 'required|string|max:100',
            'semester' => 'required|integer|min:1|max:8',
            'jenis_matakuliah' => 'required|in:Teori,Praktek',
            'sks' => 'required|integer|min:1|max:6',
            'jam' => 'required|integer|min:1|max:10',
            'keterangan' => 'nullable|string|max:255',
        ]);

        DB::table('matakuliahs')->insert([
            'kode_matakuliah' => $request->kode_matakuliah,
            'nama_matakuliah' => $request->nama_matakuliah,
            'semester' => $request->semester,
            'jenis_matakuliah' => $request->jenis_matakuliah,
            'sks' => $request->sks,
            'jam' => $request->jam,
            'keterangan' => $request->keterangan,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/matakuliah')->with('success', 'Data Matakuliah berhasil disimpan!');
    }
    public function edit ($id){
        $mk = DB::table('matakuliahs')->where('id',$id)->first();
        return view('akademik.matakuliah.edit', ['mk' => $mk]);
    }
    public function update (Request $request,$id){
        $request->validate([
            'kode_matakuliah' => 'required|string|max:10',
            'nama_matakuliah' => 'required|string|max:100',
            'semester' => 'required|integer|min:1|max:8',
            'jenis_matakuliah' => 'required|in:Teori,Praktek',
            'sks' => 'required|integer|min:1|max:6',
            'jam' => 'required|integer|min:1|max:10',
            'keterangan' => 'nullable|string|max:255',
        ]);

        DB::table('matakuliahs')->where('id', $id)->update([
            'kode_matakuliah' => $request->kode_matakuliah,
            'nama_matakuliah' => $request->nama_matakuliah,
            'semester' => $request->semester,
            'jenis_matakuliah' => $request->jenis_matakuliah,
            'sks' => $request->sks,
            'jam' => $request->jam,
            'keterangan' => $request->keterangan,
            'updated_at' => now(),
        ]);

        return redirect('/matakuliah')->with('success', 'Data Matakuliah berhasil diperbarui!');
    }
    public function destroy ($id){
        DB::table('matakuliahs')->where('id',$id)->delete();
        return redirect('/matakuliah')->with('success', 'Data Matakuliah berhasil dihapus!');
    }

}
