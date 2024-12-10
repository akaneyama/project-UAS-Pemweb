@extends('layouts.app')

@section('content')
<h1>{{ $action }} Buku</h1>
<form action="{{ route('buku.update', $item->id_buku) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nama_buku">Nama Buku</label>
        <input type="text" name="nama_buku" id="nama_buku" class="form-control" 
               value="{{ old('nama_buku', $item->nama_buku) }}" required>
        @error('nama_buku')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="jumlah_buku">Jumlah Buku</label>
        <input type="number" name="jumlah_buku" id="jumlah_buku" class="form-control" 
               value="{{ old('jumlah_buku', $item->jumlah_buku) }}" required min="1">
        @error('jumlah_buku')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="deskripsi_buku">Deskripsi Buku</label>
        <textarea name="deskripsi_buku" id="deskripsi_buku" class="form-control">{{ old('deskripsi_buku', $item->deskripsi_buku) }}</textarea>
        @error('deskripsi_buku')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('buku.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
