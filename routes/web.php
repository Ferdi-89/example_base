<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use Database\Seeders\mahasiswaSeeder;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return ('helloworld');
});

Route::get('/coba/{nama}', function ($nama) {
    return '<p> nama saya adalah ' . $nama . ', salken';
});

Route::get('/bubub', function () {
    return '<h2>buku tamu<h2>';
});
Route::redirect('/bubu', '/bubub');


route::fallback(function () {
    return ('halaman tidak ditemukan');
});


// route::get('/akademik', function () {
//     return view(
//         'akademik.akademik',
//         [
//             'mhs1' => 'Ferdiyansyah',
//             'mhs2' => 'Imancuk',
//             'mhs3' => 'Laura',
//         ]
//     );
// });

// Route::get('/mahasiswa', function () {
//     $arrMhs = ['Bill gates', 'Linus Benedict Torvalds', 'Taylor Otwell', 'Elon Musk', 'Muhammad Yazid'];
//     return view('akademik.mahasiswa', ['mhs' => $arrMhs]);
// });

Route::get('/layouts', function () {
    return view('home');
});

Route::get('/mahasiswa1', function () {
    $arrMhs =['Bill gates','Linus Benedict Torvald','Taylor Otwell','Elon Musk','Muhammad Yazid'];
    return view('akademik.mahasiswa1',['mhs'=>$arrMhs]);
});

Route::get('/dosen', [DosenController::class, 'all']);

Route::get('/pnp/{jurusan}/{prodi}', function ($jurusan, $prodi) {
    $data = [$jurusan, $prodi];
    return view('akademik.prodi')->with('data', $data);
})->name('prodi');

Route::get('/mahasiswa',[MahasiswaController::class,'index']);
Route::get('/mahasiswa_show', [MahasiswaController::class,'show']);

Route::get('/mahasiswa', [MahasiswaController::class,'latest']);
Route::get('/dosenn', [\App\Http\Controllers\Auth\DosenController::class, 'index']);
Route::get('/insert-sql', [MahasiswaController::class,'insertSQL']);
Route::get('/insert-prepared', [MahasiswaController::class,'insertPrepared']);
Route::get('/insert-binding', [MahasiswaController::class,'insertBinding']);
Route::get('/update', [MahasiswaController::class,'update']);
Route::get('/delete', [MahasiswaController::class,'delete']);
Route::get('/select',[MahasiswaController::class,'select']);
Route::get('/select-tampil',[MahasiswaController::class,'selectTampil']);
Route::get('/select-view', [MahasiswaController::class,'selectView']);
Route::get('/select-where', [MahasiswaController::class,'selectWhere']);
Route::get('/statement', [MahasiswaController::class,'statement']);

Route::get('/insert-dosen', [DosenController::class,'insertDosen']);
Route::get('/insert-banyak-dosen', [DosenController::class,'inserBanyakDosen']);
Route::get('/update-dosen',[DosenController::class,'updateDosen']);
Route::get('/update-where-dosen',[DosenController::class,'updateWhereDosen']);
Route::get('/update-or-insert', [DosenController::class,'updateOrInsert']);
Route::get('/delete-dosen', [DosenController::class,'deleteDosen']);
Route::get('/get',[DosenController::class,'get']);
Route::get('/get-tampil',[DosenController::class,'getTampil']);
Route::get('/get-view',[DosenController::class,'getView']);
Route::get('/get-where',[DosenController::class,'getWhere']);
Route::get('/select-dosen',[DosenController::class,'selectDosen']);
Route::get('/skip',[DosenController::class,'take']);
Route::get('/find',[DosenController::class,'find']);
Route::get('/first',[DosenController::class,'first']);
Route::get('/raw',[DosenController::class,'raw']);
Route::get('/insert',[MahasiswaController::class,'insert']);


Route::get('/mass-assigment',[MahasiswaController::class,'massAssigment']);
Route::get('/update-orm',[MahasiswaController::class,'updateter']);
Route::get('/update-where',[MahasiswaController::class,'updateWhere']);
Route::get('/mass-update',[MahasiswaController::class,'massUpdate']);
Route::get('/delete-orm',[MahasiswaController::class,'deleteOrm']);
Route::get('/destroy-orm',[MahasiswaController::class,'destroy']);
Route::get('/mass-delete',[MahasiswaController::class,'massDelete']);
Route::get('/get-all',[MahasiswaController::class,'allView']);
Route::get('/get-second',[MahasiswaController::class,'allSecond']);
Route::get('/all-views',[MahasiswaController::class,'allView']);
Route::get('/get-where-mhs',[MahasiswaController::class,'getWhere']);
Route::get('/first-mhs',[MahasiswaController::class,'first']);
Route::get('/find-mhs',[MahasiswaController::class,'find']);
Route::get('/latest',[MahasiswaController::class,'latest']);
Route::get('/limit',[MahasiswaController::class,'limit']);
Route::get('/skip-take',[MahasiswaController::class,'skipTake']);
Route::get('/soft-delete',[MahasiswaController::class,'softDelete']);
Route::get('/trashcan',[MahasiswaController::class,'trashCan']);
Route::get('/restore',[MahasiswaController::class,'restore']);
Route::get('/force-delete',[MahasiswaController::class,'forceDelete']);
Route::get('/all-dosen',[DosenController::class,'get']);
