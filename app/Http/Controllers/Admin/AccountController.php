<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AccountController extends Controller
{
    /**
     * Display a listing of accounts.
     */
    public function index(): View
    {
        $users = User::latest()->paginate(10);

        return view('admin.accounts.index', compact('users'));
    }

    /**
     * Show the form for creating a new account.
     */
    public function create(): View
    {
        return view('admin.accounts.create');
    }

    /**
     * Store a newly created account in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'max:50', 'alpha_dash', 'unique:users,username'],
            'password' => ['required', 'string', 'min:6'],
            'name' => ['nullable', 'string', 'max:100'],
        ], [
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah digunakan, silakan pilih yang lain.',
            'username.alpha_dash' => 'Username hanya boleh berisi huruf, angka, tanda hubung, dan garis bawah.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal terdiri dari 6 karakter.',
        ]);

        User::create([
            'uuid' => (string) Str::uuid(),
            'username' => strtolower($validated['username']),
            'name' => ($validated['name'] ?? null) ?: $validated['username'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('admin.accounts.index')
            ->with('success', 'Akun pengguna berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified account.
     */
    public function edit(string $uuid): View
    {
        $user = User::where('uuid', $uuid)->firstOrFail();

        return view('admin.accounts.edit', compact('user'));
    }

    /**
     * Update the specified account in storage.
     */
    public function update(Request $request, string $uuid): RedirectResponse
    {
        $user = User::where('uuid', $uuid)->firstOrFail();

        $validated = $request->validate([
            'username' => ['required', 'string', 'max:50', 'alpha_dash', Rule::unique('users', 'username')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:6'],
            'name' => ['nullable', 'string', 'max:100'],
        ], [
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah digunakan, silakan pilih yang lain.',
            'password.min' => 'Password minimal terdiri dari 6 karakter.',
        ]);

        $user->username = strtolower($validated['username']);
        if (! empty($validated['name'])) {
            $user->name = $validated['name'];
        }

        if (! empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('admin.accounts.index')
            ->with('success', 'Data akun berhasil diperbarui.');
    }

    /**
     * Remove the specified account from storage.
     */
    public function destroy(string $uuid): RedirectResponse
    {
        $user = User::where('uuid', $uuid)->firstOrFail();

        if ($user->id === Auth::id()) {
            return redirect()->route('admin.accounts.index')
                ->with('error', 'Anda tidak dapat menghapus akun yang sedang digunakan untuk login.');
        }

        if (User::count() <= 1) {
            return redirect()->route('admin.accounts.index')
                ->with('error', 'Sistem harus memiliki minimal satu akun aktif.');
        }

        $user->delete();

        return redirect()->route('admin.accounts.index')
            ->with('success', 'Akun berhasil dihapus.');
    }
}
