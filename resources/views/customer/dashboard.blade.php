@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-10">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-slate-900">Dashboard Kantor</h1>
        <a href="{{ route('customer.search') }}" class="bg-sky-600 text-white px-4 py-2 rounded-lg font-semibold">Cari Katering</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        @foreach($merchants as $merchant)
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="font-bold text-xl text-slate-900">{{ $merchant->company_name ?? $merchant->name }}</div>
                <div class="text-sm text-slate-500 mt-2">{{ $merchant->address ?? 'Alamat belum ditentukan' }}</div>
                <div class="mt-4 text-sm text-slate-600">{{ Str::limit($merchant->description ?? 'Belum ada deskripsi', 80) }}</div>
                <div class="mt-4">
                    <a href="{{ route('customer.catalog', $merchant->id) }}" class="text-sky-600 font-medium">Lihat menu</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
