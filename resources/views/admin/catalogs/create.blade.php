@extends('layouts.admin')

@section('title', 'Tambah Unit Katalog')
@section('page_title', 'Tambah Katalog')
@section('breadcrumb', 'Tambah Unit Mobil Baru')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

  <div class="bg-white rounded-3xl border border-kt-gray-300/70 shadow-sm p-6 lg:p-8">
    <div class="flex items-center justify-between pb-4 border-b border-kt-gray-200 mb-6">
      <div>
        <h2 class="text-base font-bold font-heading text-kt-dark">Tambah Unit Mobil Listrik</h2>
        <p class="text-xs text-kt-muted mt-0.5">Lengkapi spesifikasi, harga, dan foto produk (maksimal 3 foto).</p>
      </div>
      <a href="{{ route('admin.catalogs.index') }}" class="text-xs font-semibold text-kt-muted hover:text-kt-primary flex items-center gap-1">
        <span class="material-symbols-outlined text-[16px]">arrow_back</span>
        <span>Kembali</span>
      </a>
    </div>

    <form action="{{ route('admin.catalogs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
      @csrf

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Nama Produk -->
        <div>
          <label for="nama_produk" class="block text-xs font-semibold uppercase tracking-wider text-kt-dark mb-1.5">
            Nama Produk / Model <span class="text-kt-danger">*</span>
          </label>
          <input type="text" id="nama_produk" name="nama_produk" value="{{ old('nama_produk') }}" required
                 placeholder="Contoh: BYD Seal Performance"
                 class="w-full px-4 py-3 rounded-xl border border-kt-gray-300 text-sm text-kt-dark focus:border-kt-primary focus:ring-2 focus:ring-kt-primary/20 focus:outline-none transition-all"/>
        </div>

        <!-- Harga OTR Medan -->
        <div>
          <label for="harga" class="block text-xs font-semibold uppercase tracking-wider text-kt-dark mb-1.5">
            Harga OTR Medan (Rp) <span class="text-kt-danger">*</span>
          </label>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-kt-muted font-bold text-xs">Rp</span>
            <input type="number" id="harga" name="harga" value="{{ old('harga') }}" required min="0" step="100000"
                   placeholder="Contoh: 660500000"
                   class="w-full pl-10 pr-4 py-3 rounded-xl border border-kt-gray-300 text-sm text-kt-dark font-semibold focus:border-kt-primary focus:ring-2 focus:ring-kt-primary/20 focus:outline-none transition-all"/>
          </div>
          <span class="text-[11px] text-kt-muted mt-1 block">Masukkan angka tanpa titik atau koma.</span>
        </div>
      </div>

      <!-- Keterangan Produk -->
      <div>
        <label for="keterangan" class="block text-xs font-semibold uppercase tracking-wider text-kt-dark mb-1.5">
          Keterangan &amp; Spesifikasi Produk <span class="text-kt-danger">*</span>
        </label>
        <textarea id="keterangan" name="keterangan" rows="5" required
                  placeholder="Jelaskan keunggulan fitur, kapasitas baterai, jarak tempuh, akselerasi, serta kenyamanan kabin..."
                  class="w-full px-4 py-3 rounded-xl border border-kt-gray-300 text-sm text-kt-dark focus:border-kt-primary focus:ring-2 focus:ring-kt-primary/20 focus:outline-none transition-all">{{ old('keterangan') }}</textarea>
      </div>

      <!-- Upload Foto (Max 3 Foto) -->
      <div>
        <label class="block text-xs font-semibold uppercase tracking-wider text-kt-dark mb-1.5">
          Foto Produk (Maksimal 3 Foto)
        </label>
        <div class="p-4 rounded-2xl border-2 border-dashed border-kt-gray-300 bg-kt-gray-100/50 hover:bg-kt-gray-100 transition-colors">
          <input type="file" id="fotoInput" name="foto[]" multiple accept="image/*"
                 onchange="previewCatalogPhotos(event)"
                 class="block w-full text-xs text-kt-gray-500 file:mr-3 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-kt-primary-light file:text-kt-primary hover:file:bg-kt-primary hover:file:text-white file:cursor-pointer transition-all"/>
          <span class="text-[11px] text-kt-muted mt-2 block">Pilih hingga 3 gambar (JPG, PNG, WEBP, Maks. 5 MB per foto). Foto pertama akan dijadikan foto utama.</span>
        </div>

        <!-- Live Preview Grid -->
        <div id="photoPreviewGrid" class="grid grid-cols-3 gap-3 mt-3 hidden"></div>
      </div>

      <!-- Action Buttons -->
      <div class="pt-6 border-t border-kt-gray-200 flex items-center justify-end gap-3">
        <a href="{{ route('admin.catalogs.index') }}" class="px-5 py-3 rounded-xl border border-kt-gray-300 text-xs font-semibold text-kt-gray-500 hover:bg-kt-gray-100 transition-colors">
          Batal
        </a>
        <button type="submit" class="px-6 py-3 rounded-xl bg-kt-primary hover:bg-kt-primary-active text-white text-xs font-semibold shadow-md shadow-kt-primary/20 flex items-center gap-2 transition-all">
          <span class="material-symbols-outlined text-[18px]">save</span>
          <span>Simpan Unit ke Katalog</span>
        </button>
      </div>
    </form>
  </div>

</div>

<script>
  function previewCatalogPhotos(event) {
    const files = event.target.files;
    const grid = document.getElementById('photoPreviewGrid');
    grid.innerHTML = '';

    if (files && files.length > 0) {
      grid.classList.remove('hidden');
      const count = Math.min(files.length, 3);
      for (let i = 0; i < count; i++) {
        const file = files[i];
        const reader = new FileReader();
        reader.onload = function(e) {
          const div = document.createElement('div');
          div.className = 'relative aspect-[4/3] rounded-xl overflow-hidden border border-kt-gray-300 bg-kt-gray-200 shadow-sm';
          div.innerHTML = `
            <img src="${e.target.result}" class="w-full h-full object-cover"/>
            <span class="absolute top-1 left-1 px-1.5 py-0.5 rounded text-[10px] font-bold bg-kt-dark/80 text-white">Foto ${i + 1}</span>
          `;
          grid.appendChild(div);
        }
        reader.readAsDataURL(file);
      }
    } else {
      grid.classList.add('hidden');
    }
  }
</script>
@endsection
