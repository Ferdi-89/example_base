<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class dosen extends Model
{
    use HasFactory;

    protected $table = 'dosens';

    protected $fillable = [
        'nik',
        'nama',
        'email',
        'no_telp',
        'prodi',
        'alamat'
    ];
}
