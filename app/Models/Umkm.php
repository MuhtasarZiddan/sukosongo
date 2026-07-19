<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;
    
    protected $table = 'umkms';
    protected $fillable = [
        'nama_umkm', 'nama_produk', 'foto', 'alamat_usaha', 'nama_pemilik', 'no_wa'
    ];
}