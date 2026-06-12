<x-layouts.app title="Ide Riset Skripsi — donnyhidayat.blog">
<div class="max-w-xl mx-auto px-4 py-12">

    {{-- Hero --}}
    <div class="text-center mb-9">
        <span class="bg-blue-50 text-blue-700 text-xs font-bold px-4 py-1 rounded-full tracking-widest uppercase">IDE RISET SKRIPSI</span>
        <h1 class="text-3xl font-extrabold text-gray-900 mt-4 mb-2 leading-tight">Temukan Topik Skripsi<br>yang Tepat Untukmu</h1>
        <p class="text-gray-500 text-sm max-w-sm mx-auto">Jawab 5 pertanyaan singkat — sistem akan mencarikan ide riset yang paling cocok.</p>
    </div>

    <div x-data="{
        step: 1,
        prodi: '{{ old('prodi', '') }}',
        konsentrasi: '{{ old('konsentrasi', '') }}',
        semester: '{{ old('semester', '') }}',
        bidang: {{ old('bidang') ? json_encode(old('bidang')) : '[]' }},
        metode: '{{ old('metode', '') }}',
        akses: '{{ old('akses', '') }}',
        toggleBidang(val) {
            const i = this.bidang.indexOf(val);
            if (i >= 0) this.bidang.splice(i, 1); else this.bidang.push(val);
        },
        canNext() {
            if (this.step === 1) return this.prodi.trim() !== '';
            if (this.step === 2) return this.semester !== '';
            if (this.step === 3) return this.bidang.length > 0;
            if (this.step === 4) return this.metode !== '';
            if (this.step === 5) return this.akses !== '';
            return true;
        }
    }">

        {{-- Progress --}}
        <div class="mb-7">
            <div class="flex justify-between mb-2">
                <span class="text-xs font-semibold text-blue-700" x-text="'Langkah ' + step + ' dari 5'"></span>
                <span class="text-xs text-gray-400" x-text="['','Program Studi','Semester','Bidang Minat','Metode Penelitian','Akses Data'][step]"></span>
            </div>
            <div class="bg-gray-200 rounded-full h-1.5">
                <div class="bg-gradient-to-r from-blue-700 to-blue-400 rounded-full h-1.5 transition-all duration-500"
                     :style="'width:' + (step/5*100) + '%'"></div>
            </div>
        </div>

        <form method="POST" action="/riset/generate">
            @csrf

            {{-- Step 1: Prodi & Konsentrasi --}}
            <div x-show="step === 1" class="bg-white border border-gray-200 rounded-2xl p-8">
                <div class="flex items-center gap-3 mb-1">
                    <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-blue-700" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0v6"/></svg>
                    </div>
                    <h2 class="text-lg font-extrabold text-gray-900">Program Studi kamu apa?</h2>
                </div>
                <p class="text-xs text-gray-400 mb-6 pl-11">Ini yang paling menentukan topik yang relevan.</p>

                <div class="mb-4">
                    <label class="block text-xs font-semibold text-gray-600 mb-1.5">Program Studi <span class="text-red-500">*</span></label>
                    <input type="text" name="prodi" x-model="prodi" placeholder="cth: Manajemen, Teknik Informatika, Psikologi"
                           class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm outline-none focus:border-blue-600 transition">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-600 mb-1.5">Konsentrasi / Peminatan <span class="text-gray-400 font-normal">(opsional)</span></label>
                    <input type="text" name="konsentrasi" x-model="konsentrasi" placeholder="cth: Pemasaran Digital, Keuangan, AI"
                           class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm outline-none focus:border-blue-600 transition">
                </div>
            </div>

            {{-- Step 2: Semester --}}
            <div x-show="step === 2" class="bg-white border border-gray-200 rounded-2xl p-8">
                <div class="flex items-center gap-3 mb-1">
                    <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-blue-700" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <h2 class="text-lg font-extrabold text-gray-900">Kamu sekarang semester berapa?</h2>
                </div>
                <p class="text-xs text-gray-400 mb-6 pl-11">Menentukan urgency dan pendekatan yang cocok.</p>

                <div class="flex flex-col gap-3">
                    @foreach([
                        ['5',  'Baru Mulai',      'Semester 5–6',  'Masih punya banyak waktu untuk eksplorasi topik'],
                        ['7',  'Sedang Proses',   'Semester 7–9',  'Sudah mulai serius, butuh topik yang realistis'],
                        ['10', 'Mepet Deadline',  'Semester 10+',  'Butuh topik yang bisa dikerjakan cepat'],
                    ] as [$val, $label, $sub, $desc])
                    <label class="flex items-center gap-4 border rounded-xl px-4 py-3.5 cursor-pointer transition"
                           :class="semester === '{{ $val }}' ? 'border-blue-600 bg-blue-50' : 'border-gray-200 bg-white'">
                        <input type="radio" name="semester" value="{{ $val }}" x-model="semester" class="hidden">
                        <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center flex-shrink-0 transition"
                             :class="semester === '{{ $val }}' ? 'border-blue-600' : 'border-gray-300'">
                            <div class="w-2.5 h-2.5 rounded-full bg-blue-600" x-show="semester === '{{ $val }}'"></div>
                        </div>
                        <div>
                            <p class="text-sm font-bold" :class="semester === '{{ $val }}' ? 'text-blue-700' : 'text-gray-800'">
                                {{ $label }} <span class="font-normal text-gray-400">· {{ $sub }}</span>
                            </p>
                            <p class="text-xs text-gray-400 mt-0.5">{{ $desc }}</p>
                        </div>
                    </label>
                    @endforeach
                </div>
            </div>

            {{-- Step 3: Bidang Minat --}}
            <div x-show="step === 3" class="bg-white border border-gray-200 rounded-2xl p-8">
                <div class="flex items-center gap-3 mb-1">
                    <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-blue-700" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    </div>
                    <h2 class="text-lg font-extrabold text-gray-900">Bidang apa yang kamu minati?</h2>
                </div>
                <p class="text-xs text-gray-400 mb-6 pl-11">Pilih satu atau lebih yang relevan denganmu.</p>

                <div class="grid grid-cols-2 gap-2">
                    @foreach([
                        'Teknologi & Sistem',
                        'Bisnis & Pemasaran',
                        'Sosial & Komunitas',
                        'Pendidikan',
                        'Kesehatan',
                        'Keuangan',
                        'Lingkungan',
                        'Hukum & Kebijakan',
                    ] as $val)
                    <label class="flex items-center gap-2.5 border rounded-xl px-3.5 py-3 cursor-pointer transition"
                           :class="bidang.includes('{{ $val }}') ? 'border-blue-600 bg-blue-50' : 'border-gray-200 bg-white'">
                        <input type="checkbox" name="bidang[]" value="{{ $val }}" class="hidden"
                               :checked="bidang.includes('{{ $val }}')" @change="toggleBidang('{{ $val }}')">
                        <div class="w-4.5 h-4.5 rounded border-2 flex items-center justify-center flex-shrink-0 transition"
                             :class="bidang.includes('{{ $val }}') ? 'border-blue-600 bg-blue-600' : 'border-gray-300 bg-white'"
                             style="width:18px;height:18px;border-radius:4px;">
                            <svg x-show="bidang.includes('{{ $val }}')" class="text-white" style="width:11px;height:11px;" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span class="text-sm font-semibold transition"
                              :class="bidang.includes('{{ $val }}') ? 'text-blue-700' : 'text-gray-700'">{{ $val }}</span>
                    </label>
                    @endforeach
                </div>
            </div>

            {{-- Step 4: Metode --}}
            <div x-show="step === 4" class="bg-white border border-gray-200 rounded-2xl p-8">
                <div class="flex items-center gap-3 mb-1">
                    <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-blue-700" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    </div>
                    <h2 class="text-lg font-extrabold text-gray-900">Metode penelitian yang kamu suka?</h2>
                </div>
                <p class="text-xs text-gray-400 mb-6 pl-11">Belum tahu? Pilih "Belum tahu" — kami rekomendasikan yang paling umum.</p>

                <div class="flex flex-col gap-3">
                    @foreach([
                        ['Kuantitatif',   'Berbasis angka, kuesioner, statistik, SPSS'],
                        ['Kualitatif',    'Wawancara mendalam, observasi, studi kasus'],
                        ['Mixed Methods', 'Gabungan kuantitatif dan kualitatif'],
                        ['Belum tahu',   'Rekomendasikan yang paling cocok untukku'],
                    ] as [$val, $desc])
                    <label class="flex items-center gap-4 border rounded-xl px-4 py-3.5 cursor-pointer transition"
                           :class="metode === '{{ $val }}' ? 'border-blue-600 bg-blue-50' : 'border-gray-200 bg-white'">
                        <input type="radio" name="metode" value="{{ $val }}" x-model="metode" class="hidden">
                        <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center flex-shrink-0 transition"
                             :class="metode === '{{ $val }}' ? 'border-blue-600' : 'border-gray-300'">
                            <div class="w-2.5 h-2.5 rounded-full bg-blue-600" x-show="metode === '{{ $val }}'"></div>
                        </div>
                        <div>
                            <p class="text-sm font-bold" :class="metode === '{{ $val }}' ? 'text-blue-700' : 'text-gray-800'">{{ $val }}</p>
                            <p class="text-xs text-gray-400 mt-0.5">{{ $desc }}</p>
                        </div>
                    </label>
                    @endforeach
                </div>
            </div>

            {{-- Step 5: Akses Data --}}
            <div x-show="step === 5" class="bg-white border border-gray-200 rounded-2xl p-8">
                <div class="flex items-center gap-3 mb-1">
                    <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-blue-700" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"/></svg>
                    </div>
                    <h2 class="text-lg font-extrabold text-gray-900">Akses data yang kamu punya?</h2>
                </div>
                <p class="text-xs text-gray-400 mb-6 pl-11">Sangat menentukan apakah topik bisa dieksekusi atau tidak.</p>

                <div class="flex flex-col gap-3">
                    @foreach([
                        ['perusahaan', 'Punya akses ke perusahaan / instansi', 'Bisa melakukan penelitian langsung di organisasi'],
                        ['kuesioner',  'Bisa sebar kuesioner online',           'Akses ke responden lewat medsos atau komunitas'],
                        ['sekunder',   'Punya data sekunder / dataset',         'Laporan keuangan, BPS, Kaggle, atau data publik'],
                        ['belum',      'Belum punya akses khusus',              'Kami rekomendasikan topik yang fleksibel'],
                    ] as [$val, $label, $desc])
                    <label class="flex items-center gap-4 border rounded-xl px-4 py-3.5 cursor-pointer transition"
                           :class="akses === '{{ $val }}' ? 'border-blue-600 bg-blue-50' : 'border-gray-200 bg-white'">
                        <input type="radio" name="akses" value="{{ $val }}" x-model="akses" class="hidden">
                        <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center flex-shrink-0 transition"
                             :class="akses === '{{ $val }}' ? 'border-blue-600' : 'border-gray-300'">
                            <div class="w-2.5 h-2.5 rounded-full bg-blue-600" x-show="akses === '{{ $val }}'"></div>
                        </div>
                        <div>
                            <p class="text-sm font-bold" :class="akses === '{{ $val }}' ? 'text-blue-700' : 'text-gray-800'">{{ $label }}</p>
                            <p class="text-xs text-gray-400 mt-0.5">{{ $desc }}</p>
                        </div>
                    </label>
                    @endforeach
                </div>
            </div>

            {{-- Navigasi --}}
            <div class="flex gap-3 mt-4">
                <button type="button" x-show="step > 1" @click="step--"
                        class="flex-1 border border-gray-200 bg-white text-gray-700 font-semibold text-sm py-3.5 rounded-xl cursor-pointer hover:bg-gray-50 transition">
                    ← Kembali
                </button>

                <button type="button" x-show="step < 5" @click="canNext() && step++"
                        class="flex-1 font-bold text-sm py-3.5 rounded-xl border-none transition"
                        :class="canNext() ? 'bg-gradient-to-r from-blue-700 to-blue-500 text-white cursor-pointer' : 'bg-gray-200 text-gray-400 cursor-not-allowed'">
                    Lanjut →
                </button>

                <button type="submit" x-show="step === 5" :disabled="!canNext()"
                        class="flex-1 inline-flex items-center justify-center gap-2 font-bold text-sm py-3.5 rounded-xl border-none text-white transition"
                        :class="canNext() ? 'bg-gradient-to-r from-blue-700 to-blue-500 cursor-pointer' : 'bg-gray-200 text-gray-400 cursor-not-allowed'">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    Temukan Ide Riset
                </button>
            </div>
        </form>
    </div>

    {{-- Info bawah --}}
    <div class="grid grid-cols-3 gap-3 mt-5">
        @foreach([
            ['target',    'Dipersonalisasi', 'Disesuaikan dengan profilmu'],
            ['lightning', 'Instan',          'Hasil langsung muncul'],
            ['chat',      'Bisa Diskusi',    'Konsultasi via WhatsApp'],
        ] as [$icon, $title, $desc])
        <div class="bg-white border border-gray-200 rounded-2xl p-4 text-center">
            <div class="flex justify-center mb-1.5 text-blue-700">
                @if($icon === 'target')
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 1v4M12 19v4M1 12h4M19 12h4"/></svg>
                @elseif($icon === 'lightning')
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                @elseif($icon === 'chat')
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                @endif
            </div>
            <p class="font-bold text-xs text-gray-900">{{ $title }}</p>
            <p class="text-xs text-gray-400 mt-0.5">{{ $desc }}</p>
        </div>
        @endforeach
    </div>

</div>
</x-layouts.app>
