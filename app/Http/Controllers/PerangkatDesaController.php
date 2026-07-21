<?php

namespace App\Http\Controllers;

use App\Models\PerangkatDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerangkatDesaController extends Controller
{
    // Jika ada yang tidak sengaja mengakses URL /perangkat, langsung lempar ke dashboard
    public function index()
    {
        return redirect()->route('dashboard');
    }

    public function create()
    {
        return view('perangkat.create');
    }

    public function store(Request $request)
 {
     $request->validate([
         'nama' => 'required',
         'jabatan' => 'required',
         'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
         'tanggal_menjabat' => 'required|date',
         'tanggal_akhir_menjabat' => 'required|date',
     ]);

     $fotoPath = $request->file('foto')->store('foto-perangkat', 'public');

     PerangkatDesa::create([
         'nama' => $request->nama,
         'jabatan' => $request->jabatan,
         'foto' => $fotoPath,
         'tanggal_menjabat' => $request->tanggal_menjabat,
         'tanggal_akhir_menjabat' => $request->tanggal_akhir_menjabat,
     ]);

     return redirect()->route('dashboard')->with('success', 'Data Perangkat Desa berhasil ditambahkan!');
 }  
    public function edit(PerangkatDesa $perangkat)
    {
        return view('perangkat.edit', compact('perangkat'));
    }

    public function update(Request $request, PerangkatDesa $perangkat)
 {
     $request->validate([
         'nama' => 'required',
         'jabatan' => 'required',
         'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
         'tanggal_menjabat' => 'required|date',
         'tanggal_akhir_menjabat' => 'required|date',
     ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            Storage::disk('public')->delete($perangkat->foto);
            $data['foto'] = $request->file('foto')->store('foto-perangkat', 'public');
        }

        $perangkat->update($data);

        // Arahkan kembali ke dashboard
        return redirect()->route('dashboard')->with('success', 'Data Perangkat Desa berhasil diubah!');
    }

    public function destroy(PerangkatDesa $perangkat)
    {
        Storage::disk('public')->delete($perangkat->foto);
        $perangkat->delete();

        // Arahkan kembali ke dashboard
        return redirect()->route('dashboard')->with('success', 'Data Perangkat Desa berhasil dihapus!');
    }
}