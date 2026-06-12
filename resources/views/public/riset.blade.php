<x-layouts.app title="Ide Riset Skripsi — donnyhidayat.blog">
<div class="max-w-xl mx-auto px-4 py-12">

    {{-- Hero --}}
    <div style="text-align:center;margin-bottom:36px;">
        <span style="background:#eff6ff;color:#1d4ed8;font-size:12px;font-weight:700;padding:4px 16px;border-radius:20px;letter-spacing:1px;">IDE RISET SKRIPSI</span>
        <h1 style="font-size:1.9rem;font-weight:800;color:#111827;margin:16px 0 10px;line-height:1.2;">Temukan Topik Skripsi<br>yang Tepat Untukmu</h1>
        <p style="color:#6b7280;font-size:14px;max-width:400px;margin:0 auto;">Jawab 5 pertanyaan singkat — sistem akan mencarikan ide riset yang paling cocok.</p>
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

        {{-- Progress bar --}}
        <div style="margin-bottom:28px;">
            <div style="display:flex;justify-content:space-between;margin-bottom:8px;">
                <span style="font-size:12px;font-weight:600;color:#1d4ed8;" x-text="'Langkah ' + step + ' dari 5'"></span>
                <span style="font-size:12px;color:#9ca3af;" x-text="step === 1 ? 'Program Studi' : step === 2 ? 'Semester' : step === 3 ? 'Bidang Minat' : step === 4 ? 'Metode Penelitian' : 'Akses Data'"></span>
            </div>
            <div style="background:#e5e7eb;border-radius:99px;height:6px;">
                <div style="background:linear-gradient(90deg,#1d4ed8,#60a5fa);border-radius:99px;height:6px;transition:width .4s ease;"
                     :style="'width:' + (step/5*100) + '%'"></div>
            </div>
        </div>

        <form method="POST" action="/riset/generate">
            @csrf

            {{-- Step 1: Prodi & Konsentrasi --}}
            <div x-show="step === 1" style="background:#fff;border:1px solid #e5e7eb;border-radius:20px;padding:32px;">
                <div style="display:flex;align-items:center;gap:10px;margin-bottom:6px;">
                    <div style="width:32px;height:32px;border-radius:50%;background:#eff6ff;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <svg style="width:16px;height:16px;color:#1d4ed8;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0v6"/></svg>
                    </div>
                    <h2 style="font-size:1.1rem;font-weight:800;color:#111827;">Program Studi kamu apa?</h2>
                </div>
                <p style="font-size:13px;color:#9ca3af;margin-bottom:24px;padding-left:42px;">Ini yang paling menentukan topik yang relevan.</p>

                <div style="margin-bottom:16px;">
                    <label style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">Program Studi <span style="color:#ef4444;">*</span></label>
                    <input type="text" name="prodi" x-model="prodi" placeholder="cth: Manajemen, Teknik Informatika, Psikologi"
                           style="width:100%;border:1.5px solid #e5e7eb;border-radius:10px;padding:11px 14px;font-size:14px;outline:none;box-sizing:border-box;"
                           onfocus="this.style.borderColor='#1d4ed8'" onblur="this.style.borderColor='#e5e7eb'">
                </div>
                <div>
                    <label style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">
                        Konsentrasi / Peminatan
                        <span style="font-weight:400;color:#9ca3af;">(opsional)</span>
                    </label>
                    <input type="text" name="konsentrasi" x-model="konsentrasi" placeholder="cth: Pemasaran Digital, Keuangan, AI"
                           style="width:100%;border:1.5px solid #e5e7eb;border-radius:10px;padding:11px 14px;font-size:14px;outline:none;box-sizing:border-box;"
                           onfocus="this.style.borderColor='#1d4ed8'" onblur="this.style.borderColor='#e5e7eb'">
                </div>
            </div>

            {{-- Step 2: Semester --}}
            <div x-show="step === 2" style="background:#fff;border:1px solid #e5e7eb;border-radius:20px;padding:32px;">
                <div style="display:flex;align-items:center;gap:10px;margin-bottom:6px;">
                    <div style="width:32px;height:32px;border-radius:50%;background:#eff6ff;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <svg style="width:16px;height:16px;color:#1d4ed8;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <h2 style="font-size:1.1rem;font-weight:800;color:#111827;">Kamu sekarang semester berapa?</h2>
                </div>
                <p style="font-size:13px;color:#9ca3af;margin-bottom:24px;padding-left:42px;">Menentukan urgency dan pendekatan yang cocok.</p>

                <div style="display:flex;flex-direction:column;gap:10px;">
                    @foreach([
                        ['5', 'Baru Mulai', 'Semester 5–6', 'Masih punya banyak waktu untuk eksplorasi topik'],
                        ['7', 'Sedang Proses', 'Semester 7–9', 'Sudah mulai serius, butuh topik yang realistis'],
                        ['10', 'Mepet Deadline', 'Semester 10+', 'Butuh topik yang bisa dikerjakan cepat'],
                    ] as [$val, $label, $sub, $desc])
                    <label style="display:flex;align-items:center;gap:14px;border:1.5px solid #e5e7eb;border-radius:12px;padding:14px 16px;cursor:pointer;transition:border-color .2s;"
                           :style="semester === '{{ $val }}' ? 'border-color:#1d4ed8;background:#eff6ff;' : 'border-color:#e5e7eb;background:#fff;'">
                        <input type="radio" name="semester" value="{{ $val }}" x-model="semester" style="display:none;">
                        <div style="width:20px;height:20px;border-radius:50%;border:2px solid currentColor;display:flex;align-items:center;justify-content:center;flex-shrink:0;"
                             :style="semester === '{{ $val }}' ? 'border-color:#1d4ed8;color:#1d4ed8;' : 'border-color:#d1d5db;color:#d1d5db;'">
                            <div style="width:10px;height:10px;border-radius:50%;background:#1d4ed8;" x-show="semester === '{{ $val }}'"></div>
                        </div>
                        <div>
                            <p style="font-weight:700;font-size:14px;" :style="semester === '{{ $val }}' ? 'color:#1d4ed8;' : 'color:#111827;'">{{ $label }} <span style="font-weight:400;font-size:12px;color:#6b7280;">· {{ $sub }}</span></p>
                            <p style="font-size:12px;color:#9ca3af;margin-top:2px;">{{ $desc }}</p>
                        </div>
                    </label>
                    @endforeach
                </div>
            </div>

            {{-- Step 3: Bidang Minat --}}
            <div x-show="step === 3" style="background:#fff;border:1px solid #e5e7eb;border-radius:20px;padding:32px;">
                <div style="display:flex;align-items:center;gap:10px;margin-bottom:6px;">
                    <div style="width:32px;height:32px;border-radius:50%;background:#eff6ff;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <svg style="width:16px;height:16px;color:#1d4ed8;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    </div>
                    <h2 style="font-size:1.1rem;font-weight:800;color:#111827;">Bidang apa yang kamu minati?</h2>
                </div>
                <p style="font-size:13px;color:#9ca3af;margin-bottom:24px;padding-left:42px;">Pilih satu atau lebih yang relevan denganmu.</p>

                <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px;">
                    @foreach([
                        ['Teknologi & Sistem', 'cpu'],
                        ['Bisnis & Pemasaran', 'trending-up'],
                        ['Sosial & Komunitas', 'users'],
                        ['Pendidikan', 'academic'],
                        ['Kesehatan', 'heart'],
                        ['Keuangan', 'currency'],
                        ['Lingkungan', 'leaf'],
                        ['Hukum & Kebijakan', 'scale'],
                    ] as [$val, $icon])
                    <label style="display:flex;align-items:center;gap:10px;border:1.5px solid #e5e7eb;border-radius:12px;padding:12px 14px;cursor:pointer;transition:all .2s;"
                           :style="bidang.includes('{{ $val }}') ? 'border-color:#1d4ed8;background:#eff6ff;' : 'border-color:#e5e7eb;background:#fff;'">
                        <input type="checkbox" name="bidang[]" value="{{ $val }}" style="display:none;"
                               :checked="bidang.includes('{{ $val }}')" @change="toggleBidang('{{ $val }}')">
                        <div style="width:18px;height:18px;border-radius:4px;border:2px solid;display:flex;align-items:center;justify-content:center;flex-shrink:0;"
                             :style="bidang.includes('{{ $val }}') ? 'border-color:#1d4ed8;background:#1d4ed8;' : 'border-color:#d1d5db;background:transparent;'">
                            <svg x-show="bidang.includes('{{ $val }}')" style="width:11px;height:11px;color:#fff;" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span style="font-size:13px;font-weight:600;" :style="bidang.includes('{{ $val }}') ? 'color:#1d4ed8;' : 'color:#374151;'">{{ $val }}</span>
                    </label>
                    @endforeach
                </div>
            </div>

            {{-- Step 4: Metode --}}
            <div x-show="step === 4" style="background:#fff;border:1px solid #e5e7eb;border-radius:20px;padding:32px;">
                <div style="display:flex;align-items:center;gap:10px;margin-bottom:6px;">
                    <div style="width:32px;height:32px;border-radius:50%;background:#eff6ff;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <svg style="width:16px;height:16px;color:#1d4ed8;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    </div>
                    <h2 style="font-size:1.1rem;font-weight:800;color:#111827;">Metode penelitian yang kamu suka?</h2>
                </div>
                <p style="font-size:13px;color:#9ca3af;margin-bottom:24px;padding-left:42px;">Jika belum tahu, pilih "Belum tahu" — kami akan rekomendasikan yang paling umum.</p>

                <div style="display:flex;flex-direction:column;gap:10px;">
                    @foreach([
                        ['Kuantitatif', 'Berbasis angka, kuesioner, statistik, SPSS'],
                        ['Kualitatif', 'Wawancara mendalam, observasi, studi kasus'],
                        ['Mixed Methods', 'Gabungan kuantitatif dan kualitatif'],
                        ['Belum tahu', 'Rekomendasikan yang paling cocok untukku'],
                    ] as [$val, $desc])
                    <label style="display:flex;align-items:center;gap:14px;border:1.5px solid #e5e7eb;border-radius:12px;padding:14px 16px;cursor:pointer;"
                           :style="metode === '{{ $val }}' ? 'border-color:#1d4ed8;background:#eff6ff;' : 'border-color:#e5e7eb;background:#fff;'">
                        <input type="radio" name="metode" value="{{ $val }}" x-model="metode" style="display:none;">
                        <div style="width:20px;height:20px;border-radius:50%;border:2px solid;display:flex;align-items:center;justify-content:center;flex-shrink:0;"
                             :style="metode === '{{ $val }}' ? 'border-color:#1d4ed8;' : 'border-color:#d1d5db;'">
                            <div style="width:10px;height:10px;border-radius:50%;background:#1d4ed8;" x-show="metode === '{{ $val }}'"></div>
                        </div>
                        <div>
                            <p style="font-weight:700;font-size:14px;" :style="metode === '{{ $val }}' ? 'color:#1d4ed8;' : 'color:#111827;'">{{ $val }}</p>
                            <p style="font-size:12px;color:#9ca3af;margin-top:1px;">{{ $desc }}</p>
                        </div>
                    </label>
                    @endforeach
                </div>
            </div>

            {{-- Step 5: Akses Data --}}
            <div x-show="step === 5" style="background:#fff;border:1px solid #e5e7eb;border-radius:20px;padding:32px;">
                <div style="display:flex;align-items:center;gap:10px;margin-bottom:6px;">
                    <div style="width:32px;height:32px;border-radius:50%;background:#eff6ff;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <svg style="width:16px;height:16px;color:#1d4ed8;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"/></svg>
                    </div>
                    <h2 style="font-size:1.1rem;font-weight:800;color:#111827;">Akses data yang kamu punya?</h2>
                </div>
                <p style="font-size:13px;color:#9ca3af;margin-bottom:24px;padding-left:42px;">Sangat menentukan apakah topik bisa dieksekusi atau tidak.</p>

                <div style="display:flex;flex-direction:column;gap:10px;">
                    @foreach([
                        ['perusahaan', 'Punya akses ke perusahaan / instansi', 'Bisa melakukan penelitian langsung di organisasi'],
                        ['kuesioner', 'Bisa sebar kuesioner online', 'Akses ke responden lewat media sosial atau komunitas'],
                        ['sekunder', 'Punya data sekunder / dataset', 'Laporan keuangan, BPS, Kaggle, atau data publik lainnya'],
                        ['belum', 'Belum punya akses khusus', 'Kami akan rekomendasikan topik yang fleksibel'],
                    ] as [$val, $label, $desc])
                    <label style="display:flex;align-items:center;gap:14px;border:1.5px solid #e5e7eb;border-radius:12px;padding:14px 16px;cursor:pointer;"
                           :style="akses === '{{ $val }}' ? 'border-color:#1d4ed8;background:#eff6ff;' : 'border-color:#e5e7eb;background:#fff;'">
                        <input type="radio" name="akses" value="{{ $val }}" x-model="akses" style="display:none;">
                        <div style="width:20px;height:20px;border-radius:50%;border:2px solid;display:flex;align-items:center;justify-content:center;flex-shrink:0;"
                             :style="akses === '{{ $val }}' ? 'border-color:#1d4ed8;' : 'border-color:#d1d5db;'">
                            <div style="width:10px;height:10px;border-radius:50%;background:#1d4ed8;" x-show="akses === '{{ $val }}'"></div>
                        </div>
                        <div>
                            <p style="font-weight:700;font-size:14px;" :style="akses === '{{ $val }}' ? 'color:#1d4ed8;' : 'color:#111827;'">{{ $label }}</p>
                            <p style="font-size:12px;color:#9ca3af;margin-top:1px;">{{ $desc }}</p>
                        </div>
                    </label>
                    @endforeach
                </div>
            </div>

            {{-- Navigasi --}}
            <div style="display:flex;gap:10px;margin-top:16px;">
                <button type="button" x-show="step > 1" @click="step--"
                        style="flex:1;border:1.5px solid #e5e7eb;background:#fff;color:#374151;font-weight:600;font-size:14px;padding:13px;border-radius:12px;cursor:pointer;">
                    ← Kembali
                </button>

                <button type="button" x-show="step < 5" @click="canNext() && step++"
                        :style="canNext() ? 'background:linear-gradient(135deg,#1d4ed8,#2563eb);color:#fff;cursor:pointer;opacity:1;' : 'background:#e5e7eb;color:#9ca3af;cursor:not-allowed;opacity:.8;'"
                        style="flex:1;font-weight:700;font-size:14px;padding:13px;border-radius:12px;border:none;">
                    Lanjut →
                </button>

                <button type="submit" x-show="step === 5"
                        :disabled="!canNext()"
                        :style="canNext() ? 'background:linear-gradient(135deg,#1d4ed8,#2563eb);cursor:pointer;opacity:1;' : 'background:#e5e7eb;color:#9ca3af;cursor:not-allowed;opacity:.8;'"
                        style="flex:1;display:inline-flex;align-items:center;justify-content:center;gap:8px;color:#fff;font-weight:700;font-size:14px;padding:13px;border-radius:12px;border:none;">
                    <svg style="width:16px;height:16px;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    Temukan Ide Riset
                </button>
            </div>
        </form>
    </div>

    {{-- Info bawah --}}
    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:10px;margin-top:20px;">
        @foreach([
            ['target', 'Dipersonalisasi', 'Disesuaikan dengan profilmu'],
            ['lightning', 'Instan', 'Hasil langsung muncul'],
            ['chat', 'Bisa Diskusi', 'Konsultasi via WhatsApp'],
        ] as [$icon, $title, $desc])
        <div style="background:#fff;border:1px solid #e5e7eb;border-radius:14px;padding:14px;text-align:center;">
            <p style="display:flex;justify-content:center;margin-bottom:6px;color:#1d4ed8;">
                @if($icon === 'target')
                    <svg style="width:20px;height:20px;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 1v4M12 19v4M1 12h4M19 12h4"/></svg>
                @elseif($icon === 'lightning')
                    <svg style="width:20px;height:20px;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                @elseif($icon === 'chat')
                    <svg style="width:20px;height:20px;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                @endif
            </p>
            <p style="font-weight:700;font-size:12px;color:#111827;">{{ $title }}</p>
            <p style="font-size:11px;color:#6b7280;margin-top:2px;">{{ $desc }}</p>
        </div>
        @endforeach
    </div>

</div>
</x-layouts.app>
