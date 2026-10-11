@extends('layouts.admin')

@section('title', 'Manajemen Akun')
@section('page_title', 'Manajemen Akun')
@section('breadcrumb', 'Daftar Akun Pengguna')

@section('content')
<div class="space-y-6">

  <!-- Action Header Card -->
  <div class="bg-white rounded-3xl border border-kt-gray-300/70 shadow-sm p-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
    <div>
      <h2 class="text-base font-bold font-heading text-kt-dark">Pengelolaan Akun Pengguna</h2>
      <p class="text-xs text-kt-muted mt-0.5">Kelola data login pengguna administrator sistem.</p>
    </div>
    <a href="{{ route('admin.accounts.create') }}" class="px-5 py-2.5 rounded-xl bg-kt-primary hover:bg-kt-primary-active text-white text-xs font-semibold shadow-md shadow-kt-primary/20 flex items-center gap-2 transition-all shrink-0">
      <span class="material-symbols-outlined text-[18px]">add</span>
      <span>Tambah Akun Baru</span>
    </a>
  </div>

  <!-- Accounts Table Card -->
  <div class="bg-white rounded-3xl border border-kt-gray-300/70 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
      <table class="w-full text-left text-xs">
        <thead class="bg-kt-gray-100 text-kt-gray-500 font-semibold uppercase tracking-wider text-[11px] border-b border-kt-gray-200">
          <tr>
            <th class="py-4 px-6 w-16">No</th>
            <th class="py-4 px-6">UUID</th>
            <th class="py-4 px-6">Username</th>
            <th class="py-4 px-6">Nama Pengguna</th>
            <th class="py-4 px-6">Tanggal Dibuat</th>
            <th class="py-4 px-6 text-right">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-kt-gray-200 text-kt-dark">
          @forelse ($users as $index => $user)
            <tr class="hover:bg-kt-gray-100/50 transition-colors">
              <td class="py-4 px-6 font-semibold text-kt-muted">
                {{ $users->firstItem() + $index }}
              </td>
              <td class="py-4 px-6 font-mono text-[11px] text-kt-muted">
                {{ $user->uuid }}
              </td>
              <td class="py-4 px-6">
                <span class="font-bold text-kt-dark">@ {{ $user->username }}</span>
                @if ($user->id === Auth::id())
                  <span class="ml-1.5 px-2 py-0.5 rounded-full text-[10px] font-bold bg-kt-success-light text-kt-success">Anda</span>
                @endif
              </td>
              <td class="py-4 px-6 font-medium">
                {{ $user->name ?: '-' }}
              </td>
              <td class="py-4 px-6 text-kt-muted">
                {{ $user->created_at ? $user->created_at->format('d M Y, H:i') : '-' }}
              </td>
              <td class="py-4 px-6 text-right">
                <div class="flex items-center justify-end gap-2">
                  <a href="{{ route('admin.accounts.edit', $user->uuid) }}" class="p-2 rounded-xl text-kt-gray-500 hover:text-kt-primary hover:bg-kt-primary-light transition-all" title="Edit Akun">
                    <span class="material-symbols-outlined text-[18px]">edit</span>
                  </a>

                  @if ($user->id !== Auth::id())
                    <form action="{{ route('admin.accounts.destroy', $user->uuid) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun {{ $user->username }}?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="p-2 rounded-xl text-kt-gray-500 hover:text-kt-danger hover:bg-kt-danger-light transition-all" title="Hapus Akun">
                        <span class="material-symbols-outlined text-[18px]">delete</span>
                      </button>
                    </form>
                  @endif
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="py-8 text-center text-kt-muted">Belum ada akun pengguna.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <!-- Pagination -->
    @if ($users->hasPages())
      <div class="p-6 border-t border-kt-gray-200">
        {{ $users->links() }}
      </div>
    @endif
  </div>

</div>
@endsection
