@extends('layouts.main')
@section('title','Edit Data Mahasiswa')

@section('container')

    <h1 class="h2">Edit Form Mahasiswa</h1>

<div class="col-6">
<form method="post" action="/mahasiswa/{{ $mhs->id }}">
    @csrf
    @method('PUT')
    <div class="mb-2">
      
      <label for="nim" class="form-label">NIM</label>
      <input type="text" class="form-control" name="nim" value="{{ old('nim', $mhs->nim) }}">
      
    </div>

    <div class="mb-2">
      <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
      <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $mhs->nama_lengkap) }}">

    </div>

    <div class="mb-2">
      <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
      <input type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir', $mhs->tempat_lahir) }}">
      
    </div>
    <div class="mb-2">
      <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
      <input type="date" class="form-control" name="tgl_lahir" value="{{ old('tgl_lahir', $mhs->tgl_lahir) }}">
     
    </div>

    <div class="mb-2">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" name="email" value="{{ old('email', $mhs->email) }}">
      
    </div>
    <div class="mb-2">
      <label for="prodi" class="form-label">Prodi</label>
      <select class="form-select @error('prodi_id') is-invalid @enderror" name="prodi">
        <option value="">--pilih prodi--</option>
      
     
        <option value="MI" {{ (old('prodi', $mhs->prodi) == 'MI') ? 'selected' : '' }}> MI</option>
        <option value="TEKOM" {{ (old('prodi', $mhs->prodi) == 'TEKOM') ? 'selected' : '' }}> TEKOM</option>
        <option value="TRPL" {{ (old('prodi', $mhs->prodi) == 'TRPL') ? 'selected' : '' }}> TRPL</option>
     
      </select>
     
    </div>
      <div class="mb-2">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" name="alamat">{{ old('alamat', $mhs->alamat) }}</textarea>
        
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
      <a href="/mahasiswa" class="btn btn-secondary">Kembali</a>
  </form>
</div>
@endsection
