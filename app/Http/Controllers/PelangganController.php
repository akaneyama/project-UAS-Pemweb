<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    public function index()
    {
        
        $pelanggan = Pelanggan::paginate(10);
        return view('pelanggan.index', [
            'title' => 'Daftar Pelanggan',
            'items' => $pelanggan,
        ]);
    }

    public function create()
    {
        return view('pelanggan.create', [
            'title' => 'Tambah Pelanggan',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|max:200',
            'alamat_pelanggan' => 'required|max:200',
            'telp_pelanggan' => 'required|max:13',
            'email_pelanggan' => 'required|email|max:100',
        ]);

        Pelanggan::create($request->all());
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    public function edit($id_pelanggan)
    {
        $pelanggan = Pelanggan::findOrFail($id_pelanggan);
        return view('pelanggan.edit', [
            'title' => 'Edit Pelanggan',
            'pelanggan' => $pelanggan,
        ]);
    }

    public function update(Request $request, $id_pelanggan)
    {
        $request->validate([
            'nama_pelanggan' => 'required|max:200',
            'alamat_pelanggan' => 'required|max:200',
            'telp_pelanggan' => 'required|max:13',
            'email_pelanggan' => 'required|email|max:100',
        ]);

        $pelanggan = Pelanggan::findOrFail($id_pelanggan);
        $pelanggan->update($request->all());
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil diperbarui.');
    }

    public function destroy($id_pelanggan)
    {
        $pelanggan = Pelanggan::findOrFail($id_pelanggan);
        $pelanggan->delete();
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus.');
    }
}
