@extends('layouts.app')

@section('content')
<h1>Tambah Buku</h1>
<form action="{{ route('buku.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nama_buku" class="form-label">Nama Buku</label>
        <input type="text" name="nama_buku" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="jumlah_buku" class="form-label">Jumlah Buku</label>
        <input type="number" name="jumlah_buku" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label for="deskripsi_buku" class="form-label">Deskripsi</label>
        <textarea name="deskripsi_buku" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>
@endsection
