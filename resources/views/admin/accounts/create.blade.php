@extends('layouts.admin')

@section('title', 'Tambah Akun Baru')
@section('page_title', 'Tambah Akun')
@section('breadcrumb', 'Tambah Akun Baru')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">

  <div class="bg-white rounded-3xl border border-kt-gray-300/70 shadow-sm p-6 lg:p-8">
    <div class="flex items-center justify-between pb-4 border-b border-kt-gray-200 mb-6">
      <div>
        <h2 class="text-base font-bold font-heading text-kt-dark">Tambah Akun Baru</h2>
        <p class="text-xs text-kt-muted mt-0.5">Buat kredensial login akun pengguna baru.</p>
      </div>
      <a href="{{ route('admin.accounts.index') }}" class="text-xs font-semibold text-kt-muted hover:text-kt-primary flex items-center gap-1">
        <span class="material-symbols-outlined text-[16px]">arrow_back</span>
        <span>Kembali</span>
      </a>
    </div>

    <form action="{{ route('admin.accounts.store') }}" method="POST" class="space-y-6">
      @csrf

      <!-- Username -->
      <div>
        <label for="username" class="block text-xs font-semibold uppercase tracking-wider text-kt-dark mb-1.5">
          Username <span class="text-kt-danger">*</span>
        </label>
        <div class="relative">
          <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-kt-muted">
            <span class="material-symbols-outlined text-[18px]">person</span>
          </span>
          <input type="text" id="username" name="username" value="{{ old('username') }}" required
                 placeholder="Contoh: admin_keldy"
                 class="w-full pl-10 pr-4 py-3 rounded-xl border border-kt-gray-300 text-sm text-kt-dark focus:border-kt-primary focus:ring-2 focus:ring-kt-primary/20 focus:outline-none transition-all"/>
        </div>
        <span class="text-[11px] text-kt-muted mt-1 block">Gunakan huruf kecil, angka, atau garis bawah tanpa spasi.</span>
      </div>

      <!-- Nama Pengguna -->
      <div>
        <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-kt-dark mb-1.5">
          Nama Lengkap Pengguna
        </label>
        <input type="text" id="name" name="name" value="{{ old('name') }}"
               placeholder="Contoh: Keldy Sietra"
               class="w-full px-4 py-3 rounded-xl border border-kt-gray-300 text-sm text-kt-dark focus:border-kt-primary focus:ring-2 focus:ring-kt-primary/20 focus:outline-none transition-all"/>
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-kt-dark mb-1.5">
          Password <span class="text-kt-danger">*</span>
        </label>
        <div class="relative">
          <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-kt-muted">
            <span class="material-symbols-outlined text-[18px]">lock</span>
          </span>
          <input type="password" id="password" name="password" required
                 placeholder="Minimal 6 karakter"
                 class="w-full pl-10 pr-4 py-3 rounded-xl border border-kt-gray-300 text-sm text-kt-dark focus:border-kt-primary focus:ring-2 focus:ring-kt-primary/20 focus:outline-none transition-all"/>
        </div>
        <span class="text-[11px] text-kt-muted mt-1 block">UUID akun akan dibuat secara otomatis oleh sistem saat data disimpan.</span>
      </div>

      <!-- Action Buttons -->
      <div class="pt-6 border-t border-kt-gray-200 flex items-center justify-end gap-3">
        <a href="{{ route('admin.accounts.index') }}" class="px-5 py-3 rounded-xl border border-kt-gray-300 text-xs font-semibold text-kt-gray-500 hover:bg-kt-gray-100 transition-colors">
          Batal
        </a>
        <button type="submit" class="px-6 py-3 rounded-xl bg-kt-primary hover:bg-kt-primary-active text-white text-xs font-semibold shadow-md shadow-kt-primary/20 flex items-center gap-2 transition-all">
          <span class="material-symbols-outlined text-[18px]">save</span>
          <span>Simpan Akun Baru</span>
        </button>
      </div>
    </form>
  </div>

</div>
@endsection
