<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi'; 

    protected $primaryKey = 'id_transaksi'; 

    public $incrementing = true; 
    protected $keyType = 'int'; 

    protected $fillable = [
        'id_pelanggan',
        'id_buku',
        'tanggal_transaksi',
    ];

    /**
     * Relasi ke model Pelanggan
     */
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id_pelanggan');
    }

    /**
     * Relasi ke model Buku
     */
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku', 'id_buku');
    }
}
