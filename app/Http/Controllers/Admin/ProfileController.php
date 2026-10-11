<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the profile management page (single profile editor).
     */
    public function index(): View
    {
        $profile = Profile::first();

        if (! $profile) {
            $profile = Profile::create([
                'uuid' => (string) Str::uuid(),
                'nama_produk' => 'BYD Arista Cemara Medan',
                'nomor_telepon' => '082368827959',
                'nama_sales' => 'Keldy Sietra',
                'jabatan_sales' => 'Sales Supervisor BYD Medan',
            ]);
        }

        return view('admin.profile.index', compact('profile'));
    }

    /**
     * Update the single profile.
     */
    public function update(Request $request): RedirectResponse
    {
        $profile = Profile::firstOrFail();

        $validated = $request->validate([
            'nama_produk' => ['required', 'string', 'max:255'],
            'nomor_telepon' => ['required', 'string', 'max:50'],
            'foto_hero_section' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
            'keterangan_profil' => ['nullable', 'string'],
            'nama_sales' => ['required', 'string', 'max:100'],
            'jabatan_sales' => ['required', 'string', 'max:100'],
            'jam_operasional' => ['nullable', 'string', 'max:150'],
            'alamat' => ['nullable', 'string'],
            'maps_iframe' => ['nullable', 'string'],
            'ig' => ['nullable', 'string', 'max:100'],
            'tiktok' => ['nullable', 'string', 'max:100'],
            'treads' => ['nullable', 'string', 'max:100'],
        ], [
            'nama_produk.required' => 'Nama produk / bisnis wajib diisi.',
            'nomor_telepon.required' => 'Nomor telepon wajib diisi.',
            'nama_sales.required' => 'Nama sales wajib diisi.',
            'jabatan_sales.required' => 'Jabatan sales wajib diisi.',
            'foto_hero_section.image' => 'File hero section harus berupa gambar.',
            'foto_hero_section.max' => 'Ukuran gambar hero maksimal 5 MB.',
        ]);

        if ($request->hasFile('foto_hero_section')) {
            // Delete old uploaded image if it was in storage
            if ($profile->foto_hero_section && ! Str::startsWith($profile->foto_hero_section, ['http://', 'https://'])) {
                Storage::disk('public')->delete($profile->foto_hero_section);
            }

            $path = $request->file('foto_hero_section')->store('profiles', 'public');
            $profile->foto_hero_section = $path;
        }

        $profile->nama_produk = $validated['nama_produk'];
        $profile->nomor_telepon = $validated['nomor_telepon'];
        $profile->keterangan_profil = $validated['keterangan_profil'];
        $profile->nama_sales = $validated['nama_sales'];
        $profile->jabatan_sales = $validated['jabatan_sales'];
        $profile->jam_operasional = $validated['jam_operasional'];
        $profile->alamat = $validated['alamat'];
        $profile->maps_iframe = $validated['maps_iframe'] ?? null;
        $profile->ig = $validated['ig'];
        $profile->tiktok = $validated['tiktok'];
        $profile->treads = $validated['treads'];

        $profile->save();

        return redirect()->route('admin.profile.index')
            ->with('success', 'Data profil berhasil diperbarui.');
    }
}
