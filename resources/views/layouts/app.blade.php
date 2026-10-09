<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace Katering</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100">
    <nav class="bg-slate-900 text-white">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="font-bold text-xl">Marketplace Katering</div>
            <div class="space-x-6 text-sm">
                <a href="{{ route('home') }}" class="hover:text-sky-300">Home</a>
                @guest
                    <a href="{{ route('login') }}" class="hover:text-sky-300">Login</a>
                    <a href="{{ route('register') }}" class="hover:text-sky-300">Register</a>
                @else
                    <a href="{{ route('dashboard') }}" class="hover:text-sky-300">Dashboard</a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="hover:text-sky-300">Logout</button>
                    </form>
                @endguest
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>
</body>
</html>
