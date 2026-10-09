@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-16 max-w-2xl">
    <div class="bg-white p-8 rounded-xl shadow-md">
        <h1 class="text-2xl font-bold text-slate-900 mb-6">Daftar Akun Baru</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700">Nama Lengkap / Nama Perusahaan</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Role</label>
                    <select name="role" class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2" required>
                        <option value="merchant">Merchant</option>
                        <option value="customer">Kantor / Customer</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Nomor Telepon</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-slate-700">Alamat</label>
                    <input type="text" name="address" value="{{ old('address') }}" class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Password</label>
                    <input type="password" name="password" class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2" required>
                </div>
            </div>

            <button type="submit" class="mt-6 w-full bg-emerald-600 text-white px-4 py-3 rounded-lg font-semibold">Daftar</button>
        </form>
    </div>
</div>
@endsection
