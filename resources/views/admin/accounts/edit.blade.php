@extends('layouts.admin')

@section('title', 'Edit Akun Pengguna')
@section('page_title', 'Edit Akun')
@section('breadcrumb', 'Edit Akun Pengguna')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">

  <div class="bg-white rounded-3xl border border-kt-gray-300/70 shadow-sm p-6 lg:p-8">
    <div class="flex items-center justify-between pb-4 border-b border-kt-gray-200 mb-6">
      <div>
        <h2 class="text-base font-bold font-heading text-kt-dark">Edit Akun Pengguna</h2>
        <p class="text-xs text-kt-muted mt-0.5">Perbarui informasi kredensial akun.</p>
      </div>
      <a href="{{ route('admin.accounts.index') }}" class="text-xs font-semibold text-kt-muted hover:text-kt-primary flex items-center gap-1">
        <span class="material-symbols-outlined text-[16px]">arrow_back</span>
        <span>Kembali</span>
      </a>
    </div>

    <form action="{{ route('admin.accounts.update', $user->uuid) }}" method="POST" class="space-y-6">
      @csrf
      @method('PUT')

      <!-- UUID (Readonly) -->
      <div>
        <label class="block text-xs font-semibold uppercase tracking-wider text-kt-dark mb-1.5">UUID Akun</label>
        <input type="text" value="{{ $user->uuid }}" readonly
               class="w-full px-4 py-3 rounded-xl border border-kt-gray-300 bg-kt-gray-200/70 text-xs font-mono text-kt-muted cursor-not-allowed"/>
      </div>

      <!-- Username -->
      <div>
        <label for="username" class="block text-xs font-semibold uppercase tracking-wider text-kt-dark mb-1.5">
          Username <span class="text-kt-danger">*</span>
        </label>
        <div class="relative">
          <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-kt-muted">
            <span class="material-symbols-outlined text-[18px]">person</span>
          </span>
          <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}" required
                 class="w-full pl-10 pr-4 py-3 rounded-xl border border-kt-gray-300 text-sm text-kt-dark focus:border-kt-primary focus:ring-2 focus:ring-kt-primary/20 focus:outline-none transition-all"/>
        </div>
      </div>

      <!-- Nama Pengguna -->
      <div>
        <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-kt-dark mb-1.5">
          Nama Lengkap Pengguna
        </label>
        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
               class="w-full px-4 py-3 rounded-xl border border-kt-gray-300 text-sm text-kt-dark focus:border-kt-primary focus:ring-2 focus:ring-kt-primary/20 focus:outline-none transition-all"/>
      </div>

      <!-- Password Baru (Opsional) -->
      <div>
        <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-kt-dark mb-1.5">
          Password Baru (Opsional)
        </label>
        <div class="relative">
          <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-kt-muted">
            <span class="material-symbols-outlined text-[18px]">lock</span>
          </span>
          <input type="password" id="password" name="password"
                 placeholder="Kosongkan jika tidak ingin mengubah password"
                 class="w-full pl-10 pr-4 py-3 rounded-xl border border-kt-gray-300 text-sm text-kt-dark focus:border-kt-primary focus:ring-2 focus:ring-kt-primary/20 focus:outline-none transition-all"/>
        </div>
        <span class="text-[11px] text-kt-muted mt-1 block">Biarkan kosong jika tetap menggunakan password yang ada saat ini.</span>
      </div>

      <!-- Action Buttons -->
      <div class="pt-6 border-t border-kt-gray-200 flex items-center justify-end gap-3">
        <a href="{{ route('admin.accounts.index') }}" class="px-5 py-3 rounded-xl border border-kt-gray-300 text-xs font-semibold text-kt-gray-500 hover:bg-kt-gray-100 transition-colors">
          Batal
        </a>
        <button type="submit" class="px-6 py-3 rounded-xl bg-kt-primary hover:bg-kt-primary-active text-white text-xs font-semibold shadow-md shadow-kt-primary/20 flex items-center gap-2 transition-all">
          <span class="material-symbols-outlined text-[18px]">save</span>
          <span>Simpan Perubahan</span>
        </button>
      </div>
    </form>
  </div>

</div>
@endsection
