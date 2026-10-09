@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-10 max-w-5xl">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-slate-900">Manajemen Menu</h1>
        <a href="{{ route('merchant.menus.create') }}" class="bg-sky-600 text-white px-4 py-2 rounded-lg font-semibold">Tambah Menu</a>
    </div>

    @if(session('success'))
        <div class="bg-emerald-100 border border-emerald-400 text-emerald-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        @foreach($menus as $menu)
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <img src="{{ $menu->image_url }}" alt="{{ $menu->name }}" class="h-48 w-full object-cover">
                <div class="p-5">
                    <div class="flex justify-between items-start gap-3">
                        <div>
                            <h2 class="font-bold text-xl text-slate-900">{{ $menu->name }}</h2>
                            <p class="text-sm text-slate-500">{{ $menu->category }}</p>
                        </div>
                        <span class="font-bold text-sky-600">Rp {{ number_format($menu->price, 0, ',', '.') }}</span>
                    </div>
                    <p class="mt-3 text-sm text-slate-600">{{ Str::limit($menu->description, 100) }}</p>
                    <div class="mt-4 flex gap-2">
                        <a href="{{ route('merchant.menus.edit', $menu->id) }}" class="bg-amber-500 text-white px-3 py-2 rounded-lg text-sm">Edit</a>
                        <form action="{{ route('merchant.menus.destroy', $menu->id) }}" method="POST" onsubmit="return confirm('Hapus menu ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-2 rounded-lg text-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
