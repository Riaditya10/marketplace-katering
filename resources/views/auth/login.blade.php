@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-16 max-w-md">
    <div class="bg-white p-8 rounded-xl shadow-md">
        <h1 class="text-2xl font-bold text-slate-900 mb-6">Masuk ke Akun</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-slate-700">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2" required>
            </div>
            <div class="mb-6">
                <label class="block text-sm font-medium text-slate-700">Password</label>
                <input type="password" name="password" class="mt-1 w-full border border-slate-300 rounded-lg px-3 py-2" required>
            </div>
            <button type="submit" class="w-full bg-sky-600 text-white px-4 py-3 rounded-lg font-semibold">Login</button>
        </form>

        <div class="mt-4 text-sm text-slate-600">
            Belum punya akun? <a href="{{ route('register') }}" class="text-sky-600 font-medium">Daftar di sini</a>
        </div>
    </div>
</div>
@endsection
