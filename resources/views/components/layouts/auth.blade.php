<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'donnyhidayat.blog' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-gray-900 font-sans antialiased">

<div class="min-h-screen flex">

    {{-- Panel Kiri -- Branding --}}
    <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-blue-900 via-blue-800 to-blue-700 flex-col justify-between p-12 relative overflow-hidden">

        {{-- Dekorasi lingkaran --}}
        <div class="absolute -top-24 -right-24 w-96 h-96 rounded-full bg-white/5"></div>
        <div class="absolute -bottom-32 -left-16 w-80 h-80 rounded-full bg-white/5"></div>
        <div class="absolute top-1/2 right-8 w-40 h-40 rounded-full bg-blue-600/40"></div>

        {{-- Logo --}}
        <a href="/" class="relative z-10 text-2xl font-bold text-white">
            donnyhidayat<span class="text-blue-300">.blog</span>
        </a>

        {{-- Konten tengah --}}
        <div class="relative z-10">
            <div class="inline-flex items-center gap-2 bg-white/15 border border-white/20 text-blue-100 text-xs font-semibold px-4 py-1.5 rounded-full mb-6">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                Platform Digital Donny Hidayat
            </div>
            <h2 class="text-3xl font-extrabold text-white leading-tight mb-4">
                Akses semua produk<br>digital dalam satu akun
            </h2>
            <p class="text-blue-200 text-sm leading-relaxed mb-8 max-w-sm">
                Ebook, kelas online, materi interaktif, template website, dan ide riset skripsi — semuanya tersedia setelah kamu masuk.
            </p>

            {{-- Benefit list --}}
            <div class="space-y-3">
                @foreach([
                    ['book', 'Ebook & Kelas Online', 'Download & akses setelah pembelian'],
                    ['light-bulb', 'Ide Riset Skripsi', 'Rekomendasi topik personal untukmu'],
                    ['template', 'Template Website', 'Source code siap pakai & update gratis'],
                ] as [$icon, $title, $sub])
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-white/15 flex items-center justify-center flex-shrink-0">
                        @if($icon === 'book')
                            <svg class="w-4 h-4 text-blue-200" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        @elseif($icon === 'light-bulb')
                            <svg class="w-4 h-4 text-blue-200" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                        @else
                            <svg class="w-4 h-4 text-blue-200" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg>
                        @endif
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-white">{{ $title }}</p>
                        <p class="text-xs text-blue-300">{{ $sub }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Footer panel --}}
        <p class="relative z-10 text-xs text-blue-400">&copy; {{ date('Y') }} Donny Hidayat. All rights reserved.</p>
    </div>

    {{-- Panel Kanan -- Form --}}
    <div class="flex-1 flex flex-col justify-center items-center px-6 py-12">
        {{-- Logo mobile --}}
        <div class="lg:hidden mb-8 text-center">
            <a href="/" class="text-xl font-bold text-blue-700">donnyhidayat<span class="text-gray-400">.blog</span></a>
        </div>

        <div class="w-full max-w-sm">
            {{ $slot }}
        </div>
    </div>

</div>

</body>
</html>
