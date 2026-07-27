<?php

namespace App\Http\Controllers;

use App\Models\PerangkatDesa;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UmkmController extends Controller
{
    public function index()
 {
     // Mengambil semua data UMKM
     $umkms = Umkm::latest()->paginate(
     perPage:5,
     pageName: 'umkm_page'
     );

     // Mengambil semua data Perangkat Desa
     $perangkat = PerangkatDesa::latest()->paginate(
        perPage:5,
        pageName: 'perangkat_page'
     ); 

     // Mengirim kedua data tersebut ke halaman dashboard
     return view('dashboard', compact('umkms', 'perangkat'));
 }

    // Menampilkan form tambah
    public function create()
    {
        return view('umkm.create');
    }

    // Menyimpan data ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_umkm' => 'required',
            'nama_produk' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'alamat_usaha' => 'required',
            'nama_pemilik' => 'required',
            'no_wa' => 'required',
        ]);

        // Upload foto
        $fotoPath = $request->file('foto')->store('foto-umkm', 'public');

        Umkm::create([
            'nama_umkm' => $request->nama_umkm,
            'nama_produk' => $request->nama_produk,
            'foto' => $fotoPath,
            'alamat_usaha' => $request->alamat_usaha,
            'nama_pemilik' => $request->nama_pemilik,
            'no_wa' => $request->no_wa,
        ]);

        return redirect()->route('dashboard')->with('success', 'Data UMKM berhasil ditambahkan!');
    }

    // Menampilkan form edit
    public function edit(Umkm $umkm)
    {
        return view('umkm.edit', compact('umkm'));
    }

    // Mengupdate data
    public function update(Request $request, Umkm $umkm)
    {
        $request->validate([
            'nama_umkm' => 'required',
            'nama_produk' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'alamat_usaha' => 'required',
            'nama_pemilik' => 'required',
            'no_wa' => 'required',
        ]);

        $data = $request->all();

        // Jika user mengupload foto baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama
            Storage::disk('public')->delete($umkm->foto);
            // Simpan foto baru
            $data['foto'] = $request->file('foto')->store('foto-umkm', 'public');
        }

        $umkm->update($data);

        return redirect()->route('dashboard')->with('success', 'Data UMKM berhasil diubah!');
    }

    // Menghapus data
    public function destroy(Umkm $umkm)
    {
        // Hapus file fotonya juga dari server
        Storage::disk('public')->delete($umkm->foto);
        $umkm->delete();

        return redirect()->route('dashboard')->with('success', 'Data UMKM berhasil dihapus!');
    }

    // Method BARU buat halaman katalog publik
   public function halamanumkm()
{
    $umkms = Umkm::all(); // Mengambil semua data UMKM dari database
    return view('umkm', compact('umkms'));
}

}