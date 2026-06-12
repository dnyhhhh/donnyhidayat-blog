<x-layouts.admin :title="isset($template) ? 'Edit Template' : 'Tambah Template'">
    <div class="max-w-2xl">
        @if($errors->any())
            <div class="bg-red-50 text-red-700 text-sm rounded-lg px-4 py-3 mb-6">{{ $errors->first() }}</div>
        @endif

        <form method="POST"
              action="{{ isset($template) ? '/admin/template/'.$template->id : '/admin/template' }}"
              enctype="multipart/form-data"
              class="bg-white rounded-2xl border border-gray-100 p-8 space-y-5">
            @csrf
            @if(isset($template)) @method('PUT') @endif

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Judul Template</label>
                <input type="text" name="title" value="{{ old('title', $template->title ?? '') }}" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea name="description" rows="4"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $template->description ?? '') }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp)</label>
                    <input type="number" name="price" value="{{ old('price', $template->price ?? 0) }}" min="0" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tech Stack</label>
                    <input type="text" name="tech_stack" value="{{ old('tech_stack', $template->tech_stack ?? '') }}" placeholder="Laravel, Tailwind CSS"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">URL Preview / Demo (opsional)</label>
                <input type="url" name="preview_url" value="{{ old('preview_url', $template->preview_url ?? '') }}" placeholder="https://demo.example.com"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Cover Image</label>
                <input type="file" name="cover_image" accept="image/*"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700">
                @if(isset($template) && $template->cover_image)
                    <img src="{{ asset('storage/'.$template->cover_image) }}" class="mt-2 h-20 rounded-lg object-cover">
                @endif
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">File Template (ZIP) {{ isset($template) ? '(kosongkan jika tidak ganti)' : '' }}</label>
                <input type="file" name="file" accept=".zip,.rar,.tar.gz"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-gray-50 file:text-gray-700">
                @if(isset($template) && $template->file_path)
                    <p class="text-xs text-gray-400 mt-1">File saat ini: {{ basename($template->file_path) }}</p>
                @endif
            </div>

            <label class="flex items-center gap-2 text-sm text-gray-700">
                <input type="checkbox" name="is_published" value="1" {{ old('is_published', $template->is_published ?? false) ? 'checked' : '' }}>
                Publikasikan sekarang
            </label>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="bg-blue-700 text-white font-semibold px-6 py-2.5 rounded-lg hover:bg-blue-800 text-sm">Simpan</button>
                <a href="/admin/template" class="text-sm text-gray-500 hover:text-gray-800 px-4 py-2.5">Batal</a>
            </div>
        </form>
    </div>
</x-layouts.admin>
