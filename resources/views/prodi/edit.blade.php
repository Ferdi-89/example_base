@extends('layouts.main')

@section('title', 'Edit Program Studi')

@section('container')
    <h1 class="h2 mb-4">Form Edit Program Studi</h1>

    <div class="col-md-6">
        <form method="POST" action="/prodi/{{ $prodi->id }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_prodi" class="form-label">Nama Program Studi</label>
                <input type="text"
                    class="form-control @error('nama_prodi') is-invalid @enderror"
                    id="nama_prodi"
                    name="nama_prodi"
                    value="{{ old('nama_prodi', $prodi->nama_prodi) }}"
                    maxlength="50">
                @error('nama_prodi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jenjang_studi" class="form-label">Jenjang Studi</label>
                <select class="form-select @error('jenjang_studi') is-invalid @enderror"
                    id="jenjang_studi"
                    name="jenjang_studi">
                    <option value="">-- Pilih Jenjang --</option>
                    @foreach (['D2', 'D3', 'D4', 'S1', 'S2', 'S3'] as $jenjang)
                        <option value="{{ $jenjang }}"
                            {{ old('jenjang_studi', $prodi->jenjang_studi) == $jenjang ? 'selected' : '' }}>
                            {{ $jenjang }}
                        </option>
                    @endforeach
                </select>
                @error('jenjang_studi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan <span class="text-muted">(opsional)</span></label>
                <textarea class="form-control @error('keterangan') is-invalid @enderror"
                    id="keterangan"
                    name="keterangan"
                    rows="3"
                    maxlength="255">{{ old('keterangan', $prodi->keterangan) }}</textarea>
                @error('keterangan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="/prodi" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
@endsection
