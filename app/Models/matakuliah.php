<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class matakuliah extends Model
{
    use HasFactory;

    protected $table = 'matakuliahs';
    protected $primaryKey = 'id';
    protected $fillable = ['kode_matakuliah','nama_matakuliah','semester','jenis_matakuliah','sks','jam','keterangan'];
}
