@extends('layouts.admin')

@section('title', 'Manajemen Profil')
@section('page_title', 'Manajemen Profil')
@section('breadcrumb', 'Profil Showroom & Sales')

@section('content')
<div class="space-y-6">

  <!-- Notice Banner: Update Saja Jika Sudah Diinput 1 -->
  <div class="p-4 rounded-2xl bg-kt-primary-light border border-kt-primary/20 text-kt-primary flex items-center justify-between gap-4">
    <div class="flex items-center gap-3">
      <span class="material-symbols-outlined text-[24px]">info</span>
      <div class="text-xs">
        <span class="font-bold">Ketentuan Manajemen Profil:</span>
        Sistem menggunakan data profil tunggal (singleton). Data yang telah ada langsung diperbarui di halaman ini.
      </div>
    </div>
    <span class="text-[11px] font-semibold px-2.5 py-1 rounded-full bg-kt-primary text-white">Mode Pembaruan</span>
  </div>

  <!-- Form Card -->
  <div class="bg-white rounded-3xl border border-kt-gray-300/70 shadow-sm p-6 lg:p-8">
    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
      @csrf
      @method('PUT')

      <!-- Section 1: Identitas & UUID -->
      <div>
        <h3 class="text-sm font-bold font-heading text-kt-dark uppercase tracking-wider mb-4 pb-2 border-b border-kt-gray-200 flex items-center gap-2">
          <span class="material-symbols-outlined text-kt-primary text-[20px]">badge</span>
          <span>Identitas Profil & UUID</span>
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <!-- UUID (Readonly) -->
          <div>
            <label class="block text-xs font-semibold text-kt-dark uppercase tracking-wider mb-1.5">UUID Profil (Sistem)</label>
            <input type="text" value="{{ $profile->uuid }}" readonly
                   class="w-full px-4 py-3 rounded-xl border border-kt-gray-300 bg-kt-gray-200/70 text-xs font-mono text-kt-muted cursor-not-allowed"/>
            <span class="text-[11px] text-kt-muted mt-1 block">UUID unik sistem yang dibuat secara otomatis.</span>
          </div>

          <!-- Nama Produk / Bisnis -->
          <div>
            <label for="nama_produk" class="block text-xs font-semibold text-kt-dark uppercase tracking-wider mb-1.5">Nama Produk / Bisnis <span class="text-kt-danger">*</span></label>
            <input type="text" id="nama_produk" name="nama_produk" value="{{ old('nama_produk', $profile->nama_produk) }}" required
                   placeholder="Contoh: BYD Arista Cemara Medan"
                   class="w-full px-4 py-3 rounded-xl border border-kt-gray-300 text-sm text-kt-dark focus:border-kt-primary focus:ring-2 focus:ring-kt-primary/20 focus:outline-none transition-all"/>
          </div>
        </div>
      </div>

      <!-- Section 2: Data Sales & Kontak -->
      <div>
        <h3 class="text-sm font-bold font-heading text-kt-dark uppercase tracking-wider mb-4 pb-2 border-b border-kt-gray-200 flex items-center gap-2">
          <span class="material-symbols-outlined text-kt-primary text-[20px]">person</span>
          <span>Data Sales Representative & Kontak</span>
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <!-- Nama Sales -->
          <div>
            <label for="nama_sales" class="block text-xs font-semibold text-kt-dark uppercase tracking-wider mb-1.5">Nama Sales <span class="text-kt-danger">*</span></label>
            <input type="text" id="nama_sales" name="nama_sales" value="{{ old('nama_sales', $profile->nama_sales) }}" required
                   placeholder="Contoh: Keldy Sietra"
                   class="w-full px-4 py-3 rounded-xl border border-kt-gray-300 text-sm text-kt-dark focus:border-kt-primary focus:ring-2 focus:ring-kt-primary/20 focus:outline-none transition-all"/>
          </div>

          <!-- Jabatan Sales -->
          <div>
            <label for="jabatan_sales" class="block text-xs font-semibold text-kt-dark uppercase tracking-wider mb-1.5">Jabatan Sales <span class="text-kt-danger">*</span></label>
            <input type="text" id="jabatan_sales" name="jabatan_sales" value="{{ old('jabatan_sales', $profile->jabatan_sales) }}" required
                   placeholder="Contoh: Sales Supervisor BYD Medan"
                   class="w-full px-4 py-3 rounded-xl border border-kt-gray-300 text-sm text-kt-dark focus:border-kt-primary focus:ring-2 focus:ring-kt-primary/20 focus:outline-none transition-all"/>
          </div>

          <!-- Nomor Telepon / WhatsApp -->
          <div>
            <label for="nomor_telepon" class="block text-xs font-semibold text-kt-dark uppercase tracking-wider mb-1.5">Nomor Telepon / WhatsApp <span class="text-kt-danger">*</span></label>
            <input type="text" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon', $profile->nomor_telepon) }}" required
                   placeholder="Contoh: 082368827959"
                   class="w-full px-4 py-3 rounded-xl border border-kt-gray-300 text-sm text-kt-dark focus:border-kt-primary focus:ring-2 focus:ring-kt-primary/20 focus:outline-none transition-all"/>
          </div>
        </div>
      </div>

      <!-- Section 3: Foto Hero Section & Keterangan Profil -->
      <div>
        <h3 class="text-sm font-bold font-heading text-kt-dark uppercase tracking-wider mb-4 pb-2 border-b border-kt-gray-200 flex items-center gap-2">
          <span class="material-symbols-outlined text-kt-primary text-[20px]">image</span>
          <span>Foto Hero Section & Deskripsi Profil</span>
        </h3>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
          
          <!-- Foto Hero Section Upload & Preview (5 Cols) -->
          <div class="lg:col-span-5 space-y-3">
            <label class="block text-xs font-semibold text-kt-dark uppercase tracking-wider">Foto Hero Section</label>
            
            <div class="relative aspect-video rounded-2xl overflow-hidden bg-kt-gray-200 border border-kt-gray-300 shadow-inner group">
              <img id="heroPreview" src="{{ $profile->hero_photo_url }}" alt="Hero Preview" class="w-full h-full object-cover"/>
            </div>

            <div>
              <input type="file" id="foto_hero_section" name="foto_hero_section" accept="image/*"
                     onchange="previewHeroImage(event)"
                     class="block w-full text-xs text-kt-gray-500 file:mr-3 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-kt-primary-light file:text-kt-primary hover:file:bg-kt-primary hover:file:text-white file:cursor-pointer transition-all"/>
              <span class="text-[11px] text-kt-muted mt-1 block">Format: JPG, PNG, WEBP (Maksimal 5 MB). Biarkan kosong jika tidak ingin mengubah foto.</span>
            </div>
          </div>

          <!-- Keterangan Profil & Alamat (7 Cols) -->
          <div class="lg:col-span-7 space-y-5">
            <div>
              <label for="keterangan_profil" class="block text-xs font-semibold text-kt-dark uppercase tracking-wider mb-1.5">Keterangan Profil</label>
              <textarea id="keterangan_profil" name="keterangan_profil" rows="4"
                        placeholder="Deskripsi profil showroom dan penawaran..."
                        class="w-full px-4 py-3 rounded-xl border border-kt-gray-300 text-sm text-kt-dark focus:border-kt-primary focus:ring-2 focus:ring-kt-primary/20 focus:outline-none transition-all">{{ old('keterangan_profil', $profile->keterangan_profil) }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <label for="jam_operasional" class="block text-xs font-semibold text-kt-dark uppercase tracking-wider mb-1.5">Jam Operasional</label>
                <input type="text" id="jam_operasional" name="jam_operasional" value="{{ old('jam_operasional', $profile->jam_operasional) }}"
                       placeholder="Senin - Minggu: 08.30 - 18.00 WIB"
                       class="w-full px-4 py-3 rounded-xl border border-kt-gray-300 text-sm text-kt-dark focus:border-kt-primary focus:ring-2 focus:ring-kt-primary/20 focus:outline-none transition-all"/>
              </div>

              <div>
                <label for="alamat" class="block text-xs font-semibold text-kt-dark uppercase tracking-wider mb-1.5">Alamat Lengkap</label>
                <input type="text" id="alamat" name="alamat" value="{{ old('alamat', $profile->alamat) }}"
                       placeholder="Jl. Cemara No. 198, Medan"
                       class="w-full px-4 py-3 rounded-xl border border-kt-gray-300 text-sm text-kt-dark focus:border-kt-primary focus:ring-2 focus:ring-kt-primary/20 focus:outline-none transition-all"/>
              </div>
            </div>
          </div>

        </div>
      </div>

      <!-- Section: Lokasi & Google Maps Iframe Embed -->
      <div>
        <h3 class="text-sm font-bold font-heading text-kt-dark uppercase tracking-wider mb-4 pb-2 border-b border-kt-gray-200 flex items-center justify-between">
          <div class="flex items-center gap-2">
            <span class="material-symbols-outlined text-kt-primary text-[20px]">map</span>
            <span>Lokasi Showroom & Google Maps Embed</span>
          </div>
          <span class="text-[11px] text-kt-muted normal-case font-normal">Salin dari "Bagikan &rarr; Sematkan peta" di Google Maps</span>
        </h3>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
          <!-- Textarea Input (6 Cols) -->
          <div class="lg:col-span-6 space-y-3">
            <div>
              <label for="maps_iframe" class="block text-xs font-semibold text-kt-dark uppercase tracking-wider mb-1.5">
                Kode Iframe Google Maps / Embed URL
              </label>
              <textarea id="maps_iframe" name="maps_iframe" rows="6"
                        placeholder='Tempelkan kode embed Google Maps, contoh: <iframe src="https://www.google.com/maps/embed?..." ...></iframe>'
                        class="w-full px-4 py-3 rounded-xl border border-kt-gray-300 font-mono text-xs text-kt-dark focus:border-kt-primary focus:ring-2 focus:ring-kt-primary/20 focus:outline-none transition-all">{{ old('maps_iframe', $profile->maps_iframe) }}</textarea>
              <div class="mt-2 p-3 rounded-xl bg-kt-gray-200/60 text-xs text-kt-muted space-y-1">
                <div class="font-semibold text-kt-dark flex items-center gap-1.5">
                  <span class="material-symbols-outlined text-[16px] text-kt-primary">help</span>
                  <span>Cara Mendapatkan Kode Embed:</span>
                </div>
                <ol class="list-decimal list-inside pl-1 space-y-0.5 text-[11px]">
                  <li>Buka lokasi showroom di <a href="https://maps.google.com" target="_blank" class="text-kt-primary underline font-medium">Google Maps</a></li>
                  <li>Klik tombol <b>Bagikan (Share)</b> &rarr; Pilih tab <b>Sematkan peta (Embed a map)</b></li>
                  <li>Klik <b>Salin HTML (Copy HTML)</b> lalu tempelkan di kotak di atas.</li>
                </ol>
              </div>
            </div>
          </div>

          <!-- Live Preview (6 Cols) -->
          <div class="lg:col-span-6 space-y-2">
            <label class="block text-xs font-semibold text-kt-dark uppercase tracking-wider mb-1.5">
              Pratinjau Peta Google Maps Saat Ini
            </label>
            <div class="w-full h-64 rounded-2xl overflow-hidden border border-kt-gray-300 bg-kt-gray-200 shadow-inner relative flex items-center justify-center">
              {!! $profile->maps_embed_html !!}
            </div>
            <span class="text-[11px] text-kt-muted block text-right">Peta ini yang tampil di beranda bagian Lokasi Showroom.</span>
          </div>
        </div>
      </div>

      <!-- Section 4: Media Sosial (IG, TikTok, Threads) -->
      <div>
        <h3 class="text-sm font-bold font-heading text-kt-dark uppercase tracking-wider mb-4 pb-2 border-b border-kt-gray-200 flex items-center gap-2">
          <span class="material-symbols-outlined text-kt-primary text-[20px]">share</span>
          <span>Akun Media Sosial</span>
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <!-- Instagram -->
          <div>
            <label for="ig" class="block text-xs font-semibold text-kt-dark uppercase tracking-wider mb-1.5">Instagram</label>
            <div class="relative">
              <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-kt-muted text-xs">@</span>
              <input type="text" id="ig" name="ig" value="{{ old('ig', $profile->ig) }}"
                     placeholder="bydaristamedan"
                     class="w-full pl-8 pr-4 py-3 rounded-xl border border-kt-gray-300 text-sm text-kt-dark focus:border-kt-primary focus:ring-2 focus:ring-kt-primary/20 focus:outline-none transition-all"/>
            </div>
          </div>

          <!-- TikTok -->
          <div>
            <label for="tiktok" class="block text-xs font-semibold text-kt-dark uppercase tracking-wider mb-1.5">TikTok</label>
            <div class="relative">
              <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-kt-muted text-xs">@</span>
              <input type="text" id="tiktok" name="tiktok" value="{{ old('tiktok', $profile->tiktok) }}"
                     placeholder="bydmedan.official"
                     class="w-full pl-8 pr-4 py-3 rounded-xl border border-kt-gray-300 text-sm text-kt-dark focus:border-kt-primary focus:ring-2 focus:ring-kt-primary/20 focus:outline-none transition-all"/>
            </div>
          </div>

          <!-- Threads -->
          <div>
            <label for="treads" class="block text-xs font-semibold text-kt-dark uppercase tracking-wider mb-1.5">Threads</label>
            <div class="relative">
              <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-kt-muted text-xs">@</span>
              <input type="text" id="treads" name="treads" value="{{ old('treads', $profile->treads) }}"
                     placeholder="bydaristamedan"
                     class="w-full pl-8 pr-4 py-3 rounded-xl border border-kt-gray-300 text-sm text-kt-dark focus:border-kt-primary focus:ring-2 focus:ring-kt-primary/20 focus:outline-none transition-all"/>
            </div>
          </div>
        </div>
      </div>

      <!-- Action Button -->
      <div class="pt-6 border-t border-kt-gray-200 flex items-center justify-end gap-3">
        <a href="{{ route('admin.dashboard') }}" class="px-5 py-3 rounded-xl border border-kt-gray-300 text-xs font-semibold text-kt-gray-500 hover:bg-kt-gray-100 transition-colors">
          Batal
        </a>
        <button type="submit" class="px-6 py-3 rounded-xl bg-kt-primary hover:bg-kt-primary-active text-white text-xs font-semibold shadow-md shadow-kt-primary/20 flex items-center gap-2 transition-all">
          <span class="material-symbols-outlined text-[18px]">save</span>
          <span>Simpan Perubahan Profil</span>
        </button>
      </div>
    </form>
  </div>

</div>

<script>
  function previewHeroImage(event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById('heroPreview').src = e.target.result;
      }
      reader.readAsDataURL(file);
    }
  }
</script>
@endsection
