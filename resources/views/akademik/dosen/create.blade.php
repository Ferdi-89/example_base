@extends('layouts.main')

@section('title', 'Tambah Dosen')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-8 pt-3 pb-2 mb-3">
        <h1 class="h2 border-bottom pb-2">Tambah Dosen Baru</h1>
        
        <div class="card shadow-sm mt-3">
            <div class="card-body">
                <form method="post" action="/dosen">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="nik" class="form-label font-weight-bold">NIK (Nomor Induk Karyawan)</label>
                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik') }}" placeholder="Contoh: 199001012015011001" maxlength="18">
                        @error('nik')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label font-weight-bold">Nama Lengkap</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Nama lengkap dosen beserta gelar">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label font-weight-bold">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="email@domain.com">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="no_telp" class="form-label font-weight-bold">No. Telepon</label>
                            <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" value="{{ old('no_telp') }}" placeholder="Contoh: 081234567890" maxlength="15">
                            @error('no_telp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="prodi_id" class="form-label font-weight-bold">Program Studi</label>
                        <select class="form-select @error('prodi_id') is-invalid @enderror" id="prodi_id" name="prodi_id">
                            <option value="">-- Pilih Program Studi --</option>
                            @foreach ($prodi as $item)
                                <option value="{{ $item->id }}" {{ old('prodi_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_prodi }} ({{ $item->jenjang_studi }})
                                </option>
                            @endforeach
                        </select>
                        @error('prodi_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label font-weight-bold">Alamat</label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3" placeholder="Alamat tempat tinggal lengkap">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2 justify-content-end mt-4">
                        <a href="/dosen" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
