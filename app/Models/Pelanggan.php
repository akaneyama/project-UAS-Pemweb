<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table = 'pelanggan';

    protected $primaryKey = 'id_pelanggan';

    public $incrementing = true; 
    protected $keyType = 'int';

    protected $fillable = [
        'nama_pelanggan',
        'alamat_pelanggan',
        'telp_pelanggan',
        'email_pelanggan',
    ];
}
