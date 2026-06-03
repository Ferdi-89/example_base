@extends('layouts.main')
@section('title','Data Mahasiswa')

@section('container')

    <h1 class="h2">Form Mahasiswa</h1>

<div class="col-6">
<form method="post" action="/mahasiswa">
    @csrf
    <div class="mb-2">
      <label for="nim" class="form-label">NIM</label>
      <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{ old('nim') }}">
      @error('nim')
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-2">
      <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
      <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" value="{{ old('nama_lengkap') }}">
      @error('nama_lengkap')
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-2">
      <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
      <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
      @error('tempat_lahir')
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-2">
      <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
      <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" value="{{ old('tgl_lahir') }}">
      @error('tgl_lahir')
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-2">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
      @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-2">
      <label for="prodi" class="form-label">Prodi</label>
      <select class="form-select @error('prodi') is-invalid @enderror" name="prodi">
        <option value="">--pilih prodi--</option>
        <option value="MI" {{ old('prodi') == 'MI' ? 'selected' : '' }}>MI</option>
        <option value="TEKOM" {{ old('prodi') == 'TEKOM' ? 'selected' : '' }}>TEKOM</option>
        <option value="TRPL" {{ old('prodi') == 'TRPL' ? 'selected' : '' }}>TRPL</option>
      </select>
      @error('prodi')
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-2">
      <label for="alamat" class="form-label">Alamat</label>
      <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat">{{ old('alamat') }}</textarea>
      @error('alamat')
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="/mahasiswa" class="btn btn-secondary">Kembali</a>
  </form>
</div>
@endsection
