@extends('layouts.app')

@section('content')
<h1>Edit Pelanggan</h1>

<form action="{{ route('pelanggan.update', $pelanggan->id_pelanggan) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
        <input type="text" name="nama_pelanggan" class="form-control" value="{{ $pelanggan->nama_pelanggan }}" required>
    </div>
    <div class="mb-3">
        <label for="alamat_pelanggan" class="form-label">Alamat</label>
        <textarea name="alamat_pelanggan" class="form-control" required>{{ $pelanggan->alamat_pelanggan }}</textarea>
    </div>
    <div class="mb-3">
        <label for="telp_pelanggan" class="form-label">Telepon</label>
        <input type="text" name="telp_pelanggan" class="form-control" value="{{ $pelanggan->telp_pelanggan }}" required>
    </div>
    <div class="mb-3">
        <label for="email_pelanggan" class="form-label">Email</label>
        <input type="email" name="email_pelanggan" class="form-control" value="{{ $pelanggan->email_pelanggan }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
