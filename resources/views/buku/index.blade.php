@extends('layouts.app')

@section('content')
<h1 class="mb-4"><i class="fas fa-book"></i> Daftar Buku</h1>
<a href="{{ route('buku.create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Buku</a>
<table class="table table-dark table-hover">
    <thead>
        <tr>
          
            <th>Nama Buku</th>
            <th>Jumlah</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)
        <tr>
        
            <td>{{ $item->nama_buku }}</td>
            <td>{{ $item->jumlah_buku }}</td>
            <td>{{ $item->deskripsi_buku }}</td>
            <td>
                <a href="{{ route('buku.edit', $item->id_buku) }}" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <form action="{{ route('buku.destroy', $item->id_buku) }}" method="POST" class="d-inline">
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
    {{ $items->links('pagination::bootstrap-5') }}
</div>
@endsection
