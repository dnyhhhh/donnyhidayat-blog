<x-layouts.app title="Selamat Datang — donnyhidayat.blog">

    {{-- Hero --}}
    <section class="bg-gradient-to-br from-blue-700 to-blue-900 text-white py-24 px-4">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold leading-tight">Belajar Lebih Cerdas,<br>Tumbuh Lebih Cepat</h1>
            <p class="mt-5 text-blue-100 text-lg">Ebook, kelas online, dan artikel pilihan dari Donny Hidayat untuk membantu Anda berkembang.</p>
            <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/ebook" class="bg-white text-blue-700 font-semibold px-6 py-3 rounded-xl hover:bg-blue-50">Lihat Ebook</a>
                <a href="/kelas" class="border border-white text-white font-semibold px-6 py-3 rounded-xl hover:bg-blue-800">Lihat Kelas</a>
            </div>
        </div>
    </section>

    {{-- Ebook Terbaru --}}
    <section class="max-w-6xl mx-auto px-4 py-16">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold">Ebook Terbaru</h2>
            <a href="/ebook" class="text-blue-700 text-sm hover:underline">Lihat semua →</a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($ebooks as $ebook)
                <a href="/ebook/{{ $ebook->slug }}" class="bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition overflow-hidden">
                    @if($ebook->cover_image)
                        <img src="{{ asset('storage/'.$ebook->cover_image) }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-blue-100 flex items-center justify-center text-blue-400 text-4xl">📘</div>
                    @endif
                    <div class="p-5">
                        <h3 class="font-semibold text-gray-800">{{ $ebook->title }}</h3>
                        <p class="text-blue-700 font-bold mt-2">Rp {{ number_format($ebook->price, 0, ',', '.') }}</p>
                    </div>
                </a>
            @empty
                <p class="text-gray-400 col-span-3">Belum ada ebook.</p>
            @endforelse
        </div>
    </section>

    {{-- Kelas Terbaru --}}
    <section class="bg-white py-16">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-2xl font-bold">Kelas Online</h2>
                <a href="/kelas" class="text-blue-700 text-sm hover:underline">Lihat semua →</a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($courses as $course)
                    <a href="/kelas/{{ $course->slug }}" class="rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition overflow-hidden">
                        @if($course->cover_image)
                            <img src="{{ asset('storage/'.$course->cover_image) }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-indigo-100 flex items-center justify-center text-indigo-400 text-4xl">🎓</div>
                        @endif
                        <div class="p-5">
                            <h3 class="font-semibold text-gray-800">{{ $course->title }}</h3>
                            <p class="text-sm text-gray-500 mt-1">{{ $course->total_lessons }} pelajaran</p>
                            <p class="text-blue-700 font-bold mt-2">Rp {{ number_format($course->price, 0, ',', '.') }}</p>
                        </div>
                    </a>
                @empty
                    <p class="text-gray-400 col-span-3">Belum ada kelas.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Artikel Terbaru --}}
    <section class="max-w-6xl mx-auto px-4 py-16">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold">Artikel Terbaru</h2>
            <a href="/blog" class="text-blue-700 text-sm hover:underline">Lihat semua →</a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($posts as $post)
                <a href="/blog/{{ $post->slug }}" class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition p-5">
                    <h3 class="font-semibold text-gray-800">{{ $post->title }}</h3>
                    <p class="text-gray-500 text-sm mt-2 line-clamp-2">{{ $post->excerpt }}</p>
                    <p class="text-xs text-gray-400 mt-3">{{ $post->published_at?->format('d M Y') }}</p>
                </a>
            @empty
                <p class="text-gray-400 col-span-3">Belum ada artikel.</p>
            @endforelse
        </div>
    </section>

</x-layouts.app>
