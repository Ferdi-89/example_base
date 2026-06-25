@extends('layouts.main')

@section('title', 'Data Dosen')

@section('container')
    <div class="d-flex justify-content-between align-items-center mb-3 pt-3">
        <h1 class="mb-0">Daftar Dosen</h1>
        @auth
        <a href="/dosen/create" class="btn btn-primary">Tambah Dosen</a>
        @endauth
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No. Telp</th>
                    <th>Prodi</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dosen as $namaDosen)
                    <tr>
                        <td>{{ $dosen->firstItem() + $loop->index }}</td>
                        <td>{{ $namaDosen->nik }}</td>
                        <td>{{ $namaDosen->nama }}</td>
                        <td>{{ $namaDosen->email }}</td>
                        <td>{{ $namaDosen->no_telp }}</td>
                        <td>{{ $namaDosen->prodi->nama_prodi ?? 'Tidak Terdaftar' }}</td>
                        <td>{{ $namaDosen->alamat }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">
                            <div class="alert alert-warning d-inline-block shadow-sm mb-0 mt-3">
                                Data tidak ada.. Silahkan isi data dosen!
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="mt-4">
        {{ $dosen->links() }}
    </div>
@endsection