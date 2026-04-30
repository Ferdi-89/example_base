<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Models\dosen;

class DosenController extends Controller
{
    public function insertDosen()
    {
        $query = DB::table('dosens')->insert(
            [
                'nik' => '123456789012345678',
                'nama' => 'M Rasyid',
                'email' => 'rasyid@gmail.com',
                'no_telp' => '081234567890',
                'prodi' => 'Management Informatika',
                'alamat' => 'Jl.Rasuna no.5 Padang',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        dd($query);
    }

    public function inserBanyakDosen()
    {
        $query = DB::table('dosens')->insert(
            [
                [
                    'nik' => '199230192740816',
                    'nama' => 'M Yazid',
                    'email' => 'yazid@gmail.com',
                    'no_telp' => '123144567890',
                    'prodi' => 'TRPL',
                    'alamat' => 'Jl.Sutomo no.1 Padang',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'nik' => '019234810992740816',
                    'nama' => 'Deni',
                    'email' => 'Deni@gmail.com',
                    'no_telp' => '190294567890',
                    'prodi' => 'TRPL',
                    'alamat' => 'Jl.Hatta no.15 Padang',
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]
        );
    }

    public function updateDosen(){
        $query =DB::table('dosens')
            ->where('nama','Deni')
            ->update(
                [
                    'no_telp'=>'12903719023',
                    'prodi'=>'Teknik Komputer',
                    'updated_at'=>now(),
                ]
                );
                return ("success");
    }

    public function updateWhereDosen(){
        $query = DB::table('dosens')
        -> where('nama','Deni')
        -> where('prodi','<>','TRPL')
        -> update(
            [
                'email'=>'deni@gmail.com',
                'updated_at'=>now()
            ]
            );
            dd($query);
    }

    public function updateOrInsert(){
        $query = DB::table('dosens')->updateOrInsert(
            [
                'nik'=>'123456789012345678',
            ],
            [
                'nama'=>'Steve Job',
                'email'=>'steve@gmail.com',
                'no_telp'=>'TRPL',
                'alamat'=>'Jl. M Hatta no.1 Padang',
                'created_at'=>now(),
                'updated_at'=>now()
            ]
        );
        dd($query);
    }

    public function deleteDosen(){
        $query = DB::table('dosens')
            ->where('nik','199230192740816')
            ->delete();
            dd($query);
    }

    public function get() {
        $query=DB::table('dosens')->get();
        return view('akademik.dosen',['dsn'=>$query]);
    }

    public function getTampil(){
        $query=DB::table('dosens')
            ->get();
            $i=0;$x=count($query);
            while($i <$x){
            echo $query[0]->nik . "<br>";
            echo $query[0]->nama . "<br>";
            echo $query[0]->email . "<br>";
            echo $query[0]->no_telp . "<br>";
            echo $query[0]->prodi . "<br>";
            echo $query[0]->alamat . "<br>";
            echo "<br>";
            $i++;
        }
    }

    public function getView() {
        $query=DB::table('dosens')
            ->get();
        return view('akademik.dosen',['dosen'=>$query]);
    }

    public function getWhere(){
        $query=DB::table('dosens')
        ->where('prodi','Management Informatika')
        ->orderBy('nama','desc')
        ->get();
        return view('akademik.dosen',['dosen'=>$query]);
    }

    public function selectDosen(){
        $query=DB::table('dosens')
        ->select('nik','nama as nama_dosen')
        ->get();
        dd($query);
    }

    public function take(){
        $query=DB::table('dosens')
        ->skip(1)
        ->take(2)
        ->get();
        dd($query);
    }

    public function first(){
        $query=DB::table('dosens')
        ->where('nama','Deni')->first();
        return view('akademik.dosen',['dosen'=>[$query]]);
    }

    public function find() {
        $query=DB::table('dosens')
        ->find(5);
        return view('akademik.dosen',['dosen'=>[$query]]);
    }

    public function raw() {
        $query=DB::table('dosens')
        ->selectRaw('count(*) as total_dosen')
        ->get();

        echo $query[0]->total_dosen;
    }

    public function all(){
        $dosen=dosen::paginate(5);
        return view('akademik.dosen',['dosen'=>$dosen]);
    }
}
