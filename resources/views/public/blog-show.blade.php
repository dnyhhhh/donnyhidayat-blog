<x-layouts.app :title="$post->title . ' — donnyhidayat.blog'">
<div class="max-w-3xl mx-auto px-4 py-12">
    <a href="/blog" class="text-sm text-blue-700 hover:underline">← Kembali ke Blog</a>

    <article class="mt-6">
        @if($post->cover_image)
            <img src="{{ asset('storage/'.$post->cover_image) }}" class="w-full h-64 object-cover rounded-2xl mb-8">
        @endif

        @if($post->category)
            <span class="text-xs font-semibold text-blue-700 bg-blue-50 px-3 py-1 rounded-full">{{ $post->category->name }}</span>
        @endif

        <h1 class="text-3xl font-bold text-gray-800 mt-4 leading-tight">{{ $post->title }}</h1>
        <p class="text-sm text-gray-400 mt-2">{{ $post->published_at?->format('d M Y') }}</p>

        <div class="prose prose-gray max-w-none mt-8 leading-relaxed text-gray-700">
            {!! nl2br(e($post->body)) !!}
        </div>
    </article>

    <div class="mt-16 pt-8 border-t border-gray-100">
        <p class="text-sm font-semibold text-gray-800">Donny Hidayat</p>
        <p class="text-sm text-gray-500 mt-1">donnyhidayat.blog</p>
    </div>
</div>
</x-layouts.app>
