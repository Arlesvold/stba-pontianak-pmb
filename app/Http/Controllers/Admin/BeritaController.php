<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::orderBy('tanggal', 'desc')->paginate(10);

        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul'     => 'required|string|max:255',
            'isi'       => 'required|string',
            'tanggal'   => 'required|date',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data['slug'] = Str::slug($data['judul']) . '-' . time();

        if ($request->hasFile('gambar')) {
            $file     = $request->file('gambar');
            $namaFile = $data['slug'] . '.webp';

            $manager = new ImageManager(new Driver());
            $img = $manager->read($file)->toWebp(80);
            $path = 'images/berita/' . $namaFile;
            Storage::disk('public')->put($path, (string) $img);

            $data['gambar'] = $path;
        }

        Berita::create($data);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(Berita $beritum) // nama default resource: $beritum
    {
        return view('admin.berita.edit', ['berita' => $beritum]);
    }

    public function update(Request $request, Berita $beritum)
    {
        $data = $request->validate([
            'judul'     => 'required|string|max:255',
            'ringkasan' => 'nullable|string',
            'isi'       => 'required|string',
            'tanggal'   => 'required|date',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data['slug'] = Str::slug($data['judul']) . '-' . time();

        if ($request->hasFile('gambar')) {
            if ($beritum->gambar) {
                Storage::disk('public')->delete($beritum->gambar);
            }

            $file     = $request->file('gambar');
            $namaFile = $data['slug'] . '.webp';

            $manager = new ImageManager(new Driver());
            $img = $manager->read($file)->toWebp(80);
            $path = 'images/berita/' . $namaFile;
            Storage::disk('public')->put($path, (string) $img);

            $data['gambar'] = $path;
        }

        $beritum->update($data);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $beritum)
    {
        if ($beritum->gambar) {
            Storage::disk('public')->delete($beritum->gambar);
        }

        $beritum->delete();

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
