<x-layouts.admin title="Kelola Blog">
    @if(session('success'))
        <div class="bg-green-50 text-green-700 text-sm rounded-lg px-4 py-3 mb-6">{{ session('success') }}</div>
    @endif

    <div class="flex justify-end mb-6">
        <a href="/admin/blog/create" class="bg-blue-700 text-white text-sm font-semibold px-5 py-2.5 rounded-lg hover:bg-blue-800">+ Tulis Artikel</a>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-500 text-xs uppercase">
                <tr>
                    <th class="px-6 py-3 text-left">Judul</th>
                    <th class="px-6 py-3 text-left">Tanggal</th>
                    <th class="px-6 py-3 text-left">Status</th>
                    <th class="px-6 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($posts as $post)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-800">{{ $post->title }}</td>
                        <td class="px-6 py-4 text-gray-500">{{ $post->published_at?->format('d M Y') ?? '-' }}</td>
                        <td class="px-6 py-4">
                            <span @class([
                                'text-xs font-semibold px-2 py-1 rounded-full',
                                'bg-green-100 text-green-700' => $post->is_published,
                                'bg-gray-100 text-gray-500'   => !$post->is_published,
                            ])>{{ $post->is_published ? 'Publik' : 'Draft' }}</span>
                        </td>
                        <td class="px-6 py-4 flex gap-3">
                            <a href="/admin/blog/{{ $post->id }}/edit" class="text-blue-700 hover:underline text-xs">Edit</a>
                            <form method="POST" action="/admin/blog/{{ $post->id }}" >
                                @csrf @method('DELETE')
                                <button type="button" data-confirm="Yakin ingin menghapus data ini? Tindakan ini tidak bisa dibatalkan." data-submit-form class="text-red-600 hover:underline text-xs">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-6 py-10 text-center text-gray-400">Belum ada artikel.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-6">{{ $posts->links() }}</div>
</x-layouts.admin>
