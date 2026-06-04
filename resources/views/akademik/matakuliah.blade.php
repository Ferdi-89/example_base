@extends('layouts.main')

@section('title', 'Data Matakuliah')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Matakuliah</h1>
        <a href="/matakuliah/create" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-circle"></i> Tambah Matakuliah
        </a>
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
                    <th scope="col">No</th>
                    <th scope="col">Kode Matakuliah</th>
                    <th scope="col">Nama Matakuliah</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Jenis Matakuliah</th>
                    <th scope="col">SKS</th>
                    <th scope="col">Jam</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mk as $item)
                    <tr>
                        <td>{{ ($mk->currentPage() - 1) * $mk->perPage() + $loop->iteration }}</td>
                        <td><span>{{ $item->kode_matakuliah }}</span></td>
                        <td>{{ $item->nama_matakuliah }}</td>
                        <td>{{ $item->semester }}</td>
                        <td>
                            @if($item->jenis_matakuliah === 'Teori')
                                <span>Teori</span>
                            @else
                                <span>Praktek</span>
                            @endif
                        </td>
                        <td>{{ $item->sks }}</td>
                        <td>{{ $item->jam }}</td>
                        <td>{{ $item->keterangan ?? '-' }}</td>
                        <td class="text-center">
                            <div class="d-inline-flex gap-2">
                                <a href="/matakuliah/{{ $item->id }}/edit" class="btn btn-warning btn-sm">
                                    Edit
                                </a>
                                <form action="/matakuliah/{{ $item->id }}" method="post"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus matakuliah ini?')">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center py-4">
                            <div class="alert alert-warning d-inline-block shadow-sm mb-0">
                                Data matakuliah tidak ditemukan. Silahkan isi data terlebih dahulu!
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $mk->links() }}
    </div>
@endsection
