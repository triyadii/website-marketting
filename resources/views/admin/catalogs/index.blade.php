@extends('layouts.admin')

@section('title', 'Manajemen Katalog')
@section('page_title', 'Manajemen Katalog')
@section('breadcrumb', 'Daftar Mobil Listrik')

@section('content')
<div class="space-y-6">

  <!-- Header Action Card -->
  <div class="bg-white rounded-3xl border border-kt-gray-300/70 shadow-sm p-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
    <div>
      <h2 class="text-base font-bold font-heading text-kt-dark">Katalog Mobil Listrik BYD</h2>
      <p class="text-xs text-kt-muted mt-0.5">Kelola daftar kendaraan, harga OTR Medan, spesifikasi, dan foto (maksimal 3 foto per produk).</p>
    </div>
    <a href="{{ route('admin.catalogs.create') }}" class="px-5 py-2.5 rounded-xl bg-kt-primary hover:bg-kt-primary-active text-white text-xs font-semibold shadow-md shadow-kt-primary/20 flex items-center gap-2 transition-all shrink-0">
      <span class="material-symbols-outlined text-[18px]">add</span>
      <span>Tambah Unit Baru</span>
    </a>
  </div>

  <!-- Catalogs Table Card -->
  <div class="bg-white rounded-3xl border border-kt-gray-300/70 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
      <table class="w-full text-left text-xs">
        <thead class="bg-kt-gray-100 text-kt-gray-500 font-semibold uppercase tracking-wider text-[11px] border-b border-kt-gray-200">
          <tr>
            <th class="py-4 px-6 w-20">Foto</th>
            <th class="py-4 px-6">Nama Produk</th>
            <th class="py-4 px-6">Slug &amp; URL</th>
            <th class="py-4 px-6">Harga OTR</th>
            <th class="py-4 px-6">Keterangan</th>
            <th class="py-4 px-6 text-right">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-kt-gray-200 text-kt-dark">
          @forelse ($catalogs as $item)
            <tr class="hover:bg-kt-gray-100/50 transition-colors">
              <td class="py-4 px-6">
                <div class="relative w-16 h-11 rounded-xl overflow-hidden bg-kt-gray-200 border border-kt-gray-200 shadow-sm shrink-0">
                  <img src="{{ $item->first_photo_url }}" alt="{{ $item->nama_produk }}" class="w-full h-full object-cover"/>
                  <span class="absolute bottom-0 right-0 px-1 text-[9px] bg-kt-dark/80 text-white font-bold rounded-tl">
                    {{ count($item->photo_urls) }}/3
                  </span>
                </div>
              </td>
              <td class="py-4 px-6 font-bold text-kt-dark text-sm">
                <a href="{{ route('admin.catalogs.edit', $item->uuid) }}" class="hover:text-kt-primary transition-colors">
                  {{ $item->nama_produk }}
                </a>
              </td>
              <td class="py-4 px-6">
                <a href="{{ route('katalog.detail', $item->slug) }}" target="_blank" class="font-mono text-kt-primary hover:underline text-[11px] flex items-center gap-1">
                  <span>/katalog/{{ $item->slug }}</span>
                  <span class="material-symbols-outlined text-[13px]">open_in_new</span>
                </a>
              </td>
              <td class="py-4 px-6 font-bold text-kt-primary text-sm whitespace-nowrap">
                {{ $item->formatted_harga }}
              </td>
              <td class="py-4 px-6 max-w-xs text-kt-muted line-clamp-2 leading-relaxed">
                {{ Str::limit($item->keterangan, 90) }}
              </td>
              <td class="py-4 px-6 text-right whitespace-nowrap">
                <div class="flex items-center justify-end gap-2">
                  <a href="{{ route('katalog.detail', $item->slug) }}" target="_blank" class="p-2 rounded-xl text-kt-gray-500 hover:text-kt-primary hover:bg-kt-primary-light transition-all" title="Buka Halaman Detail User">
                    <span class="material-symbols-outlined text-[18px]">visibility</span>
                  </a>
                  <a href="{{ route('admin.catalogs.edit', $item->uuid) }}" class="p-2 rounded-xl text-kt-gray-500 hover:text-kt-primary hover:bg-kt-primary-light transition-all" title="Edit Produk">
                    <span class="material-symbols-outlined text-[18px]">edit</span>
                  </a>
                  <form action="{{ route('admin.catalogs.destroy', $item->uuid) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk {{ $item->nama_produk }}?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="p-2 rounded-xl text-kt-gray-500 hover:text-kt-danger hover:bg-kt-danger-light transition-all" title="Hapus Produk">
                      <span class="material-symbols-outlined text-[18px]">delete</span>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="py-12 text-center text-kt-muted">Belum ada unit mobil dalam katalog.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    @if ($catalogs->hasPages())
      <div class="p-6 border-t border-kt-gray-200">
        {{ $catalogs->links() }}
      </div>
    @endif
  </div>

</div>
@endsection
