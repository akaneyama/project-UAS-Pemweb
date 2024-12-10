@extends('layouts.app')

@section('content')
<h1 class="mb-4"><i class="fas fa-shopping-cart"></i> Daftar Transaksi</h1>
<a href="{{ route('transaksi.create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Transaksi</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-dark table-hover">
    <thead>
        <tr>
        
            <th>Nama Pelanggan</th>
            <th>Nama Buku</th>
            <th>Tanggal Transaksi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transaksi as $item)
        <tr>
       
            <td>{{ $item->pelanggan->nama_pelanggan }}</td>
            <td>{{ $item->buku->nama_buku }}</td>
            <td>{{ $item->tanggal_transaksi }}</td>
            <td>
                <a href="{{ route('transaksi.edit', $item->id_transaksi) }}" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <form action="{{ route('transaksi.destroy', $item->id_transaksi) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center mt-4">
    {{ $transaksi->links('pagination::bootstrap-5') }}
</div>
@endsection
