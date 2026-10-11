@extends('layouts.admin')

@section('title', 'Edit Testimoni Pelanggan')
@section('page_title', 'Edit Testimoni')
@section('breadcrumb', 'Edit Testimoni ' . $testimonial->nama_pelanggan)

@section('content')
<div class="max-w-2xl mx-auto space-y-6">

  <div class="bg-white rounded-3xl border border-kt-gray-300/70 shadow-sm p-6 lg:p-8">
    <div class="flex items-center justify-between pb-4 border-b border-kt-gray-200 mb-6">
      <div>
        <h2 class="text-base font-bold font-heading text-kt-dark">Edit Testimoni Pelanggan</h2>
        <p class="text-xs text-kt-muted mt-0.5">Perbarui informasi ulasan atau foto dokumentasi konsumen.</p>
      </div>
      <a href="{{ route('admin.testimonials.index') }}" class="text-xs font-semibold text-kt-muted hover:text-kt-primary flex items-center gap-1">
        <span class="material-symbols-outlined text-[16px]">arrow_back</span>
        <span>Kembali</span>
      </a>
    </div>

    <form action="{{ route('admin.testimonials.update', $testimonial->uuid) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
      @csrf
      @method('PUT')

      <!-- UUID -->
      <div>
        <label class="block text-xs font-semibold uppercase tracking-wider text-kt-dark mb-1.5">UUID Testimoni</label>
        <input type="text" value="{{ $testimonial->uuid }}" readonly
               class="w-full px-4 py-3 rounded-xl border border-kt-gray-300 bg-kt-gray-200/70 text-xs font-mono text-kt-muted cursor-not-allowed"/>
      </div>

      <!-- Nama Pelanggan -->
      <div>
        <label for="nama_pelanggan" class="block text-xs font-semibold uppercase tracking-wider text-kt-dark mb-1.5">
          Nama Pelanggan <span class="text-kt-danger">*</span>
        </label>
        <input type="text" id="nama_pelanggan" name="nama_pelanggan" value="{{ old('nama_pelanggan', $testimonial->nama_pelanggan) }}" required
               class="w-full px-4 py-3 rounded-xl border border-kt-gray-300 text-sm text-kt-dark focus:border-kt-primary focus:ring-2 focus:ring-kt-primary/20 focus:outline-none transition-all"/>
      </div>

      <!-- Keterangan / Ulasan -->
      <div>
        <label for="keterangan" class="block text-xs font-semibold uppercase tracking-wider text-kt-dark mb-1.5">
          Keterangan Ulasan Pelanggan <span class="text-kt-danger">*</span>
        </label>
        <textarea id="keterangan" name="keterangan" rows="4" required
                  class="w-full px-4 py-3 rounded-xl border border-kt-gray-300 text-sm text-kt-dark focus:border-kt-primary focus:ring-2 focus:ring-kt-primary/20 focus:outline-none transition-all">{{ old('keterangan', $testimonial->keterangan) }}</textarea>
      </div>

      <!-- Foto Serah Terima -->
      <div>
        <label class="block text-xs font-semibold uppercase tracking-wider text-kt-dark mb-1.5">
          Foto Serah Terima Konsumen
        </label>
        
        <div class="flex items-center gap-4">
          <div class="w-20 h-20 rounded-2xl overflow-hidden bg-kt-gray-200 border border-kt-gray-300 shadow-inner shrink-0">
            <img id="testiPreview" src="{{ $testimonial->photo_url }}" class="w-full h-full object-cover" alt="Preview"/>
          </div>
          <div class="flex-1">
            <input type="file" name="foto" accept="image/*" onchange="previewTestiImage(event)"
                   class="block w-full text-xs text-kt-gray-500 file:mr-3 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-kt-primary-light file:text-kt-primary hover:file:bg-kt-primary hover:file:text-white file:cursor-pointer transition-all"/>
            <span class="text-[11px] text-kt-muted mt-1 block">Biarkan kosong jika tidak ingin mengganti foto saat ini.</span>
          </div>
        </div>
      </div>

      <!-- Action Buttons -->
      <div class="pt-6 border-t border-kt-gray-200 flex items-center justify-end gap-3">
        <a href="{{ route('admin.testimonials.index') }}" class="px-5 py-3 rounded-xl border border-kt-gray-300 text-xs font-semibold text-kt-gray-500 hover:bg-kt-gray-100 transition-colors">
          Batal
        </a>
        <button type="submit" class="px-6 py-3 rounded-xl bg-kt-primary hover:bg-kt-primary-active text-white text-xs font-semibold shadow-md shadow-kt-primary/20 flex items-center gap-2 transition-all">
          <span class="material-symbols-outlined text-[18px]">save</span>
          <span>Simpan Perubahan Testimoni</span>
        </button>
      </div>
    </form>
  </div>

</div>

<script>
  function previewTestiImage(event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById('testiPreview').src = e.target.result;
      }
      reader.readAsDataURL(file);
    }
  }
</script>
@endsection
