@extends('layouts.main')

@section('title', 'Data Program Studi')

@section('container')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="mb-0">Daftar Program Studi</h1>
        <a href="/prodi/create" class="btn btn-primary">+ Tambah Prodi</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Program Studi</th>
                    <th>Jenjang Studi</th>
                    <th>Keterangan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($prodis as $prodi)
                    <tr>
                        <td>{{ $loop->iteration + ($prodis->currentPage() - 1) * $prodis->perPage() }}</td>
                        <td>{{ $prodi->nama_prodi }}</td>
                        <td><span class="badge bg-secondary">{{ $prodi->jenjang_studi }}</span></td>
                        <td>{{ $prodi->keterangan ?? '-' }}</td>
                        <td>
                            <div class="d-flex gap-2 justify-content-center">
                                <a href="/prodi/{{ $prodi->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                                <form action="/prodi/{{ $prodi->id }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus prodi ini?')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Belum ada data prodi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $prodis->links() }}
@endsection
