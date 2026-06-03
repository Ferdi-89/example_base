@extends('layouts.main')

@section('title', 'Data Mahasiswa')

@section('container')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="mb-0">Daftar Mahasiswa Jurusan TI</h1>
        <a href="/mahasiswa/create" class="btn btn-primary">Tambah Mahasiswa</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama Lengkap</th>
                    <th>Tempat Lahir</th>
                    <th>Alamat</th>
                    <th>Prodi</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mhs as $namaMhs)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $namaMhs->nim }}</td>
                        <td>{{ $namaMhs->nama_lengkap }}</td>
                        <td>{{ $namaMhs->tempat_lahir }}</td>
                        <td>{{ $namaMhs->alamat }}</td>
                        <td>{{ $namaMhs->prodi }}</td>
                        <td>
                            <div class="d-flex gap-2 justify-content-center">
                                <a href="/mahasiswa/{{ $namaMhs->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                                <form action="/mahasiswa/{{ $namaMhs->id }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $mhs->links() }}
@endsection