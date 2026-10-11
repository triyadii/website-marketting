@extends('layouts.admin')

@section('title', 'Manajemen Testimoni')
@section('page_title', 'Manajemen Testimoni')
@section('breadcrumb', 'Daftar Testimoni Pelanggan')

@section('content')
<div class="space-y-6">

  <!-- Action Header Card -->
  <div class="bg-white rounded-3xl border border-kt-gray-300/70 shadow-sm p-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
    <div>
      <h2 class="text-base font-bold font-heading text-kt-dark">Testimoni &amp; Serah Terima Konsumen</h2>
      <p class="text-xs text-kt-muted mt-0.5">Kelola ulasan kepuasan dan dokumentasi serah terima pelanggan BYD Medan.</p>
    </div>
    <a href="{{ route('admin.testimonials.create') }}" class="px-5 py-2.5 rounded-xl bg-kt-primary hover:bg-kt-primary-active text-white text-xs font-semibold shadow-md shadow-kt-primary/20 flex items-center gap-2 transition-all shrink-0">
      <span class="material-symbols-outlined text-[18px]">add</span>
      <span>Tambah Testimoni Baru</span>
    </a>
  </div>

  <!-- Table Card -->
  <div class="bg-white rounded-3xl border border-kt-gray-300/70 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
      <table class="w-full text-left text-xs">
        <thead class="bg-kt-gray-100 text-kt-gray-500 font-semibold uppercase tracking-wider text-[11px] border-b border-kt-gray-200">
          <tr>
            <th class="py-4 px-6 w-20">Foto</th>
            <th class="py-4 px-6">Nama Pelanggan</th>
            <th class="py-4 px-6">Keterangan / Ulasan</th>
            <th class="py-4 px-6">Tanggal</th>
            <th class="py-4 px-6 text-right">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-kt-gray-200 text-kt-dark">
          @forelse ($testimonials as $item)
            <tr class="hover:bg-kt-gray-100/50 transition-colors">
              <td class="py-4 px-6">
                <div class="w-14 h-14 rounded-2xl overflow-hidden bg-kt-gray-200 border border-kt-gray-200 shadow-sm shrink-0">
                  <img src="{{ $item->photo_url }}" alt="{{ $item->nama_pelanggan }}" class="w-full h-full object-cover"/>
                </div>
              </td>
              <td class="py-4 px-6 font-bold text-kt-dark text-sm whitespace-nowrap">
                {{ $item->nama_pelanggan }}
              </td>
              <td class="py-4 px-6 max-w-md text-kt-muted leading-relaxed">
                {{ $item->keterangan }}
              </td>
              <td class="py-4 px-6 text-kt-muted whitespace-nowrap">
                {{ $item->created_at ? $item->created_at->format('d M Y') : '-' }}
              </td>
              <td class="py-4 px-6 text-right whitespace-nowrap">
                <div class="flex items-center justify-end gap-2">
                  <a href="{{ route('admin.testimonials.edit', $item->uuid) }}" class="p-2 rounded-xl text-kt-gray-500 hover:text-kt-primary hover:bg-kt-primary-light transition-all" title="Edit Testimoni">
                    <span class="material-symbols-outlined text-[18px]">edit</span>
                  </a>
                  <form action="{{ route('admin.testimonials.destroy', $item->uuid) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus testimoni dari {{ $item->nama_pelanggan }}?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="p-2 rounded-xl text-kt-gray-500 hover:text-kt-danger hover:bg-kt-danger-light transition-all" title="Hapus Testimoni">
                      <span class="material-symbols-outlined text-[18px]">delete</span>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="py-12 text-center text-kt-muted">Belum ada testimoni konsumen.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    @if ($testimonials->hasPages())
      <div class="p-6 border-t border-kt-gray-200">
        {{ $testimonials->links() }}
      </div>
    @endif
  </div>

</div>
@endsection
