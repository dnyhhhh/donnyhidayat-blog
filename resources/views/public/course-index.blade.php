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
                    <div class="w-full h-48 bg-indigo-100 flex items-center justify-center text-indigo-400"><svg style="width:56px;height:56px;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg></div>
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
                <p class="mb-3 flex justify-center text-indigo-300"><svg style="width:40px;height:40px;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg></p>
                <p>Belum ada kelas tersedia.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-10">{{ $courses->links() }}</div>
</div>
</x-layouts.app>
