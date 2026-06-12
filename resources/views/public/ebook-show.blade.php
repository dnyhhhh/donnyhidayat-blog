<x-layouts.app :title="$ebook->title . ' — donnyhidayat.blog'">
<div class="max-w-4xl mx-auto px-4 py-12">
    <a href="/ebook" class="text-sm text-blue-700 hover:underline">← Kembali ke Ebook</a>

    <div class="mt-6 bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="md:flex">
            <div class="md:w-64 flex-shrink-0">
                @if($ebook->cover_image)
                    <img src="{{ asset('storage/'.$ebook->cover_image) }}" class="w-full h-64 md:h-full object-cover">
                @else
                    <div class="w-full h-64 bg-blue-100 flex items-center justify-center text-blue-400 text-6xl">📘</div>
                @endif
            </div>
            <div class="p-8 flex-1">
                @if($ebook->category)
                    <span class="text-xs font-semibold text-blue-700 bg-blue-50 px-3 py-1 rounded-full">{{ $ebook->category->name }}</span>
                @endif
                <h1 class="text-2xl font-bold text-gray-800 mt-3">{{ $ebook->title }}</h1>
                <p class="text-gray-500 mt-3 leading-relaxed">{{ $ebook->description }}</p>
                <p class="text-3xl font-bold text-blue-700 mt-6">Rp {{ number_format($ebook->price, 0, ',', '.') }}</p>

                <div class="mt-6">
                    @if($owned)
                        <a href="/member/ebook/{{ $ebook->id }}/download"
                            class="inline-block bg-green-600 text-white font-semibold px-6 py-3 rounded-xl hover:bg-green-700">
                            Download Ebook
                        </a>
                    @elseauth
                        <form method="POST" action="/member/checkout">
                            @csrf
                            <input type="hidden" name="type" value="ebook">
                            <input type="hidden" name="id" value="{{ $ebook->id }}">
                            <button type="submit" class="bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl hover:bg-blue-800">
                                Beli Sekarang
                            </button>
                        </form>
                    @else
                        <a href="/login" class="inline-block bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl hover:bg-blue-800">
                            Masuk untuk Membeli
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
</x-layouts.app>
