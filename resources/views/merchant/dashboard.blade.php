@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-10">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-slate-900">Dashboard Merchant</h1>
        <span class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-sm font-medium">{{ auth()->user()->company_name }}</span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="text-sm text-slate-500">Total Menu</div>
            <div class="text-3xl font-bold text-slate-900 mt-2">{{ $menus->count() }}</div>
        </div>
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="text-sm text-slate-500">Pesanan Hari Ini</div>
            <div class="text-3xl font-bold text-slate-900 mt-2">{{ $orders->count() }}</div>
        </div>
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="text-sm text-slate-500">Pendapatan</div>
            <div class="text-3xl font-bold text-slate-900 mt-2">Rp {{ number_format($orders->sum('total_price'), 0, ',', '.') }}</div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="font-bold text-xl text-slate-900">Menu Terbaru</h2>
                <a href="{{ route('merchant.menus') }}" class="text-sky-600 text-sm">Lihat semua</a>
            </div>
            <div class="space-y-3">
                @foreach($menus as $menu)
                    <div class="flex justify-between items-center border-b pb-3">
                        <div>
                            <div class="font-semibold">{{ $menu->name }}</div>
                            <div class="text-sm text-slate-500">{{ $menu->category }}</div>
                        </div>
                        <div class="text-right">
                            <div class="font-bold text-slate-900">Rp {{ number_format($menu->price, 0, ',', '.') }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="font-bold text-xl text-slate-900">Pesanan Masuk</h2>
                <a href="{{ route('merchant.orders') }}" class="text-sky-600 text-sm">Lihat semua</a>
            </div>
            <div class="space-y-3">
                @foreach($orders as $order)
                    <div class="border-b pb-3">
                        <div class="font-semibold">{{ $order->customer->company_name ?? $order->customer->name }}</div>
                        <div class="text-sm text-slate-500">{{ $order->delivery_date }}</div>
                        <div class="text-sm font-medium text-emerald-600">{{ $order->status }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
