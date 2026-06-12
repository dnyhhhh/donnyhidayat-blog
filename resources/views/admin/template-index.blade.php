<x-layouts.admin title="Template Website">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-bold text-gray-800">Template Website</h2>
        <a href="/admin/template/create" class="bg-blue-700 text-white text-sm font-semibold px-4 py-2 rounded-lg hover:bg-blue-800">+ Tambah Template</a>
    </div>

    @if(session('success'))
        <div class="bg-green-50 text-green-700 text-sm rounded-lg px-4 py-3 mb-4">{{ session('success') }}</div>
    @endif

    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-500 text-xs uppercase">
                <tr>
                    <th class="text-left px-5 py-3">Judul</th>
                    <th class="text-left px-5 py-3">Tech Stack</th>
                    <th class="text-left px-5 py-3">Harga</th>
                    <th class="text-left px-5 py-3">Status</th>
                    <th class="text-left px-5 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($templates as $template)
                <tr class="hover:bg-gray-50">
                    <td class="px-5 py-3 font-medium text-gray-800">
                        {{ $template->title }}
                        @if($template->preview_url)
                            <a href="{{ $template->preview_url }}" target="_blank" class="ml-1 text-xs text-blue-500">↗ Preview</a>
                        @endif
                    </td>
                    <td class="px-5 py-3 text-gray-500">{{ $template->tech_stack ?? '—' }}</td>
                    <td class="px-5 py-3 text-gray-700">Rp {{ number_format($template->price, 0, ',', '.') }}</td>
                    <td class="px-5 py-3">
                        @if($template->is_published)
                            <span class="bg-green-100 text-green-700 text-xs font-semibold px-2 py-1 rounded-full">Published</span>
                        @else
                            <span class="bg-gray-100 text-gray-500 text-xs font-semibold px-2 py-1 rounded-full">Draft</span>
                        @endif
                    </td>
                    <td class="px-5 py-3">
                        <div class="flex gap-3">
                            <a href="/admin/template/{{ $template->id }}/edit" class="text-blue-600 hover:underline text-xs">Edit</a>
                            <form method="POST" action="/admin/template/{{ $template->id }}" >
                                @csrf @method('DELETE')
                                <button class="text-red-500 hover:underline text-xs">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="px-5 py-8 text-center text-gray-400">Belum ada template.</td></tr>
                @endforelse
            </tbody>
        </table>
        @if($templates->hasPages())
            <div class="px-5 py-3 border-t border-gray-100">{{ $templates->links() }}</div>
        @endif
    </div>
</x-layouts.admin>
