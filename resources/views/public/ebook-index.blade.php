<x-layouts.app title="Ebook — donnyhidayat.blog">
<div class="max-w-6xl mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold text-gray-800 mb-2">Ebook</h1>
    <p class="text-gray-500 mb-10">Kumpulan ebook pilihan untuk membantu Anda berkembang.</p>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($ebooks as $ebook)
            <a href="/ebook/{{ $ebook->slug }}" class="bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition overflow-hidden">
                @if($ebook->cover_image)
                    <img src="{{ asset('storage/'.$ebook->cover_image) }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-blue-100 flex items-center justify-center text-blue-400"><svg style="width:56px;height:56px;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg></div>
                @endif
                <div class="p-5">
                    <h3 class="font-semibold text-gray-800">{{ $ebook->title }}</h3>
                    <p class="text-gray-500 text-sm mt-1 line-clamp-2">{{ $ebook->description }}</p>
                    <p class="text-blue-700 font-bold mt-3">Rp {{ number_format($ebook->price, 0, ',', '.') }}</p>
                </div>
            </a>
        @empty
            <div class="col-span-3 text-center text-gray-400 py-20">
                <p class="mb-3 flex justify-center text-blue-300"><svg style="width:40px;height:40px;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg></p>
                <p>Belum ada ebook tersedia.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-10">{{ $ebooks->links() }}</div>
</div>
</x-layouts.app>
