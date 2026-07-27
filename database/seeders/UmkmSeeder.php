<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Umkm;

class UmkmSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama_umkm'     => 'Warung Bu Sri',
                'nama_produk'   => 'Sayur mayur, bumbu dapur, sembako',
                'foto'          => 'default.jpg',
                'alamat_usaha'  => 'Dusun Krajan RT 02/RW 01',
                'nama_pemilik'  => 'Sri Wahyuni',
                'no_wa'         => '0812-3456-7890',
            ],
            [
                'nama_umkm'     => 'Kripik Singkong Barokah',
                'nama_produk'   => 'Keripik singkong, keripik pisang',
                'foto'          => 'default.jpg',
                'alamat_usaha'  => 'Dusun Sukosari RT 04/RW 02',
                'nama_pemilik'  => 'Suparjo',
                'no_wa'         => '0813-2211-4455',
            ],
            [
                'nama_umkm'     => 'Konveksi Melati',
                'nama_produk'   => 'Baju seragam, jasa jahit',
                'foto'          => 'default.jpg',
                'alamat_usaha'  => 'Dusun Tegalrejo RT 01/RW 03',
                'nama_pemilik'  => 'Melati Kusuma',
                'no_wa'         => '0857-9988-1122',
            ],
            [
                'nama_umkm'     => 'Ternak Lele Makmur',
                'nama_produk'   => 'Bibit lele, lele konsumsi',
                'foto'          => 'default.jpg',
                'alamat_usaha'  => 'Dusun Sumberasri RT 03/RW 01',
                'nama_pemilik'  => 'Bambang Sutrisno',
                'no_wa'         => '0821-3344-5566',
            ],
            [
                'nama_umkm'     => 'Toko Kelontong Jaya',
                'nama_produk'   => 'Sembako, alat tulis, pulsa',
                'foto'          => 'default.jpg',
                'alamat_usaha'  => 'Dusun Krajan RT 05/RW 01',
                'nama_pemilik'  => 'Joko Santoso',
                'no_wa'         => '0878-1234-9900',
            ],
            [
                'nama_umkm'     => 'Batik Sukosongo',
                'nama_produk'   => 'Kain batik tulis, batik cap',
                'foto'          => 'default.jpg',
                'alamat_usaha'  => 'Dusun Sukosari RT 02/RW 02',
                'nama_pemilik'  => 'Ratna Dewi',
                'no_wa'         => '0812-6677-8899',
            ],
        ];

        foreach ($data as $item) {
            Umkm::create($item);
        }
    }
}