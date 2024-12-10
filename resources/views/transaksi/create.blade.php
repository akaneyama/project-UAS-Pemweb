@extends('layouts.app')

@section('content')
<h1>Tambah Transaksi</h1>
<form action="{{ route('transaksi.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="id_pelanggan" class="form-label">Pelanggan</label>
        <select name="id_pelanggan" id="id_pelanggan" class="form-control select2" required>
            <option value="">Pilih Pelanggan</option>
            @foreach ($options['id_pelanggan'] as $id => $nama)
                <option value="{{ $id }}">{{ $nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="id_buku" class="form-label">Buku</label>
        <select name="id_buku" id="id_buku" class="form-control select2" required>
            <option value="">Pilih Buku</option>
            @foreach ($options['id_buku'] as $id => $nama)
                <option value="{{ $id }}">{{ $nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="tanggal_transaksi" class="form-label">Tanggal Transaksi</label>
        <input type="date" name="tanggal_transaksi" class="form-control" required>
    </div>
   
    <button type="submit" class="btn btn-success">Simpan</button>
</form>

<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Pilih opsi",
            allowClear: true
        });
    });
</script>
@endsection
