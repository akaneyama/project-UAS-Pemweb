@extends('layouts.app')

@section('content')
<h1 class="mb-4"><i class="fas fa-users"></i> Daftar Pelanggan</h1>
<a href="{{ route('pelanggan.create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Pelanggan</a>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-dark table-hover">
    <thead>
        <tr>
          
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($items as $item)
            <tr>
                <td>{{ $item->nama_pelanggan }}</td>
                <td>{{ $item->alamat_pelanggan }}</td>
                <td>{{ $item->telp_pelanggan }}</td>
                <td>{{ $item->email_pelanggan }}</td>
                <td>
                    <a href="{{ route('pelanggan.edit', $item->id_pelanggan) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('pelanggan.destroy', $item->id_pelanggan) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">Tidak ada data.</td>
            </tr>
        @endforelse
    </tbody>
</table>
<div class="d-flex justify-content-center mt-4">
    {{ $items->links('pagination::bootstrap-5') }}
</div>
@endsection
