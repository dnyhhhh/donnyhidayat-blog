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
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50" x-data="{ open: false }">
        <div class="max-w-6xl mx-auto px-4 flex items-center justify-between h-16">
            <a href="/" class="text-xl font-bold text-blue-700">donnyhidayat<span class="text-gray-400">.blog</span></a>

            {{-- Desktop menu --}}
            <div class="hidden md:flex items-center gap-6 text-sm font-medium text-gray-600">
                <a href="/" class="hover:text-blue-700">Home</a>

                {{-- Dropdown Produk --}}
                <div class="relative" x-data="{ produk: false }" @click.outside="produk=false">
                    <button @click="produk=!produk"
                            class="flex items-center gap-1 focus:outline-none transition-colors"
                            :class="produk ? 'text-blue-700' : 'hover:text-blue-700'">
                        Produk
                        <svg :style="produk ? 'transform:rotate(180deg)' : ''" style="width:14px;height:14px;transition:transform .25s ease;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="produk"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-1"
                         style="display:none;position:absolute;top:calc(100% + 12px);left:50%;transform:translateX(-50%);width:230px;background:#fff;border:1px solid #e5e7eb;border-radius:16px;box-shadow:0 16px 40px rgba(0,0,0,0.12);padding:8px;z-index:100;">
                        {{-- Arrow --}}
                        <div style="position:absolute;top:-6px;left:50%;transform:translateX(-50%);width:12px;height:12px;background:#fff;border-left:1px solid #e5e7eb;border-top:1px solid #e5e7eb;transform:translateX(-50%) rotate(45deg);"></div>

                        <a href="/ebook" class="flex items-center gap-3 px-4 py-2.5 rounded-xl hover:bg-blue-50 text-gray-700 hover:text-blue-700 transition-colors">
                            <svg style="width:18px;height:18px;color:#3b82f6;flex-shrink:0;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                            <div>
                                <p style="font-weight:600;font-size:13px;">Ebook</p>
                                <p style="font-size:11px;color:#9ca3af;">Buku digital pilihan</p>
                            </div>
                        </a>
                        <a href="/kelas" class="flex items-center gap-3 px-4 py-2.5 rounded-xl hover:bg-blue-50 text-gray-700 hover:text-blue-700 transition-colors">
                            <svg style="width:18px;height:18px;color:#8b5cf6;flex-shrink:0;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.069A1 1 0 0121 8.82v6.36a1 1 0 01-1.447.894L15 14M3 8a2 2 0 012-2h8a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z"/></svg>
                            <div>
                                <p style="font-weight:600;font-size:13px;">Kelas Online</p>
                                <p style="font-size:11px;color:#9ca3af;">Video pembelajaran</p>
                            </div>
                        </a>
                        <a href="/materi" class="flex items-center gap-3 px-4 py-2.5 rounded-xl hover:bg-blue-50 text-gray-700 hover:text-blue-700 transition-colors">
                            <svg style="width:18px;height:18px;color:#10b981;flex-shrink:0;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                            <div>
                                <p style="font-weight:600;font-size:13px;">Materi Interaktif</p>
                                <p style="font-size:11px;color:#9ca3af;">Belajar sambil praktik</p>
                            </div>
                        </a>
                        <a href="/template" class="flex items-center gap-3 px-4 py-2.5 rounded-xl hover:bg-blue-50 text-gray-700 hover:text-blue-700 transition-colors">
                            <svg style="width:18px;height:18px;color:#f59e0b;flex-shrink:0;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg>
                            <div>
                                <p style="font-weight:600;font-size:13px;">Template Website</p>
                                <p style="font-size:11px;color:#9ca3af;">Source code siap pakai</p>
                            </div>
                        </a>
                        <div style="border-top:1px solid #f3f4f6;margin:6px 4px;"></div>
                        <a href="/bundling" class="flex items-center gap-3 px-4 py-2.5 rounded-xl hover:bg-orange-50 transition-colors" style="color:#ea580c;">
                            <svg style="width:18px;height:18px;flex-shrink:0;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                            <div>
                                <p style="font-weight:700;font-size:13px;">Paket Bundling</p>
                                <p style="font-size:11px;color:#fb923c;">Akses semua konten</p>
                            </div>
                        </a>
                    </div>
                </div>

                <a href="/blog" class="hover:text-blue-700">Blog</a>
                <a href="/tentang" class="hover:text-blue-700">Tentang</a>
            </div>

            {{-- Desktop auth --}}
            <div class="hidden md:flex items-center gap-3 text-sm">
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

            {{-- Burger button --}}
            <button @click="open = !open" class="md:hidden flex flex-col justify-center items-center w-9 h-9 rounded-lg hover:bg-gray-100 transition">
                <span :class="open ? 'rotate-45 translate-y-1.5' : ''" style="display:block;width:20px;height:2px;background:#374151;transition:all .25s;transform-origin:center;margin-bottom:4px;"></span>
                <span :class="open ? 'opacity-0' : ''" style="display:block;width:20px;height:2px;background:#374151;transition:all .25s;margin-bottom:4px;"></span>
                <span :class="open ? '-rotate-45 -translate-y-1.5' : ''" style="display:block;width:20px;height:2px;background:#374151;transition:all .25s;transform-origin:center;"></span>
            </button>
        </div>

        {{-- Mobile menu --}}
        <div x-show="open" x-transition style="display:none;" class="md:hidden border-t border-gray-100 bg-white px-4 pb-5 pt-3 space-y-1">
            <a href="/" class="block py-2.5 text-sm font-medium text-gray-700 hover:text-blue-700">Home</a>

            {{-- Accordion Produk (mobile) --}}
            <div x-data="{ produk: false }">
                <button @click="produk=!produk" class="w-full flex items-center justify-between py-2.5 text-sm font-medium text-gray-700">
                    <span>Produk</span>
                    <svg :style="produk ? 'transform:rotate(180deg)' : ''" style="width:14px;height:14px;transition:transform .25s ease;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="produk"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 -translate-y-1"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 translate-y-0"
                     x-transition:leave-end="opacity-0 -translate-y-1"
                     style="display:none;padding-left:12px;border-left:2px solid #e5e7eb;margin-left:4px;" class="space-y-1">
                    <a href="/ebook" class="flex items-center gap-3 py-2 text-sm text-gray-600 hover:text-blue-700">
                        <svg style="width:16px;height:16px;color:#3b82f6;flex-shrink:0;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        Ebook
                    </a>
                    <a href="/kelas" class="flex items-center gap-3 py-2 text-sm text-gray-600 hover:text-blue-700">
                        <svg style="width:16px;height:16px;color:#8b5cf6;flex-shrink:0;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.069A1 1 0 0121 8.82v6.36a1 1 0 01-1.447.894L15 14M3 8a2 2 0 012-2h8a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z"/></svg>
                        Kelas Online
                    </a>
                    <a href="/materi" class="flex items-center gap-3 py-2 text-sm text-gray-600 hover:text-blue-700">
                        <svg style="width:16px;height:16px;color:#10b981;flex-shrink:0;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                        Materi Interaktif
                    </a>
                    <a href="/template" class="flex items-center gap-3 py-2 text-sm text-gray-600 hover:text-blue-700">
                        <svg style="width:16px;height:16px;color:#f59e0b;flex-shrink:0;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg>
                        Template Website
                    </a>
                    <a href="/bundling" class="flex items-center gap-3 py-2 text-sm font-bold" style="color:#ea580c;">
                        <svg style="width:16px;height:16px;flex-shrink:0;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                        Paket Bundling
                    </a>
                </div>
            </div>

            <a href="/blog" class="block py-2.5 text-sm font-medium text-gray-700 hover:text-blue-700">Blog</a>
            <a href="/tentang" class="block py-2.5 text-sm font-medium text-gray-700 hover:text-blue-700">Tentang</a>

            <div class="border-t border-gray-100 pt-4 mt-3 flex flex-col gap-2">
                @auth
                    <a href="/member/dashboard" class="block text-center py-2.5 text-sm font-medium text-gray-700 hover:text-blue-700 border border-gray-200 rounded-lg">Dashboard</a>
                    <form method="POST" action="/logout">
                        @csrf
                        <button class="w-full text-center py-2.5 text-sm font-medium text-red-500 hover:text-red-700 border border-gray-200 rounded-lg">Keluar</button>
                    </form>
                @else
                    <a href="/login" class="block text-center py-2.5 text-sm font-medium text-gray-700 border border-gray-200 rounded-lg hover:border-blue-300 hover:text-blue-700">Masuk</a>
                    <a href="/register" class="block text-center py-2.5 text-sm font-semibold text-white bg-blue-700 rounded-lg hover:bg-blue-800">Daftar</a>
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
