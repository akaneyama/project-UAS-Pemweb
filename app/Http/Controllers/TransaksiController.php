<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Pelanggan;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with('pelanggan', 'buku')->paginate(10);
        return view('transaksi.index', [
            'title' => 'Transaksi',
            'route' => 'transaksi',
            'transaksi' => $transaksi, 
            'headers' => ['ID', 'Pelanggan', 'Buku', 'Tanggal Transaksi']
        ]);
    }
    public function create()
    {
        return view('transaksi.create', [
            'title' => 'Tambah Transaksi',
            'route' => 'transaksi',
            'options' => [
                'id_pelanggan' => Pelanggan::pluck('nama_pelanggan', 'id_pelanggan'),
                'id_buku' => Buku::pluck('nama_buku', 'id_buku')
            ]
        ]);
    }
    public function store(Request $request)
{
    $request->validate([
        'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan',
        'id_buku' => 'required|exists:buku,id_buku',
        'tanggal_transaksi' => 'required|date',
    ]);
    $buku = Buku::findOrFail($request->id_buku);
    if ($buku->jumlah_buku <= 0) {
        return redirect()->back()->withErrors(['stok' => 'Stok buku tidak mencukupi.']);
    }
    $buku->jumlah_buku -= 1;
    $buku->save();
    Transaksi::create([
        'id_pelanggan' => $request->id_pelanggan,
        'id_buku' => $request->id_buku,
        'tanggal_transaksi' => $request->tanggal_transaksi,
    ]);

    return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan.');
}


    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi.edit', [
            'title' => 'Edit Transaksi',
            'route' => 'transaksi',
            'transaksi' => $transaksi,
            'options' => [
                'id_pelanggan' => Pelanggan::pluck('nama_pelanggan', 'id_pelanggan'),
                'id_buku' => Buku::pluck('nama_buku', 'id_buku')
            ]
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan',
            'id_buku' => 'required|exists:buku,id_buku',
            'tanggal_transaksi' => 'required|date',
            'total_harga' => 'required|numeric|min:0',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($request->all());
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
