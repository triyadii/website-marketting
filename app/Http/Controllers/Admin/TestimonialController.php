<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    /**
     * Display a listing of testimonials.
     */
    public function index(): View
    {
        $testimonials = Testimonial::latest()->paginate(10);

        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new testimonial.
     */
    public function create(): View
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created testimonial in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama_pelanggan' => ['required', 'string', 'max:150'],
            'keterangan' => ['required', 'string'],
            'foto' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
        ], [
            'nama_pelanggan.required' => 'Nama pelanggan wajib diisi.',
            'keterangan.required' => 'Keterangan ulasan / testimoni wajib diisi.',
            'foto.image' => 'File foto harus berupa gambar.',
            'foto.max' => 'Ukuran foto maksimal 5 MB.',
        ]);

        $photoPath = null;
        if ($request->hasFile('foto')) {
            $photoPath = $request->file('foto')->store('testimonials', 'public');
        }

        Testimonial::create([
            'uuid' => (string) Str::uuid(),
            'nama_pelanggan' => $validated['nama_pelanggan'],
            'keterangan' => $validated['keterangan'],
            'foto' => $photoPath,
        ]);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimoni konsumen berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified testimonial.
     */
    public function edit(string $uuid): View
    {
        $testimonial = Testimonial::where('uuid', $uuid)->firstOrFail();

        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified testimonial in storage.
     */
    public function update(Request $request, string $uuid): RedirectResponse
    {
        $testimonial = Testimonial::where('uuid', $uuid)->firstOrFail();

        $validated = $request->validate([
            'nama_pelanggan' => ['required', 'string', 'max:150'],
            'keterangan' => ['required', 'string'],
            'foto' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
        ], [
            'nama_pelanggan.required' => 'Nama pelanggan wajib diisi.',
            'keterangan.required' => 'Keterangan testimoni wajib diisi.',
        ]);

        if ($request->hasFile('foto')) {
            if ($testimonial->foto && ! Str::startsWith($testimonial->foto, ['http://', 'https://', '/images/'])) {
                Storage::disk('public')->delete($testimonial->foto);
            }
            $testimonial->foto = $request->file('foto')->store('testimonials', 'public');
        }

        $testimonial->nama_pelanggan = $validated['nama_pelanggan'];
        $testimonial->keterangan = $validated['keterangan'];
        $testimonial->save();

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimoni konsumen berhasil diperbarui.');
    }

    /**
     * Remove the specified testimonial from storage.
     */
    public function destroy(string $uuid): RedirectResponse
    {
        $testimonial = Testimonial::where('uuid', $uuid)->firstOrFail();

        if ($testimonial->foto && ! Str::startsWith($testimonial->foto, ['http://', 'https://', '/images/'])) {
            Storage::disk('public')->delete($testimonial->foto);
        }

        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimoni berhasil dihapus.');
    }
}
