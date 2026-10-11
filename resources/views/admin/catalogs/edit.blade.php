@extends('layouts.admin')

@section('title', 'Edit Unit Katalog')
@section('page_title', 'Edit Katalog')
@section('breadcrumb', 'Edit Unit ' . $catalog->nama_produk)

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

  <div class="bg-white rounded-3xl border border-kt-gray-300/70 shadow-sm p-6 lg:p-8">
    <div class="flex items-center justify-between pb-4 border-b border-kt-gray-200 mb-6">
      <div>
        <h2 class="text-base font-bold font-heading text-kt-dark">Edit Unit {{ $catalog->nama_produk }}</h2>
        <p class="text-xs text-kt-muted mt-0.5">Perbarui harga, keterangan, dan foto produk.</p>
      </div>
      <div class="flex items-center gap-3">
        <a href="{{ route('katalog.detail', $catalog->slug) }}" target="_blank" class="text-xs font-semibold text-kt-primary hover:underline flex items-center gap-1">
          <span class="material-symbols-outlined text-[16px]">visibility</span>
          <span>Lihat di Web</span>
        </a>
        <a href="{{ route('admin.catalogs.index') }}" class="text-xs font-semibold text-kt-muted hover:text-kt-primary flex items-center gap-1">
          <span class="material-symbols-outlined text-[16px]">arrow_back</span>
          <span>Kembali</span>
        </a>
      </div>
    </div>

    <form action="{{ route('admin.catalogs.update', $catalog->uuid) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
      @csrf
      @method('PUT')

      <!-- UUID & Slug Info Row -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4 rounded-2xl bg-kt-gray-100/70 border border-kt-gray-200 text-xs">
        <div>
          <span class="text-kt-muted block text-[11px] uppercase tracking-wider font-semibold">UUID Produk</span>
          <span class="font-mono text-kt-dark">{{ $catalog->uuid }}</span>
        </div>
        <div>
          <span class="text-kt-muted block text-[11px] uppercase tracking-wider font-semibold">Slug URL Halaman Detail</span>
          <span class="font-mono text-kt-primary font-bold">/katalog/{{ $catalog->slug }}</span>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Nama Produk -->
        <div>
          <label for="nama_produk" class="block text-xs font-semibold uppercase tracking-wider text-kt-dark mb-1.5">
            Nama Produk / Model <span class="text-kt-danger">*</span>
          </label>
          <input type="text" id="nama_produk" name="nama_produk" value="{{ old('nama_produk', $catalog->nama_produk) }}" required
                 class="w-full px-4 py-3 rounded-xl border border-kt-gray-300 text-sm text-kt-dark focus:border-kt-primary focus:ring-2 focus:ring-kt-primary/20 focus:outline-none transition-all"/>
        </div>

        <!-- Harga OTR Medan -->
        <div>
          <label for="harga" class="block text-xs font-semibold uppercase tracking-wider text-kt-dark mb-1.5">
            Harga OTR Medan (Rp) <span class="text-kt-danger">*</span>
          </label>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-kt-muted font-bold text-xs">Rp</span>
            <input type="number" id="harga" name="harga" value="{{ old('harga', $catalog->harga) }}" required min="0" step="100000"
                   class="w-full pl-10 pr-4 py-3 rounded-xl border border-kt-gray-300 text-sm text-kt-dark font-semibold focus:border-kt-primary focus:ring-2 focus:ring-kt-primary/20 focus:outline-none transition-all"/>
          </div>
        </div>
      </div>

      <!-- Keterangan Produk -->
      <div>
        <label for="keterangan" class="block text-xs font-semibold uppercase tracking-wider text-kt-dark mb-1.5">
          Keterangan &amp; Spesifikasi Produk <span class="text-kt-danger">*</span>
        </label>
        <textarea id="keterangan" name="keterangan" rows="5" required
                  class="w-full px-4 py-3 rounded-xl border border-kt-gray-300 text-sm text-kt-dark focus:border-kt-primary focus:ring-2 focus:ring-kt-primary/20 focus:outline-none transition-all">{{ old('keterangan', $catalog->keterangan) }}</textarea>
      </div>

      <!-- Foto yang Ada Saat Ini (Max 3) -->
      <div>
        <label class="block text-xs font-semibold uppercase tracking-wider text-kt-dark mb-2">
          Foto Produk Saat Ini ({{ count($catalog->photo_urls) }}/3 Foto)
        </label>
        @if (count($catalog->photo_urls) > 0)
          <div class="grid grid-cols-3 gap-3">
            @foreach ($catalog->photo_urls as $idx => $photoUrl)
              <div class="relative aspect-[4/3] rounded-xl overflow-hidden border border-kt-gray-300 bg-kt-gray-200 shadow-sm">
                <img src="{{ $photoUrl }}" class="w-full h-full object-cover" alt="Foto {{ $idx + 1 }}"/>
                <span class="absolute top-1 left-1 px-1.5 py-0.5 rounded text-[10px] font-bold bg-kt-dark/80 text-white">Foto {{ $idx + 1 }}</span>
              </div>
            @endforeach
          </div>
        @else
          <div class="p-4 rounded-xl bg-kt-gray-100 text-xs text-kt-muted text-center">Belum ada foto yang diunggah.</div>
        @endif
      </div>

      <!-- Upload Foto Baru -->
      <div>
        <label class="block text-xs font-semibold uppercase tracking-wider text-kt-dark mb-1.5">
          Unggah Foto Pengganti / Baru (Maksimal 3 Foto)
        </label>
        <div class="p-4 rounded-2xl border-2 border-dashed border-kt-gray-300 bg-kt-gray-100/50 hover:bg-kt-gray-100 transition-colors space-y-2">
          <input type="file" id="fotoInput" name="foto[]" multiple accept="image/*"
                 class="block w-full text-xs text-kt-gray-500 file:mr-3 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-kt-primary-light file:text-kt-primary hover:file:bg-kt-primary hover:file:text-white file:cursor-pointer transition-all"/>
          
          <label class="flex items-center gap-2 cursor-pointer pt-2 select-none text-xs">
            <input type="checkbox" name="keep_existing_photos" value="1" class="w-4 h-4 rounded text-kt-primary border-kt-gray-300"/>
            <span class="text-kt-muted">Pertahankan foto yang sudah ada (tambahkan foto baru jika belum mencapai 3).</span>
          </label>
        </div>
      </div>

      <!-- Action Buttons -->
      <div class="pt-6 border-t border-kt-gray-200 flex items-center justify-end gap-3">
        <a href="{{ route('admin.catalogs.index') }}" class="px-5 py-3 rounded-xl border border-kt-gray-300 text-xs font-semibold text-kt-gray-500 hover:bg-kt-gray-100 transition-colors">
          Batal
        </a>
        <button type="submit" class="px-6 py-3 rounded-xl bg-kt-primary hover:bg-kt-primary-active text-white text-xs font-semibold shadow-md shadow-kt-primary/20 flex items-center gap-2 transition-all">
          <span class="material-symbols-outlined text-[18px]">save</span>
          <span>Simpan Perubahan Katalog</span>
        </button>
      </div>
    </form>
  </div>

</div>
@endsection
