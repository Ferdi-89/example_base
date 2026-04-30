@extends('layouts.main')
@section('title', 'Data Dosen')

@section('container')
<h1>Daftar Dosen </h1>
<ol>
    @foreach ($arrdsn as $item)
        <li>{{ $item }}</li>
    @endforeach
</ol>
@endsection