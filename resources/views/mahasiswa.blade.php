@extends('layouts.main')
@section('title', 'Data Mahasiswa')

@section('container')
    <h1>Daftar Mahasiswa</h1>
    <ol>
        @foreach ($mhs as $item)
            <li>{{ $item->nama_lengkap }}</li>
        @endforeach
    </ol>
@endsection