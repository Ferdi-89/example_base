@extends('layouts.main')

@section('title', 'Data Mahasiswa')

@section('container')
    <h1>Daftar Mahasiswa Jurusan TI</h1>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $mhs->links() }}
@endsection