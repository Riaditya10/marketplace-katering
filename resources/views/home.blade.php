@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
        <div>
            <span class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-xs font-bold">Marketplace Katering</span>
            <h1 class="mt-6 text-5xl font-bold text-slate-900">Solusi makan siang kantor yang praktis & hemat.</h1>
            <p class="mt-4 text-lg text-slate-600">Platform antara merchant catering dan kantor. Cari menu, pesan kebutuhan harian, dan kelola invoice di satu tempat.</p>
            <div class="mt-8 flex gap-4">
                <a href="{{ route('register') }}" class="bg-sky-600 text-white px-6 py-3 rounded-lg font-semibold">Daftar Sekarang</a>
                <a href="{{ route('login') }}" class="border border-slate-300 px-6 py-3 rounded-lg font-semibold">Masuk</a>
            </div>
        </div>
        <div class="bg-white p-8 rounded-2xl shadow-lg">
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-amber-100 rounded-xl p-5">
                    <div class="text-2xl font-bold text-amber-700">120+</div>
                    <div class="text-sm text-slate-700">Merchant aktif</div>
                </div>
                <div class="bg-emerald-100 rounded-xl p-5">
                    <div class="text-2xl font-bold text-emerald-700">4.8/5</div>
                    <div class="text-sm text-slate-700">Rating pelanggan</div>
                </div>
                <div class="bg-sky-100 rounded-xl p-5 col-span-2">
                    <div class="text-sm text-slate-500">Total order bulan ini</div>
                    <div class="text-3xl font-bold text-slate-900">3.240 porsi</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
