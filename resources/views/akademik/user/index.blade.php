@extends('layouts.main')

@section('title', 'Daftar Akun User - Akademik')

@section('container')
    <div class="d-flex justify-content-between align-items-center mb-3 pt-3">
        <h1 class="mb-0">Daftar Akun User / Admin</h1>
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
                    <th scope="col" style="width: 80px;">No</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Alamat Email</th>
                    <th scope="col">Tanggal Terdaftar</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $users->firstItem() + $loop->index }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px; font-size: 14px;">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <span>{{ $user->name }}</span>
                                @if($user->email === 'admin@gmail.com')
                                    <span class="badge bg-danger ms-1" style="font-size: 10px;">Super Admin</span>
                                @endif
                            </div>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at ? $user->created_at->translatedFormat('d F Y H:i') : '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">
                            <div class="alert alert-warning d-inline-block shadow-sm mb-0">
                                Tidak ada data akun user terdaftar.
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="mt-4 d-flex justify-content-center">
        {{ $users->links() }}
    </div>
@endsection
