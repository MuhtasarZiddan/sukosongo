<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'isi_berita',
        'gambar',
        'penulis',
        'status',
        'tanggal_publish'
    ];

    protected $casts = [
        'tanggal_publish' => 'datetime',
    ];
}
