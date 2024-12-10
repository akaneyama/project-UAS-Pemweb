@extends('layouts.app')

@section('content')
<h1>Edit Transaksi</h1>
<form action="{{ route('transaksi.update', $transaksi->id_transaksi) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="id_pelanggan" class="form-label">Pelanggan</label>
        <select name="id_pelanggan" id="id_pelanggan" class="form-control select2" required>
            <option value="">Pilih Pelanggan</option>
            @foreach ($options['id_pelanggan'] as $id => $nama)
                <option value="{{ $id }}" {{ $id == $transaksi->id_pelanggan ? 'selected' : '' }}>
                    {{ $nama }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="id_buku" class="form-label">Buku</label>
        <select name="id_buku" id="id_buku" class="form-control select2" required>
            <option value="">Pilih Buku</option>
            @foreach ($options['id_buku'] as $id => $nama)
                <option value="{{ $id }}" {{ $id == $transaksi->id_buku ? 'selected' : '' }}>
                    {{ $nama }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="tanggal_transaksi" class="form-label">Tanggal Transaksi</label>
        <input type="date" name="tanggal_transaksi" class="form-control" 
               value="{{ $transaksi->tanggal_transaksi }}" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Update</button>
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
