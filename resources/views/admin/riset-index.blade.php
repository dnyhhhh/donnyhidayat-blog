<x-layouts.admin title="Ide Riset Skripsi">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-bold text-gray-800">Ide Riset Skripsi</h2>
        <a href="/admin/riset/create" class="bg-blue-700 text-white text-sm font-semibold px-4 py-2 rounded-lg hover:bg-blue-800">+ Tambah Ide</a>
    </div>

    @if(session('success'))
        <div class="bg-green-50 text-green-700 text-sm rounded-lg px-4 py-3 mb-4">{{ session('success') }}</div>
    @endif

    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-500 text-xs uppercase">
                <tr>
                    <th class="text-left px-5 py-3">Judul Ide Riset</th>
                    <th class="text-left px-5 py-3">Fakultas</th>
                    <th class="text-left px-5 py-3">Konsentrasi</th>
                    <th class="text-left px-5 py-3">Metode</th>
                    <th class="text-left px-5 py-3">Status</th>
                    <th class="text-left px-5 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($ideas as $idea)
                <tr class="hover:bg-gray-50">
                    <td class="px-5 py-3 font-medium text-gray-800 max-w-xs">
                        <p class="line-clamp-2">{{ $idea->judul }}</p>
                    </td>
                    <td class="px-5 py-3 text-gray-500">{{ $idea->fakultas ?: '—' }}</td>
                    <td class="px-5 py-3 text-gray-500">{{ $idea->konsentrasi ?: '—' }}</td>
                    <td class="px-5 py-3 text-gray-500">{{ $idea->metode ?: '—' }}</td>
                    <td class="px-5 py-3">
                        @if($idea->is_active)
                            <span class="bg-green-100 text-green-700 text-xs font-semibold px-2 py-1 rounded-full">Aktif</span>
                        @else
                            <span class="bg-gray-100 text-gray-500 text-xs font-semibold px-2 py-1 rounded-full">Nonaktif</span>
                        @endif
                    </td>
                    <td class="px-5 py-3">
                        <div class="flex gap-3">
                            <a href="/admin/riset/{{ $idea->id }}/edit" class="text-blue-600 hover:underline text-xs">Edit</a>
                            <form method="POST" action="/admin/riset/{{ $idea->id }}" >
                                @csrf @method('DELETE')
                                <button class="text-red-500 hover:underline text-xs">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="px-5 py-8 text-center text-gray-400">Belum ada ide riset. Tambahkan dulu!</td></tr>
                @endforelse
            </tbody>
        </table>
        @if($ideas->hasPages())
            <div class="px-5 py-3 border-t border-gray-100">{{ $ideas->links() }}</div>
        @endif
    </div>
</x-layouts.admin>
