@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-10 max-w-3xl">
    <div class="bg-white rounded-xl shadow-md p-8">
        <h1 class="text-2xl font-bold text-slate-900 mb-6">{{ $menu ? 'Edit Menu' : 'Tambah Menu' }}</h1>

        <form method="POST" action="{{ $menu ? route('merchant.menus.update', $menu->id) : route('merchant.menus.store') }}">
            @csrf
            @if($menu)
                @method('PUT')
            @endif
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700">Nama Menu</label>
                    <input type="text" name="name" value="{{ old('name', $menu->name ?? '') }}" class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Deskripsi</label>
                    <textarea name="description" rows="4" class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2" required>{{ old('description', $menu->description ?? '') }}</textarea>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700">Harga</label>
                        <input type="number" name="price" min="0" value="{{ old('price', $menu->price ?? 0) }}" class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700">Kategori</label>
                        <input type="text" name="category" value="{{ old('category', $menu->category ?? 'umum') }}" class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">URL Foto</label>
                    <input type="url" name="image_url" value="{{ old('image_url', $menu->image_url ?? '') }}" class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2">
                </div>
            </div>

            <button type="submit" class="mt-6 bg-emerald-600 text-white px-4 py-3 rounded-lg font-semibold">Simpan</button>
        </form>
    </div>
</div>
@endsection
