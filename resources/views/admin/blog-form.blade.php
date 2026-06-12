<x-layouts.admin :title="isset($post) ? 'Edit Artikel' : 'Tulis Artikel'">
    <div class="max-w-3xl">
        @if($errors->any())
            <div class="bg-red-50 text-red-700 text-sm rounded-lg px-4 py-3 mb-6">{{ $errors->first() }}</div>
        @endif

        <form method="POST"
              action="{{ isset($post) ? '/admin/blog/'.$post->id : '/admin/blog' }}"
              enctype="multipart/form-data"
              class="bg-white rounded-2xl border border-gray-100 p-8 space-y-5">
            @csrf
            @if(isset($post)) @method('PUT') @endif

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                <input type="text" name="title" value="{{ old('title', $post->title ?? '') }}" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Excerpt (ringkasan singkat)</label>
                <textarea name="excerpt" rows="2"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Isi Artikel</label>
                <textarea name="body" rows="12" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 font-mono">{{ old('body', $post->body ?? '') }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                    <select name="category_id" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">— Pilih Kategori —</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id', $post->category_id ?? '') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Cover Image</label>
                    <input type="file" name="cover_image" accept="image/*"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700">
                    @if(isset($post) && $post->cover_image)
                        <img src="{{ asset('storage/'.$post->cover_image) }}" class="mt-2 h-16 rounded-lg">
                    @endif
                </div>
            </div>

            <label class="flex items-center gap-2 text-sm text-gray-700">
                <input type="checkbox" name="is_published" value="1" {{ old('is_published', $post->is_published ?? false) ? 'checked' : '' }}>
                Publikasikan sekarang
            </label>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="bg-blue-700 text-white font-semibold px-6 py-2.5 rounded-lg hover:bg-blue-800 text-sm">Simpan</button>
                <a href="/admin/blog" class="text-sm text-gray-500 hover:text-gray-800 px-4 py-2.5">Batal</a>
            </div>
        </form>
    </div>
</x-layouts.admin>
