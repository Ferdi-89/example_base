@extends('layouts.main')

@section('title', 'Data Dosen')

@section('container')
    <h1>Daftar Dosen</h1>
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
                        <td>{{ $namaDosen->prodi }}</td>
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