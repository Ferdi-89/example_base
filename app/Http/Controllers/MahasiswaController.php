<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\http\Controllers;

use App\Models\mahasiswa;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */

    public function insertSQl() {
        $query=DB::insert("INSERT INTO mahasiswas(nim,nama_lengkap,tempat_lahir,tgl_lahir,email,prodi,alamat,created_at,updated_at) VALUES ('2022090909','Linus B Torvalds','Finlandia','1971-08-12','Linus@linux.org','TRPL','Jl.Sudirman no.10 Padang',now(),now())" );
    }
    public function insertPrepared() {
    $query=DB::insert("INSERT INTO mahasiswas(nim,nama_lengkap,tempat_lahir,tgl_lahir,email,prodi,alamat,created_at,updated_at) VALUES (?,?,?,?,?,?,?,?,?)",["2022090909","Taylor Otwell","Amerika","1989-08-12","Taylor@linux.org","TRPL","Jl.Sudirman no.10 Padang",now(),now()]);
    }

    public function insertBinding() {
        $query=DB::insert("INSERT INTO mahasiswas(nim,nama_lengkap,tempat_lahir,tgl_lahir,email,prodi,alamat,created_at,updated_at) VALUES (:nim,:nama_lengkap,:tempat_lahir,:tgl_lahir,:email,:prodi,:alamat,:created_at,:updated_at)",
        [
            'nim'=>'2411081009',
            'nama_lengkap'=>'Laura',
            'tempat_lahir'=>'Padang',
            'tgl_lahir'=>'2006-2-12',
            'email'=>'Laura@gmail.com',
            'prodi'=>'MI',
            'alamat'=>'Jl.Sudirman no.10 Padang',
            'created_at'=>now(),
            'updated_at'=>now()
        ]
        );
    }

    public function update() {
        $query=DB::update("UPDATE mahasiswas SET tempat_lahir = 'seattle washington US' WHERE nama_lengkap=?",['Ferdiyansyah']);
    }

    public function delete(){
        $query=DB::delete("DELETE FROM mahasiswas WHERE nama_lengkap=?",['Ferdiyansyah']);
    }

    public function select(){
        $query=DB::select('SELECT * FROM mahasiswas');
        dd($query);
    }

    public function selectTampil() {
        $query=DB::select('SELECT * FROM mahasiswas');
        $i=0; $x=count($query);
        while($i < $x){
        echo ($query[$i]->id) . "<br />";
        echo ($query[$i]->nim) . "<br />";
        echo ($query[$i]->nama_lengkap) . "<br />";
        echo ($query[$i]->tempat_lahir) . "<br />";
        echo ($query[$i]->tgl_lahir) . "<br />";
        echo ($query[$i]->email) . "<br />";
        echo ($query[$i]->prodi) . "<br />";
        echo ($query[$i]->alamat) . "<br>";
        echo ($query[$i]->created_at) . "<br>";
        echo ($query[$i]->updated_at) . "<br>";
        $i++;
        }
    }

    public function selectView(){
        $query=DB::select("SELECT * FROM mahasiswas");
        return view('akademik.mahasiswa',['mhs'=>$query]);
    }

    public function selectWhere(){
        $query=DB::select('SELECT * FROM mahasiswas WHERE  prodi=? ORDER BY nim ASC',['MI']);
        return view('akademik.mahasiswa',['mhs'=>$query]);
    }

    public function statement(){
        $query=DB::statement('TRUNCATE TABLE mahasiswas');
        return ('Tabel Mahasiswa Tekah Dikosongkan');
    }

    public function insert() {
        $mahasiswa=new Mahasiswa();
        $mahasiswa->nim='2411081009';
        $mahasiswa->nama_lengkap='Laura';
        $mahasiswa->tempat_lahir='Padang';
        $mahasiswa->tgl_lahir='2006-2-12';
        $mahasiswa->email='Laura@gmail.com';
        $mahasiswa->prodi='MI';
        $mahasiswa->alamat='Jl.Sudirman no.10 Padang';
        $mahasiswa->created_at=now();
        $mahasiswa->updated_at=now();
        $mahasiswa->save();

        dd($mahasiswa);
    }

    public function massAssigment(){
        $mahasiswa=mahasiswa::create(
            [
                'nim'=>'2081009',
                'nama_lengkap'=>'Laura',
                'tempat_lahir'=>'Padang',
                'tgl_lahir'=>'2006-2-12',
                'email'=>'laura@gmail.com',
                'prodi'=>'TRPL',
                'alamat'=>'Jln.Raya Sungai Pua no.29',
                'created_at'=>now(),
                'updated_at'=>now()
            ]
            );
            dump($mahasiswa);
            $mahasiswa=mahasiswa::create(
                [
                    'nim'=>'212414',
                    'nama_lengkap'=>'Darrel',
                    'tempat_lahir'=>'SungaiPua',
                    'tgl_lahir'=>'2015-05-12',
                    'email'=>'darrel@gmail.com',
                    'prodi'=>'TRPL',
                    'alamat'=>'Jln.Ahmad Yani no.10',
                    'created_at'=>now(),
                    'updated_at'=>now()
                ]
                );
            dump($mahasiswa);
    }

    public function updateter() {
        $mahasiswa=mahasiswa::find(2);

        $mahasiswa->tempat_lahir='california';
        $mahasiswa->prodi='tekom';
        $mahasiswa->save();

        dd($mahasiswa);
    }

    public function updateWhere(){
        $mahasiswa=mahasiswa::where('nim','2081009')->first();
        $mahasiswa->alamat='Koto Lalang Kce, Lubuk Kilangan, Padang';
        $mahasiswa->save();

        dd($mahasiswa);
    }

    public function massUpdate(){
        $mahasiswa=mahasiswa::where('nim','2081009')->first()->update(
            [
                'tempat_lahir'=>'Payakumbuh',
                'prodi'=>'Teknik Komputer'
            ]
            );
            dd($mahasiswa);
        }

        public function deleteOrm(){
            $mahasiswa=mahasiswa::find(2);
            $mahasiswa->delete();

            dd($mahasiswa);
        }

        public function destroy(){
            $mahasiswa=mahasiswa::destroy(4);

            dd($mahasiswa);
        }

        public function massDelete(){
            $mahasiswa=mahasiswa::where('prodi','TRPL')->delete();
            dd($mahasiswa);
        }

        public function allFirst(){
            $mahasiswa=mahasiswa::all();
            echo $mahasiswa[0]->id . "<br>";
            echo $mahasiswa[0]->nim . "<br>";
            echo $mahasiswa[0]->nama_lengkap . "<br>";
            echo $mahasiswa[0]->tempat_lahir . "<br>";
            echo $mahasiswa[0]->tgl_lahir . "<br>";
            echo $mahasiswa[0]->email . "<br>";
            echo $mahasiswa[0]->prodi . "<br>";
            echo $mahasiswa[0]->alamat . "<br>";
            echo $mahasiswa[0]->created_at . "<br>";
            echo $mahasiswa[0]->updated_at . "<br>";
            dd($mahasiswa);
        }

        public function allSecond(){
            $mahasiswa=mahasiswa::all();
                foreach ($mahasiswa as $mhs){
                    echo $mhs->id . "<br>";
                    echo $mhs->nim . "<br>";
                    echo $mhs->nama_lengkap . "<br>";
                    echo $mhs->tempat_lahir . "<br>";
                    echo $mhs->tgl_lahir . "<br>";
                    echo $mhs->email . "<br>";
                    echo $mhs->prodi . "<br>";
                    echo $mhs->alamat . "<br>";
                    echo $mhs->created_at . "<br>";
                    echo $mhs->updated_at . "<br>";
                }
        }

        public function allView(){
            $mahasiswa=mahasiswa::all();
            return view('akademik.mahasiswa',['mhs'=>$mahasiswa]);
        }


        public function getWhere(){
            $mahasiswa=mahasiswa::where('prodi','MI')
            ->orderBy('nama_lengkap','asc')
            ->get();
            return view ('akademik.mahasiswa',['mhs'=>$mahasiswa]);
        }

        public function first(){
            $mahasiswa=mahasiswa::where('prodi','MI')->first();
            return view('akademik.mahasiswa',['mhs'=>[$mahasiswa]]);
        }

        public function find(){
            $mahasiswa=mahasiswa::find(2);
            return view('akademik.mahasiswa',['mhs'=>[$mahasiswa]]);
        }

        public function latest(){
            $mahasiswa=mahasiswa::latest()->paginate(10);
            return view('akademik.mahasiswa',['mhs'=>$mahasiswa]);
        }

        public function limit(){
            $mahasiswa=mahasiswa::latest()->limit(2)->get();
            return view('akademik.mahasiswa',['mhs'=>$mahasiswa]);
        }

        public function skipTake(){
            $mahasiswa=mahasiswa::orderBy('id')->skip(1)->take(2)->get();
            return view('akademik.mahasiswa',['mhs'=>$mahasiswa]);
        }

        public function softDelete(){
            mahasiswa::where('id','3')->delete();
            return('Data mahasiswa berhasil dihapus');

        }

        public function trashCan(){
            $mahasiswa=mahasiswa::withTrashed()->get();
            return view('akademik.mahasiswa',['mhs'=>$mahasiswa]);
        }

        public function restore() {
            mahasiswa::withTrashed()->where('id','3')->restore();
            return 'Berhasil di Restore';
        }

        public function forceDelete(){
            mahasiswa::where('id','3')->forceDelete();
            return 'Berhasil dihapus secara permanen';
        }
}
