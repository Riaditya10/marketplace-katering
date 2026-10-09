@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-10 max-w-5xl">
    <div class="bg-white rounded-xl shadow-md p-8">
        <h1 class="text-2xl font-bold text-slate-900 mb-6">Daftar Pesanan</h1>

        @foreach($orders as $order)
            <div class="border rounded-lg p-4 mb-4">
                <div class="flex justify-between items-center">
                    <div>
                        <div class="font-bold text-lg">{{ $order->customer->company_name ?? $order->customer->name }}</div>
                        <div class="text-sm text-slate-500">Tanggal kirim: {{ $order->delivery_date }}</div>
                    </div>
                    <span class="bg-sky-100 text-sky-700 px-3 py-1 rounded-full text-sm font-medium">{{ $order->status }}</span>
                </div>
                <div class="mt-3 space-y-2">
                    @foreach($order->items as $item)
                        <div class="flex justify-between text-sm">
                            <span>{{ $item->menu->name }} x {{ $item->quantity }}</span>
                            <span>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</span>
                        </div>
                    @endforeach
                </div>
                <div class="mt-4 flex justify-between items-center border-t pt-3">
                    <span class="font-bold text-slate-900">Total</span>
                    <span class="font-bold">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
