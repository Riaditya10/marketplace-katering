@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-10 max-w-4xl">
    <div class="bg-white rounded-xl shadow-md p-8">
        <h1 class="text-2xl font-bold text-slate-900 mb-6">Invoice</h1>

        <div class="border rounded-lg p-6">
            <div class="flex justify-between items-center border-b pb-4 mb-4">
                <div>
                    <div class="text-sm text-slate-500">Nomor Invoice</div>
                    <div class="font-bold text-xl">{{ $invoice->invoice_number }}</div>
                </div>
                <span class="bg-amber-100 text-amber-700 px-3 py-1 rounded-full text-sm font-medium">{{ $invoice->status }}</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-slate-600">
                <div>
                    <div class="font-semibold text-slate-900">Merchant</div>
                    <div>{{ $invoice->order->merchant->company_name ?? $invoice->order->merchant->name }}</div>
                </div>
                <div>
                    <div class="font-semibold text-slate-900">Kantor / Customer</div>
                    <div>{{ $invoice->order->customer->company_name ?? $invoice->order->customer->name }}</div>
                </div>
                <div>
                    <div class="font-semibold text-slate-900">Tanggal Pengiriman</div>
                    <div>{{ $invoice->order->delivery_date }}</div>
                </div>
                <div>
                    <div class="font-semibold text-slate-900">Jatuh Tempo</div>
                    <div>{{ $invoice->due_date }}</div>
                </div>
            </div>

            <div class="mt-6 space-y-3">
                @foreach($invoice->order->items as $item)
                    <div class="flex justify-between text-sm">
                        <span>{{ $item->menu->name }} x {{ $item->quantity }}</span>
                        <span>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</span>
                    </div>
                @endforeach
            </div>

            <div class="mt-6 flex justify-between border-t pt-4 font-bold text-lg">
                <span>Total</span>
                <span>Rp {{ number_format($invoice->total, 0, ',', '.') }}</span>
            </div>
        </div>
    </div>
</div>
@endsection
