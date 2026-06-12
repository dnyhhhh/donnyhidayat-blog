<x-layouts.admin :title="isset($course) ? 'Edit Kelas: '.$course->title : 'Tambah Kelas'">

    @if(session('success'))
        <div class="bg-green-50 text-green-700 text-sm rounded-lg px-4 py-3 mb-6">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="bg-red-50 text-red-700 text-sm rounded-lg px-4 py-3 mb-6">{{ $errors->first() }}</div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">

        {{-- Form Info Kelas --}}
        <div>
            <h2 class="text-base font-semibold text-gray-700 mb-4">Informasi Kelas</h2>
            <form method="POST"
                  action="{{ isset($course) ? '/admin/kelas/'.$course->id : '/admin/kelas' }}"
                  enctype="multipart/form-data"
                  class="bg-white rounded-2xl border border-gray-100 p-6 space-y-4">
                @csrf
                @if(isset($course)) @method('PUT') @endif

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Judul Kelas</label>
                    <input type="text" name="title" value="{{ old('title', $course->title ?? '') }}" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="description" rows="4" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $course->description ?? '') }}</textarea>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp)</label>
                        <input type="number" name="price" value="{{ old('price', $course->price ?? 0) }}" min="0" required
                            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                        <select name="category_id" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">— Pilih —</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id', $course->category_id ?? '') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Cover Image</label>
                    <input type="file" name="cover_image" accept="image/*"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700">
                    @if(isset($course) && $course->cover_image)
                        <img src="{{ asset('storage/'.$course->cover_image) }}" class="mt-2 h-20 rounded-lg object-cover">
                    @endif
                </div>

                <label class="flex items-center gap-2 text-sm text-gray-700">
                    <input type="checkbox" name="is_published" value="1" {{ old('is_published', $course->is_published ?? false) ? 'checked' : '' }}>
                    Publikasikan sekarang
                </label>

                <div class="flex gap-3 pt-1">
                    <button type="submit" class="bg-blue-700 text-white font-semibold px-5 py-2.5 rounded-lg hover:bg-blue-800 text-sm">Simpan Kelas</button>
                    <a href="/admin/kelas" class="text-sm text-gray-500 hover:text-gray-800 px-4 py-2.5">Batal</a>
                </div>
            </form>
        </div>

        {{-- Manajemen Pelajaran (hanya muncul setelah kelas tersimpan) --}}
        @isset($course)
        <div>
            <h2 class="text-base font-semibold text-gray-700 mb-4">
                Daftar Pelajaran
                <span class="text-xs font-normal text-gray-400 ml-1">({{ $course->lessons->count() }} pelajaran)</span>
            </h2>

            {{-- Form tambah pelajaran --}}
            <form method="POST" action="/admin/kelas/{{ $course->id }}/lessons"
                  class="bg-white rounded-2xl border border-gray-100 p-5 mb-5 space-y-3">
                @csrf
                <p class="text-sm font-medium text-gray-700">Tambah Pelajaran Baru</p>
                <input type="text" name="title" placeholder="Judul pelajaran" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                <input type="url" name="video_url" placeholder="URL Video (YouTube/Vimeo, opsional)"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                <textarea name="content" rows="3" placeholder="Deskripsi / materi teks (opsional)"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                <label class="flex items-center gap-2 text-sm text-gray-600">
                    <input type="checkbox" name="is_preview" value="1"> Jadikan preview gratis
                </label>
                <button type="submit" class="bg-blue-700 text-white text-sm font-semibold px-5 py-2 rounded-lg hover:bg-blue-800">
                    + Tambah Pelajaran
                </button>
            </form>

            {{-- Daftar pelajaran yang ada --}}
            @if($course->lessons->isEmpty())
                <div class="bg-white rounded-2xl border border-dashed border-gray-200 p-8 text-center text-gray-400 text-sm">
                    Belum ada pelajaran. Tambahkan di atas.
                </div>
            @else
                <div class="space-y-3">
                    @foreach($course->lessons as $lesson)
                        <details class="bg-white rounded-2xl border border-gray-100 group">
                            <summary class="flex items-center justify-between px-5 py-4 cursor-pointer list-none">
                                <div class="flex items-center gap-3">
                                    <span class="text-gray-400 text-sm font-mono w-5">{{ $loop->iteration }}</span>
                                    <span class="text-sm font-medium text-gray-800">{{ $lesson->title }}</span>
                                    @if($lesson->is_preview)
                                        <span class="text-xs bg-green-100 text-green-700 px-2 py-0.5 rounded-full">Preview</span>
                                    @endif
                                    @if($lesson->video_url)
                                        <span class="text-xs bg-blue-100 text-blue-700 px-2 py-0.5 rounded-full">Video</span>
                                    @endif
                                </div>
                                <span class="text-gray-400 text-xs group-open:rotate-180 transition-transform">▼</span>
                            </summary>

                            <div class="px-5 pb-5 border-t border-gray-50 pt-4 space-y-3">
                                <form method="POST" action="/admin/kelas/{{ $course->id }}/lessons/{{ $lesson->id }}"
                                      class="space-y-3">
                                    @csrf @method('PUT')
                                    <input type="text" name="title" value="{{ $lesson->title }}" required
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <input type="url" name="video_url" value="{{ $lesson->video_url }}" placeholder="URL Video (opsional)"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <textarea name="content" rows="3" placeholder="Deskripsi / materi teks"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $lesson->content }}</textarea>
                                    <label class="flex items-center gap-2 text-sm text-gray-600">
                                        <input type="checkbox" name="is_preview" value="1" {{ $lesson->is_preview ? 'checked' : '' }}>
                                        Preview gratis
                                    </label>
                                    <div class="flex items-center justify-between">
                                        <button type="submit" class="bg-blue-700 text-white text-xs font-semibold px-4 py-2 rounded-lg hover:bg-blue-800">Simpan</button>
                                        <form method="POST" action="/admin/kelas/{{ $course->id }}/lessons/{{ $lesson->id }}">
                                            @csrf @method('DELETE')
                                            <button type="button" data-confirm="Yakin ingin menghapus pelajaran ini?" data-submit-form class="text-xs text-red-600 hover:underline">Hapus</button>
                                        </form>
                                    </div>
                                </form>
                            </div>
                        </details>
                    @endforeach
                </div>
            @endif
        </div>
        @endisset

    </div>
</x-layouts.admin>
