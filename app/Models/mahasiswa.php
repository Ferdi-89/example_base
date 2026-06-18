<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Prodi;

class mahasiswa extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nim','nama_lengkap','tempat_lahir','tgl_lahir','email','prodi_id','alamat'];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }
}
