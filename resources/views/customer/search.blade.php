@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-10 max-w-5xl">
    <h1 class="text-3xl font-bold text-slate-900 mb-6">Cari Katering</h1>

    <form method="GET" action="{{ route('customer.search') }}" class="bg-white p-6 rounded-xl shadow-sm mb-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-700">Cari</label>
                <input type="text" name="q" value="{{ $query ?? '' }}" class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2" placeholder="Nama menu atau makanan">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700">Kategori</label>
                <input type="text" name="category" value="{{ $category ?? '' }}" class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2" placeholder="Ayam, vegetarian, dll">
            </div>
            <div class="flex items-end">
                <button type="submit" class="w-full bg-sky-600 text-white px-4 py-2 rounded-lg font-semibold">Cari</button>
            </div>
        </div>
    </form>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        @foreach($menus as $menu)
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <img src="{{ $menu->image_url }}" alt="{{ $menu->name }}" class="h-48 w-full object-cover">
                <div class="p-5">
                    <div class="flex justify-between items-start gap-3">
                        <div>
                            <div class="font-bold text-xl">{{ $menu->name }}</div>
                            <div class="text-sm text-slate-500">{{ $menu->merchant->company_name ?? $menu->merchant->name }}</div>
                        </div>
                        <span class="font-bold text-sky-600">Rp {{ number_format($menu->price, 0, ',', '.') }}</span>
                    </div>
                    <p class="mt-3 text-sm text-slate-600">{{ Str::limit($menu->description, 100) }}</p>

                    <form method="POST" action="{{ route('customer.orders.store') }}" class="mt-4">
                        @csrf
                        <input type="hidden" name="merchant_id" value="{{ $menu->merchant_id }}">
                        <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                        <div class="grid grid-cols-2 gap-3 mb-3">
                            <div>
                                <label class="block text-sm font-medium text-slate-700">Jumlah</label>
                                <input type="number" name="quantity" min="1" value="1" class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700">Tanggal</label>
                                <input type="date" name="delivery_date" value="{{ date('Y-m-d') }}" class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2">
                            </div>
                        </div>
                        <button type="submit" class="w-full bg-emerald-600 text-white px-4 py-2 rounded-lg font-semibold">Pesan Sekarang</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
