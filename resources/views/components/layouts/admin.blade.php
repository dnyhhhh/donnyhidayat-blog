<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — {{ $title ?? 'donnyhidayat.blog' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100 font-sans antialiased">

<div class="flex min-h-screen">
    {{-- Sidebar --}}
    <aside class="w-60 bg-blue-900 text-white flex flex-col">
        <div class="px-6 py-5 border-b border-blue-800">
            <a href="/" class="text-lg font-bold">donnyhidayat<span class="opacity-50">.blog</span></a>
            <p class="text-xs text-blue-300 mt-1">Admin Panel</p>
        </div>
        <nav class="flex-1 px-4 py-6 space-y-1 text-sm">
            <a href="/admin/dashboard" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-blue-800">Dashboard</a>
            <a href="/admin/ebook" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-blue-800">Ebook</a>
            <a href="/admin/kelas" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-blue-800">Kelas</a>
            <a href="/admin/template" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-blue-800">Template</a>
            <a href="/admin/blog" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-blue-800">Blog</a>
            <a href="/admin/riset" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-blue-800">Ide Riset</a>
            <a href="/admin/order" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-blue-800">Order</a>
        </nav>
        <div class="px-4 py-4 border-t border-blue-800">
            <form method="POST" action="/logout">
                @csrf
                <button class="text-sm text-blue-300 hover:text-white">Keluar</button>
            </form>
        </div>
    </aside>

    {{-- Main --}}
    <div class="flex-1 flex flex-col">
        <header class="bg-white border-b border-gray-200 px-8 py-4">
            <h1 class="text-lg font-semibold text-gray-800">{{ $title ?? 'Dashboard' }}</h1>
        </header>
        <main class="flex-1 p-8">
            {{ $slot }}
        </main>
    </div>
</div>

@livewireScripts
</body>
</html>
