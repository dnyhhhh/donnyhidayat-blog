<x-layouts.admin :title="isset($idea) ? 'Edit Ide Riset' : 'Tambah Ide Riset'">
    <div class="max-w-2xl">
        @if($errors->any())
            <div class="bg-red-50 text-red-700 text-sm rounded-lg px-4 py-3 mb-6">{{ $errors->first() }}</div>
        @endif

        <form method="POST"
              action="{{ isset($idea) ? '/admin/riset/'.$idea->id : '/admin/riset' }}"
              class="bg-white rounded-2xl border border-gray-100 p-8 space-y-5">
            @csrf
            @if(isset($idea)) @method('PUT') @endif

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Judul Ide Riset</label>
                <input type="text" name="judul" value="{{ old('judul', $idea->judul ?? '') }}" required
                    placeholder="cth: Pengaruh Media Sosial Terhadap Keputusan Pembelian Generasi Z"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Singkat</label>
                <textarea name="deskripsi" rows="4" required
                    placeholder="Jelaskan gambaran umum topik riset ini..."
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('deskripsi', $idea->deskripsi ?? '') }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Fakultas <span class="text-gray-400 font-normal">(opsional)</span>
                    </label>
                    <input type="text" name="fakultas" value="{{ old('fakultas', $idea->fakultas ?? '') }}"
                        placeholder="cth: Ekonomi, Teknik, FISIP"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <p class="text-xs text-gray-400 mt-1">Kosongkan = cocok untuk semua fakultas</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Konsentrasi <span class="text-gray-400 font-normal">(opsional)</span>
                    </label>
                    <input type="text" name="konsentrasi" value="{{ old('konsentrasi', $idea->konsentrasi ?? '') }}"
                        placeholder="cth: Pemasaran, Keuangan, SDM"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Metode Penelitian</label>
                <select name="metode" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">— Semua metode —</option>
                    @foreach(['Kuantitatif','Kualitatif','Mixed Methods'] as $m)
                        <option value="{{ $m }}" {{ old('metode', $idea->metode ?? '') === $m ? 'selected' : '' }}>{{ $m }}</option>
                    @endforeach
                </select>
            </div>

            <label class="flex items-center gap-2 text-sm text-gray-700">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $idea->is_active ?? true) ? 'checked' : '' }}>
                Aktifkan (tampil ke mahasiswa)
            </label>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="bg-blue-700 text-white font-semibold px-6 py-2.5 rounded-lg hover:bg-blue-800 text-sm">Simpan</button>
                <a href="/admin/riset" class="text-sm text-gray-500 hover:text-gray-800 px-4 py-2.5">Batal</a>
            </div>
        </form>
    </div>
</x-layouts.admin>
