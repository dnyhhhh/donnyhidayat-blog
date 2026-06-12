<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'donnyhidayat.blog' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-50 text-gray-900 font-sans antialiased">

    {{-- Navbar --}}
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4 flex items-center justify-between h-16">
            <a href="/" class="text-xl font-bold text-blue-700">donnyhidayat<span class="text-gray-400">.blog</span></a>

            <div class="hidden md:flex items-center gap-6 text-sm font-medium text-gray-600">
                <a href="/ebook" class="hover:text-blue-700">Ebook</a>
                <a href="/kelas" class="hover:text-blue-700">Kelas</a>
                <a href="/blog" class="hover:text-blue-700">Blog</a>
                <a href="/tentang" class="hover:text-blue-700">Tentang</a>
            </div>

            <div class="flex items-center gap-3 text-sm">
                @auth
                    <a href="/member/dashboard" class="hover:text-blue-700 font-medium">Dashboard</a>
                    <form method="POST" action="/logout">
                        @csrf
                        <button class="text-gray-500 hover:text-red-600">Keluar</button>
                    </form>
                @else
                    <a href="/login" class="text-gray-600 hover:text-blue-700">Masuk</a>
                    <a href="/register" class="bg-blue-700 text-white px-4 py-2 rounded-lg hover:bg-blue-800">Daftar</a>
                @endauth
            </div>
        </div>
    </nav>

    {{-- Content --}}
    <main>
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer class="bg-white border-t border-gray-200 mt-20 py-10">
        <div class="max-w-6xl mx-auto px-4 text-center text-sm text-gray-500">
            <p class="font-semibold text-gray-700 mb-1">donnyhidayat.blog</p>
            <p>Ebook, Kelas Online & Artikel Pilihan</p>
            <p class="mt-4">&copy; {{ date('Y') }} Donny Hidayat. All rights reserved.</p>
        </div>
    </footer>

    @livewireScripts
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</body>
</html>
