<x-layouts.app title="Kelas Online — donnyhidayat.blog">
<div class="max-w-6xl mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold text-gray-800 mb-2">Kelas Online</h1>
    <p class="text-gray-500 mb-10">Belajar langkah demi langkah bersama Donny Hidayat.</p>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($courses as $course)
            <a href="/kelas/{{ $course->slug }}" class="bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition overflow-hidden">
                @if($course->cover_image)
                    <img src="{{ asset('storage/'.$course->cover_image) }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-indigo-100 flex items-center justify-center text-indigo-400 text-5xl">🎓</div>
                @endif
                <div class="p-5">
                    <h3 class="font-semibold text-gray-800">{{ $course->title }}</h3>
                    <p class="text-gray-500 text-sm mt-1 line-clamp-2">{{ $course->description }}</p>
                    <div class="flex items-center justify-between mt-3">
                        <span class="text-xs text-gray-400">{{ $course->total_lessons }} pelajaran</span>
                        <span class="text-blue-700 font-bold">Rp {{ number_format($course->price, 0, ',', '.') }}</span>
                    </div>
                </div>
            </a>
        @empty
            <div class="col-span-3 text-center text-gray-400 py-20">
                <p class="text-4xl mb-3">🎓</p>
                <p>Belum ada kelas tersedia.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-10">{{ $courses->links() }}</div>
</div>
</x-layouts.app>
