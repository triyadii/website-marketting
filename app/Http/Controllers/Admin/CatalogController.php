<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CatalogController extends Controller
{
    /**
     * Display a listing of the catalogs.
     */
    public function index(): View
    {
        $catalogs = Catalog::latest()->paginate(10);

        return view('admin.catalogs.index', compact('catalogs'));
    }

    /**
     * Show the form for creating a new catalog item.
     */
    public function create(): View
    {
        return view('admin.catalogs.create');
    }

    /**
     * Store a newly created catalog item in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama_produk' => ['required', 'string', 'max:150'],
            'harga' => ['required', 'numeric', 'min:0'],
            'keterangan' => ['required', 'string'],
            'foto' => ['nullable', 'array', 'max:3'],
            'foto.*' => ['nullable'],
            'foto_urls' => ['nullable', 'array', 'max:3'],
            'foto_urls.*' => ['string'],
        ], [
            'nama_produk.required' => 'Nama produk wajib diisi.',
            'harga.required' => 'Harga wajib diisi.',
            'harga.numeric' => 'Harga harus berupa angka nominal.',
            'keterangan.required' => 'Keterangan produk wajib diisi.',
            'foto.max' => 'Foto produk maksimal 3 gambar.',
            'foto_urls.max' => 'Foto produk maksimal 3 gambar.',
        ]);

        $photoPaths = [];
        if ($request->hasFile('foto')) {
            $files = array_slice($request->file('foto'), 0, 3);
            foreach ($files as $file) {
                if ($file instanceof UploadedFile) {
                    $photoPaths[] = $file->store('catalogs', 'public');
                }
            }
        } elseif (! empty($validated['foto_urls'])) {
            $photoPaths = array_slice($validated['foto_urls'], 0, 3);
        } elseif (! empty($validated['foto'])) {
            $photoPaths = array_slice($validated['foto'], 0, 3);
        }

        Catalog::create([
            'uuid' => (string) Str::uuid(),
            'nama_produk' => $validated['nama_produk'],
            'harga' => (int) $validated['harga'],
            'keterangan' => $validated['keterangan'],
            'foto' => $photoPaths,
        ]);

        return redirect()->route('admin.catalogs.index')
            ->with('success', 'Produk katalog berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified catalog item.
     */
    public function edit(string $uuid): View
    {
        $catalog = Catalog::where('uuid', $uuid)->firstOrFail();

        return view('admin.catalogs.edit', compact('catalog'));
    }

    /**
     * Update the specified catalog item in storage.
     */
    public function update(Request $request, string $uuid): RedirectResponse
    {
        $catalog = Catalog::where('uuid', $uuid)->firstOrFail();

        $validated = $request->validate([
            'nama_produk' => ['required', 'string', 'max:150'],
            'harga' => ['required', 'numeric', 'min:0'],
            'keterangan' => ['required', 'string'],
            'foto' => ['nullable', 'array', 'max:3'],
            'foto.*' => ['image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
            'keep_existing_photos' => ['nullable', 'boolean'],
        ], [
            'nama_produk.required' => 'Nama produk wajib diisi.',
            'harga.required' => 'Harga wajib diisi.',
            'keterangan.required' => 'Keterangan produk wajib diisi.',
            'foto.max' => 'Foto produk maksimal 3 gambar.',
        ]);

        $currentPhotos = is_array($catalog->foto) ? $catalog->foto : [];

        // If user wants to replace or add photos
        if ($request->hasFile('foto')) {
            // Delete old stored files if replacing
            if (! $request->boolean('keep_existing_photos')) {
                foreach ($currentPhotos as $oldPath) {
                    if ($oldPath && ! Str::startsWith($oldPath, ['http://', 'https://'])) {
                        Storage::disk('public')->delete($oldPath);
                    }
                }
                $currentPhotos = [];
            }

            $files = array_slice($request->file('foto'), 0, 3 - count($currentPhotos));
            foreach ($files as $file) {
                $currentPhotos[] = $file->store('catalogs', 'public');
            }
        }

        $catalog->nama_produk = $validated['nama_produk'];
        $catalog->harga = (int) $validated['harga'];
        $catalog->keterangan = $validated['keterangan'];
        $catalog->foto = array_slice($currentPhotos, 0, 3);
        $catalog->save();

        return redirect()->route('admin.catalogs.index')
            ->with('success', 'Produk katalog berhasil diperbarui.');
    }

    /**
     * Remove the specified catalog item from storage.
     */
    public function destroy(string $uuid): RedirectResponse
    {
        $catalog = Catalog::where('uuid', $uuid)->firstOrFail();

        if (is_array($catalog->foto)) {
            foreach ($catalog->foto as $path) {
                if ($path && ! Str::startsWith($path, ['http://', 'https://'])) {
                    Storage::disk('public')->delete($path);
                }
            }
        }

        $catalog->delete();

        return redirect()->route('admin.catalogs.index')
            ->with('success', 'Produk katalog berhasil dihapus.');
    }
}
