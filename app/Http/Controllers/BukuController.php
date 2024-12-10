<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
   
    public function index()
    {
        $buku = Buku::paginate(10);
      
        return view('buku.index', [
            'title' => 'Buku',
            'route' => 'buku',
            'items' => $buku,  
            'headers' => ['ID', 'Nama Buku', 'Jumlah Buku', 'Deskripsi']
        ]);
    }

  
    public function create()
    {
        return view('buku.create', [
            'title' => 'Tambah Buku',
            'route' => 'buku',
            'fields' => [
                'nama_buku' => 'text',
                'jumlah_buku' => 'number',
                'deskripsi_buku' => 'text'
            ],
            'action' => 'Tambah'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_buku' => 'required|max:150',
            'jumlah_buku' => 'required|integer|min:1',
            'deskripsi_buku' => 'nullable|max:100',
        ]);

        Buku::create($request->all());
        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan.');
    }


    public function edit(Buku $buku)
    {
        return view('buku.edit', [
            'title' => 'Edit Buku',
            'route' => 'buku',
            'item' => $buku, 
            'action' => 'Edit'
        ]);
    }


    public function update(Request $request, Buku $buku)
{
    $request->validate([
        'nama_buku' => 'required|max:150',
        'jumlah_buku' => 'required|integer|min:1',
        'deskripsi_buku' => 'nullable|max:100',
    ]);
    $buku->update($request->all());

    return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui.');
}

    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus.');
    }
}
