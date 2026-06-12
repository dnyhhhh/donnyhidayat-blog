<x-layouts.admin title="Kelola Ebook">
    @if(session('success'))
        <div class="bg-green-50 text-green-700 text-sm rounded-lg px-4 py-3 mb-6">{{ session('success') }}</div>
    @endif

    <div class="flex justify-end mb-6">
        <a href="/admin/ebook/create" class="bg-blue-700 text-white text-sm font-semibold px-5 py-2.5 rounded-lg hover:bg-blue-800">+ Tambah Ebook</a>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-500 text-xs uppercase">
                <tr>
                    <th class="px-6 py-3 text-left">Judul</th>
                    <th class="px-6 py-3 text-left">Harga</th>
                    <th class="px-6 py-3 text-left">Status</th>
                    <th class="px-6 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($ebooks as $ebook)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-800">{{ $ebook->title }}</td>
                        <td class="px-6 py-4">Rp {{ number_format($ebook->price, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">
                            <span @class([
                                'text-xs font-semibold px-2 py-1 rounded-full',
                                'bg-green-100 text-green-700' => $ebook->is_published,
                                'bg-gray-100 text-gray-500'   => !$ebook->is_published,
                            ])>{{ $ebook->is_published ? 'Publik' : 'Draft' }}</span>
                        </td>
                        <td class="px-6 py-4 flex gap-3">
                            <a href="/admin/ebook/{{ $ebook->id }}/edit" class="text-blue-700 hover:underline text-xs">Edit</a>
                            <form method="POST" action="/admin/ebook/{{ $ebook->id }}" onsubmit="return confirm('Hapus ebook ini?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600 hover:underline text-xs">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-6 py-10 text-center text-gray-400">Belum ada ebook.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-6">{{ $ebooks->links() }}</div>
</x-layouts.admin>
