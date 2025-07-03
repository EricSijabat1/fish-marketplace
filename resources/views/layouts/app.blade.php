{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pasar Ikan Danau Toba')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="bg-gray-50">
    <nav class="bg-blue-600 text-white shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-2">
                    <h1 class="text-xl font-bold">🐟 Pasar Ikan Danau Toba</h1>
                </div>
                <div class="flex items-center space-x-4">
                    @guest
                        <a href="{{ route('login') }}" class="hover:text-blue-200">Masuk</a>
                        <a href="{{ route('register') }}" class="bg-blue-700 px-4 py-2 rounded hover:bg-blue-800">Daftar</a>
                    @else
                        <span>Halo, {{ auth()->user()->name }}</span>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="hover:text-blue-200">Keluar</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-4 py-8">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white py-6 mt-3">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2024 Pasar Ikan Danau Toba. Mendukung Ekonomi Lokal Nelayan.</p>
        </div>
    </footer>
</body>

</html>
