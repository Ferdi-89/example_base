<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class mahasiswa extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = ['nim','nama_lengkap','tempat_lahir','tgl_lahir','email','prodi','alamat'];
}
