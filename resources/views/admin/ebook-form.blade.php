<x-layouts.admin :title="isset($ebook) ? 'Edit Ebook' : 'Tambah Ebook'">
    <div class="max-w-2xl">
        @if($errors->any())
            <div class="bg-red-50 text-red-700 text-sm rounded-lg px-4 py-3 mb-6">{{ $errors->first() }}</div>
        @endif

        <form method="POST"
              action="{{ isset($ebook) ? '/admin/ebook/'.$ebook->id : '/admin/ebook' }}"
              enctype="multipart/form-data"
              class="bg-white rounded-2xl border border-gray-100 p-8 space-y-5">
            @csrf
            @if(isset($ebook)) @method('PUT') @endif

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                <input type="text" name="title" value="{{ old('title', $ebook->title ?? '') }}" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea name="description" rows="4" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $ebook->description ?? '') }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp)</label>
                    <input type="number" name="price" value="{{ old('price', $ebook->price ?? 0) }}" min="0" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                    <select name="category_id" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">— Pilih Kategori —</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id', $ebook->category_id ?? '') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Cover Image</label>
                <input type="file" name="cover_image" accept="image/*"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700">
                @if(isset($ebook) && $ebook->cover_image)
                    <img src="{{ asset('storage/'.$ebook->cover_image) }}" class="mt-2 h-20 rounded-lg">
                @endif
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">File PDF {{ isset($ebook) ? '(kosongkan jika tidak ganti)' : '' }}</label>
                <input type="file" name="file" accept=".pdf" {{ !isset($ebook) ? 'required' : '' }}
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-gray-50 file:text-gray-700">
            </div>

            <label class="flex items-center gap-2 text-sm text-gray-700">
                <input type="checkbox" name="is_published" value="1" {{ old('is_published', $ebook->is_published ?? false) ? 'checked' : '' }}>
                Publikasikan sekarang
            </label>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="bg-blue-700 text-white font-semibold px-6 py-2.5 rounded-lg hover:bg-blue-800 text-sm">Simpan</button>
                <a href="/admin/ebook" class="text-sm text-gray-500 hover:text-gray-800 px-4 py-2.5">Batal</a>
            </div>
        </form>
    </div>
</x-layouts.admin>
