<x-layouts.app title="Blog — donnyhidayat.blog">
<div class="max-w-4xl mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold text-gray-800 mb-2">Blog</h1>
    <p class="text-gray-500 mb-10">Artikel, tips, dan insight dari Donny Hidayat.</p>

    <div class="space-y-6">
        @forelse($posts as $post)
            <a href="/blog/{{ $post->slug }}" class="block bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition p-6">
                <div class="flex items-start justify-between gap-4">
                    <div class="flex-1">
                        @if($post->category)
                            <span class="text-xs font-semibold text-blue-700 bg-blue-50 px-2 py-1 rounded-full">{{ $post->category->name }}</span>
                        @endif
                        <h2 class="text-lg font-bold text-gray-800 mt-2">{{ $post->title }}</h2>
                        <p class="text-gray-500 text-sm mt-1 line-clamp-2">{{ $post->excerpt }}</p>
                        <p class="text-xs text-gray-400 mt-3">{{ $post->published_at?->format('d M Y') }}</p>
                    </div>
                    @if($post->cover_image)
                        <img src="{{ asset('storage/'.$post->cover_image) }}" class="w-24 h-20 object-cover rounded-xl flex-shrink-0">
                    @endif
                </div>
            </a>
        @empty
            <div class="text-center text-gray-400 py-20">
                <p class="text-4xl mb-3">✍️</p>
                <p>Belum ada artikel.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-10">{{ $posts->links() }}</div>
</div>
</x-layouts.app>
