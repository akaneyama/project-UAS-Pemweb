@extends('layouts.app')

@section('content')
<h1>Tambah Pelanggan</h1>

<form action="{{ route('pelanggan.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
        <input type="text" name="nama_pelanggan" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="alamat_pelanggan" class="form-label">Alamat</label>
        <textarea name="alamat_pelanggan" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
        <label for="telp_pelanggan" class="form-label">Telepon</label>
        <input type="text" name="telp_pelanggan" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="email_pelanggan" class="form-label">Email</label>
        <input type="email" name="email_pelanggan" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>
@endsection
