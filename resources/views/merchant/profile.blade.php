@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-10 max-w-3xl">
    <div class="bg-white rounded-xl shadow-md p-8">
        <h1 class="text-2xl font-bold text-slate-900 mb-6">Edit Profil Merchant</h1>

        @if(session('success'))
            <div class="bg-emerald-100 border border-emerald-400 text-emerald-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('merchant.profile.update') }}">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-slate-700">Nama Perusahaan</label>
                    <input type="text" name="company_name" value="{{ old('company_name', auth()->user()->company_name) }}" class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Telepon</label>
                    <input type="text" name="phone" value="{{ old('phone', auth()->user()->phone) }}" class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Alamat</label>
                    <input type="text" name="address" value="{{ old('address', auth()->user()->address) }}" class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-slate-700">Deskripsi</label>
                    <textarea name="description" rows="4" class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2">{{ old('description', auth()->user()->description) }}</textarea>
                </div>
            </div>

            <button type="submit" class="mt-6 bg-sky-600 text-white px-4 py-3 rounded-lg font-semibold">Simpan Profil</button>
        </form>
    </div>
</div>
@endsection
