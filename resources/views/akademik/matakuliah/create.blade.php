@extends('layouts.main')

@section('title', 'Tambah Matakuliah')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-8 pt-3 pb-2 mb-3">
        <h1 class="h2 border-bottom pb-2">Tambah Matakuliah Baru</h1>
        
        <div class="card shadow-sm mt-3">
            <div class="card-body">
                <form method="post" action="/matakuliah">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="kode_matakuliah" class="form-label font-weight-bold">Kode Matakuliah</label>
                        <input type="text" class="form-control @error('kode_matakuliah') is-invalid @enderror" id="kode_matakuliah" name="kode_matakuliah" value="{{ old('kode_matakuliah') }}" placeholder="Contoh: MK001">
                        @error('kode_matakuliah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nama_matakuliah" class="form-label font-weight-bold">Nama Matakuliah</label>
                        <input type="text" class="form-control @error('nama_matakuliah') is-invalid @enderror" id="nama_matakuliah" name="nama_matakuliah" value="{{ old('nama_matakuliah') }}" placeholder="Nama mata kuliah">
                        @error('nama_matakuliah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="semester" class="form-label font-weight-bold">Semester</label>
                            <input type="number" class="form-control @error('semester') is-invalid @enderror" id="semester" name="semester" value="{{ old('semester') }}" min="1" max="8">
                            @error('semester')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="jenis_matakuliah" class="form-label font-weight-bold">Jenis Matakuliah</label>
                            <select class="form-select @error('jenis_matakuliah') is-invalid @enderror" id="jenis_matakuliah" name="jenis_matakuliah">
                                <option value="">-- Pilih Jenis --</option>
                                <option value="Teori" {{ old('jenis_matakuliah') == 'Teori' ? 'selected' : '' }}>Teori</option>
                                <option value="Praktek" {{ old('jenis_matakuliah') == 'Praktek' ? 'selected' : '' }}>Praktek</option>
                            </select>
                            @error('jenis_matakuliah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="sks" class="form-label font-weight-bold">SKS</label>
                            <input type="number" class="form-control @error('sks') is-invalid @enderror" id="sks" name="sks" value="{{ old('sks') }}" min="1" max="6">
                            @error('sks')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="jam" class="form-label font-weight-bold">Jam</label>
                            <input type="number" class="form-control @error('jam') is-invalid @enderror" id="jam" name="jam" value="{{ old('jam') }}" min="1" max="10">
                            @error('jam')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label font-weight-bold">Keterangan</label>
                        <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" rows="3" placeholder="Keterangan matakuliah (opsional)">{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2 justify-content-end mt-4">
                        <a href="/matakuliah" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
