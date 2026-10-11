@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard Ringkasan')
@section('breadcrumb', 'Dashboard')

@section('content')
<div class="space-y-6">

  <!-- TOP WELCOME BANNER (METRONIC STYLE) -->
  <div class="bg-gradient-to-r from-kt-aside via-[#2a2a3e] to-kt-aside text-white p-6 lg:p-8 rounded-3xl shadow-md border border-white/5 relative overflow-hidden flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
    <div class="absolute -right-10 -bottom-10 w-60 h-60 bg-kt-primary/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="space-y-1.5 z-10">
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 text-kt-primary text-xs font-semibold">
        <span class="w-2 h-2 rounded-full bg-kt-success animate-pulse"></span>
        <span>Sistem Aktif & Terhubung</span>
      </div>
      <h2 class="text-xl lg:text-2xl font-bold font-heading text-white">Selamat Datang di Panel Manajemen BYD Medan</h2>
      <p class="text-xs lg:text-sm text-white/70 max-w-xl">
        Kelola profil showroom resmi, katalog mobil listrik, testimoni kepuasan pelanggan, dan akun pengguna dengan mudah.
      </p>
    </div>
    <div class="flex items-center gap-3 shrink-0 z-10">
      <a href="{{ route('admin.catalogs.create') }}" class="px-4 py-2.5 rounded-xl bg-kt-primary hover:bg-kt-primary-active text-white text-xs font-semibold shadow-md flex items-center gap-2 transition-all">
        <span class="material-symbols-outlined text-[18px]">add</span>
        <span>Tambah Mobil</span>
      </a>
      <a href="{{ route('admin.profile.index') }}" class="px-4 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 text-white text-xs font-semibold border border-white/10 flex items-center gap-2 transition-all">
        <span class="material-symbols-outlined text-[18px]">settings</span>
        <span>Edit Profil</span>
      </a>
    </div>
  </div>

  <!-- STAT METRICS WIDGETS -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
    
    <!-- Widget 1: Katalog Produk -->
    <a href="{{ route('admin.catalogs.index') }}" class="bg-white p-6 rounded-2xl border border-kt-gray-300/70 shadow-sm hover:shadow-md transition-all group">
      <div class="flex items-center justify-between mb-4">
        <div class="w-12 h-12 rounded-xl bg-kt-primary-light text-kt-primary flex items-center justify-center group-hover:scale-110 transition-transform">
          <span class="material-symbols-outlined text-[24px]">directions_car</span>
        </div>
        <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-kt-primary-light text-kt-primary">Katalog</span>
      </div>
      <div class="text-2xl font-bold font-heading text-kt-dark">{{ $totalCatalogs }}</div>
      <div class="text-xs text-kt-muted mt-1">Total Unit Mobil Aktif</div>
    </a>

    <!-- Widget 2: Testimoni Konsumen -->
    <a href="{{ route('admin.testimonials.index') }}" class="bg-white p-6 rounded-2xl border border-kt-gray-300/70 shadow-sm hover:shadow-md transition-all group">
      <div class="flex items-center justify-between mb-4">
        <div class="w-12 h-12 rounded-xl bg-kt-success-light text-kt-success flex items-center justify-center group-hover:scale-110 transition-transform">
          <span class="material-symbols-outlined text-[24px]">reviews</span>
        </div>
        <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-kt-success-light text-kt-success">Ulasan</span>
      </div>
      <div class="text-2xl font-bold font-heading text-kt-dark">{{ $totalTestimonials }}</div>
      <div class="text-xs text-kt-muted mt-1">Testimoni Serah Terima</div>
    </a>

    <!-- Widget 3: Akun Pengguna -->
    <a href="{{ route('admin.accounts.index') }}" class="bg-white p-6 rounded-2xl border border-kt-gray-300/70 shadow-sm hover:shadow-md transition-all group">
      <div class="flex items-center justify-between mb-4">
        <div class="w-12 h-12 rounded-xl bg-kt-info-light text-kt-info flex items-center justify-center group-hover:scale-110 transition-transform">
          <span class="material-symbols-outlined text-[24px]">group</span>
        </div>
        <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-kt-info-light text-kt-info">Admin</span>
      </div>
      <div class="text-2xl font-bold font-heading text-kt-dark">{{ $totalUsers }}</div>
      <div class="text-xs text-kt-muted mt-1">Akun Administrator</div>
    </a>

    <!-- Widget 4: Profil Showroom -->
    <a href="{{ route('admin.profile.index') }}" class="bg-white p-6 rounded-2xl border border-kt-gray-300/70 shadow-sm hover:shadow-md transition-all group">
      <div class="flex items-center justify-between mb-4">
        <div class="w-12 h-12 rounded-xl bg-kt-warning-light text-kt-warning flex items-center justify-center group-hover:scale-110 transition-transform">
          <span class="material-symbols-outlined text-[24px]">storefront</span>
        </div>
        <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-kt-warning-light text-kt-warning">Profil</span>
      </div>
      <div class="text-base font-bold text-kt-dark truncate">{{ $profile->nama_sales ?? 'Keldy Sietra' }}</div>
      <div class="text-xs text-kt-muted mt-1 truncate">{{ $profile->jabatan_sales ?? 'Sales Supervisor' }}</div>
    </a>

  </div>

  <!-- TWO COLUMN DATA SECTION -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

    <!-- Left: Recent Catalogs (8 Cols) -->
    <div class="lg:col-span-8 bg-white rounded-2xl border border-kt-gray-300/70 shadow-sm p-6 flex flex-col justify-between">
      <div>
        <div class="flex items-center justify-between pb-4 border-b border-kt-gray-200">
          <div class="flex items-center gap-2.5">
            <span class="material-symbols-outlined text-kt-primary text-[22px]">directions_car</span>
            <h3 class="text-sm font-bold text-kt-dark">Katalog Mobil Listrik Terbaru</h3>
          </div>
          <a href="{{ route('admin.catalogs.index') }}" class="text-xs font-semibold text-kt-primary hover:underline">
            Lihat Semua &rarr;
          </a>
        </div>

        <div class="divide-y divide-kt-gray-200 mt-2">
          @forelse ($recentCatalogs as $item)
            <div class="py-3.5 flex items-center justify-between gap-4">
              <div class="flex items-center gap-3 min-w-0">
                <img src="{{ $item->first_photo_url }}" alt="{{ $item->nama_produk }}" class="w-12 h-9 rounded-lg object-cover bg-kt-gray-200 shrink-0 border border-kt-gray-200"/>
                <div class="min-w-0">
                  <a href="{{ route('admin.catalogs.edit', $item->uuid) }}" class="text-sm font-bold text-kt-dark hover:text-kt-primary transition-colors block truncate">
                    {{ $item->nama_produk }}
                  </a>
                  <span class="text-xs text-kt-muted font-medium">{{ $item->formatted_harga }}</span>
                </div>
              </div>
              <div class="flex items-center gap-2 shrink-0">
                <a href="{{ route('katalog.detail', $item->slug) }}" target="_blank" class="p-1.5 rounded-lg text-kt-gray-500 hover:text-kt-primary hover:bg-kt-primary-light transition-colors" title="Lihat Halaman Detail User">
                  <span class="material-symbols-outlined text-[18px]">visibility</span>
                </a>
                <a href="{{ route('admin.catalogs.edit', $item->uuid) }}" class="p-1.5 rounded-lg text-kt-gray-500 hover:text-kt-primary hover:bg-kt-primary-light transition-colors" title="Edit">
                  <span class="material-symbols-outlined text-[18px]">edit</span>
                </a>
              </div>
            </div>
          @empty
            <div class="py-8 text-center text-xs text-kt-muted">Belum ada data katalog.</div>
          @endforelse
        </div>
      </div>

      <div class="pt-4 border-t border-kt-gray-200 mt-4 flex items-center justify-between text-xs">
        <span class="text-kt-muted">Menampilkan {{ $recentCatalogs->count() }} unit teratas</span>
        <a href="{{ route('admin.catalogs.create') }}" class="text-kt-primary font-semibold hover:underline">
          + Tambah Unit Baru
        </a>
      </div>
    </div>

    <!-- Right: Profile & Contact Summary (4 Cols) -->
    <div class="lg:col-span-4 space-y-6">

      <!-- Showroom Profile Summary Card -->
      <div class="bg-white rounded-2xl border border-kt-gray-300/70 shadow-sm p-6">
        <div class="flex items-center justify-between pb-3 border-b border-kt-gray-200 mb-4">
          <h3 class="text-sm font-bold text-kt-dark">Profil Sales & Showroom</h3>
          <a href="{{ route('admin.profile.index') }}" class="text-xs font-semibold text-kt-primary hover:underline">Edit</a>
        </div>

        <div class="space-y-3.5 text-xs">
          <div>
            <span class="text-kt-muted block text-[11px] uppercase tracking-wider font-semibold">Nama Produk / Bisnis</span>
            <span class="font-bold text-kt-dark text-sm">{{ $profile->nama_produk ?? 'BYD Arista Cemara Medan' }}</span>
          </div>

          <div>
            <span class="text-kt-muted block text-[11px] uppercase tracking-wider font-semibold">Sales Supervisor</span>
            <span class="font-semibold text-kt-dark">{{ $profile->nama_sales ?? 'Keldy Sietra' }} ({{ $profile->jabatan_sales ?? 'Sales Supervisor' }})</span>
          </div>

          <div>
            <span class="text-kt-muted block text-[11px] uppercase tracking-wider font-semibold">Nomor WhatsApp / Telepon</span>
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $profile->nomor_telepon ?? '082368827959') }}" target="_blank" class="font-bold text-kt-success hover:underline flex items-center gap-1 mt-0.5">
              <span class="material-symbols-outlined text-[16px]">chat</span>
              <span>{{ $profile->nomor_telepon ?? '082368827959' }}</span>
            </a>
          </div>

          <div>
            <span class="text-kt-muted block text-[11px] uppercase tracking-wider font-semibold">Jam Operasional</span>
            <span class="text-kt-dark">{{ $profile->jam_operasional ?? 'Senin - Minggu: 08.30 - 18.00 WIB' }}</span>
          </div>

          <div class="pt-2 border-t border-kt-gray-200">
            <span class="text-kt-muted block text-[11px] uppercase tracking-wider font-semibold">Alamat Dealer</span>
            <span class="text-kt-dark leading-relaxed">{{ $profile->alamat ?? 'Jl. Cemara No. 198, Medan' }}</span>
          </div>
        </div>
      </div>

      <!-- Quick System Info -->
      <div class="bg-white rounded-2xl border border-kt-gray-300/70 shadow-sm p-5 space-y-3 text-xs">
        <div class="font-bold text-kt-dark flex items-center gap-2">
          <span class="material-symbols-outlined text-kt-primary text-[18px]">verified</span>
          <span>Status SEO & Indexing</span>
        </div>
        <p class="text-kt-muted leading-relaxed">
          Sitemap XML otomatis diperbarui untuk Google & Bing. Semua halaman produk memiliki meta OpenGraph lengkap.
        </p>
        <div class="flex items-center gap-2 pt-1">
          <a href="{{ route('sitemap') }}" target="_blank" class="text-kt-primary font-semibold hover:underline">Lihat Sitemap XML &rarr;</a>
        </div>
      </div>

    </div>

  </div>

</div>
@endsection
