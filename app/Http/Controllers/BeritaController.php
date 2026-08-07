<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function publicIndex()
    {
        $berita = Berita::where('status', 'publish')
            ->latest('tanggal_publish')
            ->paginate(6);

        return view('berita', compact('berita'));
    }

    public function terbaru()
    {
        return Berita::where('status', 'publish')
            ->latest('tanggal_publish')
            ->take(3)
            ->get();
    }
    public function show(Berita $berita)
    {
        return view('berita-detail', compact('berita'));
    }
    public function index()
    {
        return redirect()->route('dashboard');
    }

    public function create()
    {
        return view('Berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi_berita' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'penulis' => 'required',
            'status' => 'required|in:draft,publish',
            'tanggal_publish' => 'required|date',
        ]);

        $gambarPath = $request->file('gambar')->store('foto-berita', 'public');

        Berita::create([
            'judul' => $request->judul,
            'isi_berita' => $request->isi_berita,
            'gambar' => $gambarPath,
            'penulis' => $request->penulis,
            'status' => $request->status,
            'tanggal_publish' => $request->tanggal_publish,
        ]);

        return redirect()->route('dashboard')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit(Berita $beritum)
    {
        return view('Berita.edit', compact('beritum'));
    }

    public function update(Request $request, Berita $beritum)
    {
        $request->validate([
            'judul' => 'required',
            'isi_berita' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'penulis' => 'required',
            'status' => 'required|in:draft,publish',
            'tanggal_publish' => 'required|date',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            Storage::disk('public')->delete($beritum->gambar);
            $data['gambar'] = $request->file('gambar')->store('foto-berita', 'public');
        }

        $beritum->update($data);

        return redirect()->route('dashboard')->with('success', 'Berita berhasil diubah!');
    }

    public function destroy(Berita $beritum)
    {
        Storage::disk('public')->delete($beritum->gambar);
        $beritum->delete();

        return redirect()->route('dashboard')->with('success', 'Berita berhasil dihapus!');
    }
}
