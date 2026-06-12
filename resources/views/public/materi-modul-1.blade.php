<x-layouts.app title="Modul 1 — Perjalanan & Transportasi | English Unlocked">

<div x-data="modul1()" x-init="loadProgress()" class="max-w-3xl mx-auto px-4 py-10">

    {{-- Header --}}
    <div class="mb-8">
        <a href="/materi" class="text-sm text-blue-700 hover:underline">← Kembali ke Materi</a>
        <div style="margin-top:20px;background:linear-gradient(135deg,#1e3a5f,#1d4ed8);border-radius:16px;padding:24px 28px;color:#fff;">
            <p style="font-size:11px;letter-spacing:.08em;text-transform:uppercase;color:#93c5fd;margin-bottom:6px;">🌍 Tema 1</p>
            <h1 style="font-size:1.4rem;font-weight:800;margin-bottom:4px;">Perjalanan & Transportasi</h1>
            <p style="font-size:13px;color:#bfdbfe;">Travel, Airports, Planes & New Experiences</p>
            <div style="margin-top:16px;background:rgba(255,255,255,0.15);border-radius:8px;height:8px;overflow:hidden;">
                <div style="height:100%;background:#4ade80;border-radius:8px;transition:width .5s;" :style="'width:'+progressPct()+'%'"></div>
            </div>
            <p style="font-size:12px;color:#93c5fd;margin-top:6px;" x-text="progressPct()+'% selesai'"></p>
        </div>
    </div>

    {{-- ══ BAGIAN 1: RECALL ══ --}}
    <div class="section-card" id="sec-recall">
        <div class="section-header">
            <span class="section-badge">📌 Recall</span>
            <h2 class="section-title">Aktivasi Pengetahuan Awal</h2>
        </div>
        <p class="section-desc">Ini adalah unit pertamamu! Sebelum mulai, tuliskan 5 kata bahasa Inggris yang sudah kamu tahu tentang "perjalanan":</p>
        <div style="display:grid;grid-template-columns:repeat(5,1fr);gap:10px;margin-top:16px;">
            @for($i=1;$i<=5;$i++)
            <div>
                <label style="font-size:11px;color:#9ca3af;display:block;margin-bottom:4px;">Kata {{ $i }}</label>
                <input type="text" x-model="recall[{{ $i-1 }}]" @input="saveProgress()"
                       placeholder="..." class="ipt-base">
            </div>
            @endfor
        </div>
        <div class="check-row">
            <label class="check-label">
                <input type="checkbox" x-model="checks.recall" @change="saveProgress()"> Selesai ✓
            </label>
        </div>
    </div>

    {{-- ══ BAGIAN 2: TEKS CERITA ══ --}}
    <div class="section-card">
        <div class="section-header">
            <span class="section-badge">📰 Unit 1</span>
            <h2 class="section-title">Teks Cerita: A New Adventure</h2>
        </div>
        <div class="reading-box">
            <h3 style="font-weight:700;font-size:15px;margin-bottom:12px;">A New Adventure Begins</h3>
            <p>Every year, millions of people travel around the world to explore new places and experience different cultures. Traveling is not just about visiting tourist attractions; it is also a chance to learn new languages, try local food, and make lifelong friends.</p>
            <p style="margin-top:10px;">Last month, a young woman named Sarah decided to travel alone for the first time. She had always dreamed of visiting Bali, the beautiful island in Indonesia. After saving money for almost a year, she finally booked her flight. She packed her bags carefully: two shirts, one pair of jeans, a raincoat, sunscreen, and her travel journal.</p>
            <p style="margin-top:10px;">At the airport, Sarah felt nervous but incredibly excited. She checked in her luggage, passed through security, and found her gate. While waiting, she read a guidebook about Bali and wrote her first journal entry: <em>"I have never traveled alone before. But today, everything changes. I am ready for this adventure."</em></p>
            <p style="margin-top:10px;">When the plane landed in Bali, Sarah immediately noticed the warm air and the smell of tropical flowers. A friendly driver was waiting with a sign that said her name. During the drive, she saw rice fields, temples, and colorful festivals. She smiled and thought to herself: <em>"This is the best decision I have ever made."</em></p>
        </div>
        <div class="check-row">
            <label class="check-label"><input type="checkbox" x-model="checks.baca1" @change="saveProgress()"> Sudah baca ✓</label>
        </div>
    </div>

    {{-- ══ BAGIAN 3: VOCABULARY BOX ══ --}}
    <div class="section-card">
        <div class="section-header">
            <span class="section-badge">📦 Vocabulary</span>
            <h2 class="section-title">Kosakata Penting</h2>
        </div>
        <div style="overflow-x:auto;">
            <table style="width:100%;border-collapse:collapse;font-size:13px;">
                <thead>
                    <tr style="background:#f8fafc;">
                        <th style="text-align:left;padding:10px 12px;color:#374151;font-weight:600;border-bottom:2px solid #e5e7eb;">Kata Inggris</th>
                        <th style="text-align:left;padding:10px 12px;color:#374151;font-weight:600;border-bottom:2px solid #e5e7eb;">Arti</th>
                        <th style="text-align:left;padding:10px 12px;color:#374151;font-weight:600;border-bottom:2px solid #e5e7eb;">Contoh</th>
                        <th style="text-align:left;padding:10px 12px;color:#374151;font-weight:600;border-bottom:2px solid #e5e7eb;">Pengucapan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach([
                        ['explore','menjelajahi','We explored the old city.','ek-SPLOR'],
                        ['experience','pengalaman / merasakan','She experienced new things.','ek-SPEER-ee-ens'],
                        ['attraction','tempat wisata','The temple is popular.','a-TRAK-shun'],
                        ['guidebook','buku panduan wisata','He bought a guidebook.','GAID-buk'],
                        ['luggage','koper / bagasi','My luggage is too heavy.','LUG-ij'],
                        ['journal','buku harian','She wrote in her journal.','JUR-nal'],
                        ['incredible','luar biasa','It was an incredible view.','in-KRED-i-bul'],
                        ['adventure','petualangan','Life is an adventure.','ad-VEN-chur'],
                        ['tropical','tropis','Bali has tropical weather.','TROP-i-kul'],
                        ['immediately','segera / langsung','She called me immediately.','i-MEE-dee-at-lee'],
                    ] as $i => [$word,$arti,$contoh,$ucap])
                    <tr style="border-bottom:1px solid #f3f4f6;{{ $i%2==0 ? '' : 'background:#fafafa;' }}">
                        <td style="padding:10px 12px;font-weight:700;color:#1d4ed8;">{{ $word }}</td>
                        <td style="padding:10px 12px;color:#374151;">{{ $arti }}</td>
                        <td style="padding:10px 12px;color:#6b7280;font-style:italic;">{{ $contoh }}</td>
                        <td style="padding:10px 12px;font-family:monospace;color:#7c3aed;font-size:12px;">{{ $ucap }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- ══ BAGIAN 4: TERJEMAHKAN ══ --}}
    <div class="section-card">
        <div class="section-header">
            <span class="section-badge">✏️ Latihan 1</span>
            <h2 class="section-title">Terjemahkan ke Bahasa Indonesia</h2>
        </div>
        <p class="section-desc">Terjemahkan setiap kalimat. Coba sendiri dulu sebelum cek kunci jawaban!</p>

        @php
        $soalTerjemah = [
            ['q'=>'"Every year, millions of people travel around the world to explore new places."','a'=>'Setiap tahun, jutaan orang bepergian ke seluruh dunia untuk menjelajahi tempat-tempat baru.'],
            ['q'=>'"Traveling is not just about visiting tourist attractions."','a'=>'Bepergian bukan hanya tentang mengunjungi tempat wisata.'],
            ['q'=>'"She had always dreamed of visiting Bali, the beautiful island in Indonesia."','a'=>'Dia selalu bermimpi untuk mengunjungi Bali, pulau indah di Indonesia.'],
            ['q'=>'"After saving money for almost a year, she finally booked her flight."','a'=>'Setelah menabung hampir setahun, dia akhirnya memesan tiket pesawatnya.'],
            ['q'=>'"She packed her bags carefully: two shirts, one pair of jeans, a raincoat..."','a'=>'Dia mengemas tasnya dengan hati-hati: dua kaos, sepasang jins, jas hujan...'],
            ['q'=>'"At the airport, Sarah felt nervous but incredibly excited."','a'=>'Di bandara, Sarah merasa gugup tapi sangat antusias.'],
            ['q'=>'"I have never traveled alone before. But today, everything changes."','a'=>'Aku belum pernah bepergian sendiri sebelumnya. Tapi hari ini, segalanya berubah.'],
            ['q'=>'"When the plane landed in Bali, Sarah immediately noticed the warm air."','a'=>'Ketika pesawat mendarat di Bali, Sarah langsung merasakan udara hangat.'],
            ['q'=>'"She saw rice fields, temples, and colorful festivals."','a'=>'Dia melihat sawah, candi, dan festival yang penuh warna.'],
            ['q'=>'"This is the best decision I have ever made."','a'=>'Ini adalah keputusan terbaik yang pernah aku buat.'],
        ];
        @endphp

        <div class="space-y-4" style="margin-top:16px;">
            @foreach($soalTerjemah as $i => $s)
            <div style="background:#f8fafc;border-radius:12px;padding:16px;">
                <p style="font-size:13px;font-style:italic;color:#374151;margin-bottom:8px;">{{ $i+1 }}. {{ $s['q'] }}</p>
                <textarea x-model="terjemah[{{ $i }}]" @input="saveProgress()"
                          rows="2" placeholder="📝 Terjemahan saya..." class="ipt-base"></textarea>
                <div x-show="showKey.terjemah" style="margin-top:8px;background:#dcfce7;border-radius:8px;padding:10px;font-size:12px;color:#15803d;display:none;">
                    ✓ {{ $s['a'] }}
                </div>
            </div>
            @endforeach
        </div>
        <button @click="showKey.terjemah = !showKey.terjemah; saveProgress()"
                class="btn-check" x-text="showKey.terjemah ? '🙈 Sembunyikan Kunci' : '🔑 Lihat Kunci Jawaban'"></button>
        <div class="check-row">
            <label class="check-label"><input type="checkbox" x-model="checks.terjemah" @change="saveProgress()"> Selesai ✓</label>
        </div>
    </div>

    {{-- ══ BAGIAN 5: TEKS 2 ══ --}}
    <div class="section-card">
        <div class="section-header">
            <span class="section-badge">📰 Teks 2</span>
            <h2 class="section-title">Types of Travelers</h2>
        </div>
        <div class="reading-box">
            <p>People travel for many different reasons. Some people travel for <strong>business</strong> — they visit other cities or countries to attend meetings, conferences, or to close important deals. They usually stay in business hotels and fly in business class.</p>
            <p style="margin-top:10px;">Other people travel for <strong>leisure</strong>. They want to relax, see new sights, and escape from their daily routine. Some prefer beach destinations like Bali or the Maldives, while others prefer city trips to places like Paris or Tokyo.</p>
            <p style="margin-top:10px;">There is also a growing group called <strong>"backpackers."</strong> Backpackers travel with only a small backpack and a limited budget. They prefer cheap hostels, local street food, and public transportation. For backpackers, the journey itself is more important than the destination.</p>
        </div>
        <h3 style="font-weight:700;font-size:14px;color:#374151;margin:20px 0 12px;">✏️ Jawab Pertanyaan:</h3>

        @php
        $soalTeks2 = [
            ['q'=>'Mengapa orang yang bepergian untuk bisnis biasanya pergi?','a'=>'Mereka pergi untuk menghadiri rapat, konferensi, atau menutup kesepakatan penting.'],
            ['q'=>'Apa yang dimaksud dengan "leisure travel"?','a'=>'Perjalanan untuk bersantai, melihat tempat baru, dan kabur dari rutinitas sehari-hari.'],
            ['q'=>'Siapa yang disebut "backpackers"?','a'=>'Orang yang bepergian hanya dengan ransel kecil dan anggaran terbatas.'],
            ['q'=>'Apa yang lebih penting bagi backpacker — perjalanan atau tujuan?','a'=>'Perjalanan itu sendiri lebih penting daripada tujuannya.'],
        ];
        @endphp

        <div class="space-y-4">
            @foreach($soalTeks2 as $i => $s)
            <div style="background:#f8fafc;border-radius:12px;padding:16px;">
                <p style="font-size:13px;color:#374151;font-weight:600;margin-bottom:8px;">{{ $i+1 }}. {{ $s['q'] }}</p>
                <textarea x-model="teks2[{{ $i }}]" @input="saveProgress()"
                          rows="2" placeholder="✏️ Jawaban saya..." class="ipt-base"></textarea>
                <div x-show="showKey.teks2" style="margin-top:8px;background:#dcfce7;border-radius:8px;padding:10px;font-size:12px;color:#15803d;display:none;">
                    ✓ {{ $s['a'] }}
                </div>
            </div>
            @endforeach
        </div>
        <button @click="showKey.teks2 = !showKey.teks2" class="btn-check"
                x-text="showKey.teks2 ? '🙈 Sembunyikan Kunci' : '🔑 Lihat Kunci Jawaban'"></button>
        <div class="check-row">
            <label class="check-label"><input type="checkbox" x-model="checks.teks2" @change="saveProgress()"> Selesai ✓</label>
        </div>
    </div>

    {{-- ══ BAGIAN 6: DIALOG ══ --}}
    <div class="section-card">
        <div class="section-header">
            <span class="section-badge">💬 Unit 2</span>
            <h2 class="section-title">Dialog: Di Check-in Counter Bandara</h2>
        </div>
        <p class="section-desc">Terjemahkan setiap baris dialog ke Bahasa Indonesia.</p>

        @php
        $dialog = [
            ['role'=>'Officer','text'=>'Good morning! Welcome to check-in. May I see your passport and booking confirmation, please?','ans'=>'Selamat pagi! Selamat datang di check-in. Boleh saya lihat paspor dan konfirmasi pemesanan Anda?'],
            ['role'=>'Sarah','text'=>'Good morning! Of course. Here is my passport and here is the confirmation email on my phone.','ans'=>'Selamat pagi! Tentu saja. Ini paspor saya dan ini email konfirmasinya di ponsel saya.'],
            ['role'=>'Officer','text'=>'Thank you. Are you traveling alone today, Miss Sarah?','ans'=>'Terima kasih. Apakah Anda bepergian sendirian hari ini, Nona Sarah?'],
            ['role'=>'Sarah','text'=>'Yes, I am. This is actually my very first solo trip! I am so excited.','ans'=>'Ya. Ini sebenarnya perjalanan sendirian pertama saya! Saya sangat antusias.'],
            ['role'=>'Officer','text'=>'How wonderful! Bali is a beautiful destination. Do you have any checked baggage today?','ans'=>'Luar biasa! Bali adalah destinasi yang indah. Apakah Anda memiliki bagasi hari ini?'],
            ['role'=>'Sarah','text'=>'Yes, just one suitcase. I hope it is not too heavy. I may have packed a few too many things!','ans'=>'Ya, hanya satu koper. Semoga tidak terlalu berat. Sepertinya saya mengemas terlalu banyak!'],
            ['role'=>'Officer','text'=>'No worries! Let me weigh it. It is 22 kilograms. The limit is 23 kilograms, so you are perfectly fine!','ans'=>'Tidak apa-apa! Biarkan saya timbang. Beratnya 22 kilogram. Batasnya 23 kilogram, jadi Anda aman!'],
            ['role'=>'Sarah','text'=>'Oh, what a relief! I was worried about that. Which gate do I need to go to?','ans'=>'Oh, lega sekali! Saya khawatir tentang itu. Gate mana yang harus saya tuju?'],
            ['role'=>'Officer','text'=>'You will be at Gate 14, Terminal 3. Boarding begins in one hour at 9:15 AM. Here is your boarding pass.','ans'=>'Anda akan di Gate 14, Terminal 3. Boarding dimulai dalam satu jam pukul 09.15. Ini boarding pass Anda.'],
            ['role'=>'Sarah','text'=>'Thank you so much! Is there a good coffee shop near Gate 14?','ans'=>'Terima kasih banyak! Apakah ada kedai kopi yang bagus di dekat Gate 14?'],
            ['role'=>'Officer','text'=>'Yes! There is a great café just past the security area. Have a wonderful trip!','ans'=>'Ya! Ada kafe bagus tepat setelah area keamanan. Selamat menikmati perjalanan!'],
        ];
        @endphp

        <div style="margin-top:16px;space-y:12px;">
            @foreach($dialog as $i => $d)
            <div style="margin-bottom:12px;display:flex;gap:10px;align-items:flex-start;">
                <span style="flex-shrink:0;font-size:12px;font-weight:700;padding:4px 10px;border-radius:20px;margin-top:8px;
                    {{ $d['role']==='Officer' ? 'background:#eff6ff;color:#1d4ed8;' : 'background:#f0fdf4;color:#15803d;' }}">
                    {{ $d['role'] }}
                </span>
                <div style="flex:1;">
                    <p style="font-size:13px;font-style:italic;color:#374151;margin-bottom:6px;">{{ $d['text'] }}</p>
                    <input type="text" x-model="dialog[{{ $i }}]" @input="saveProgress()"
                           placeholder="✏️ Arti..." class="ipt-base">
                    <div x-show="showKey.dialog" style="font-size:12px;color:#15803d;margin-top:4px;display:none;">✓ {{ $d['ans'] }}</div>
                </div>
            </div>
            @endforeach
        </div>

        <h3 style="font-weight:700;font-size:13px;color:#374151;margin:20px 0 10px;">🔑 Key Expressions</h3>
        <div style="background:#fafafa;border-radius:10px;padding:14px;font-size:12px;color:#374151;line-height:2;">
            <strong>May I see your...?</strong> → Boleh saya lihat ... Anda? &nbsp;|&nbsp;
            <strong>solo trip</strong> → perjalanan sendirian &nbsp;|&nbsp;
            <strong>No worries!</strong> → Tidak apa-apa! &nbsp;|&nbsp;
            <strong>What a relief!</strong> → Lega sekali! &nbsp;|&nbsp;
            <strong>boarding pass</strong> → kartu boarding &nbsp;|&nbsp;
            <strong>checked baggage</strong> → bagasi terdaftar
        </div>

        <button @click="showKey.dialog = !showKey.dialog" class="btn-check"
                x-text="showKey.dialog ? '🙈 Sembunyikan Kunci' : '🔑 Lihat Kunci Jawaban'"></button>
        <div class="check-row">
            <label class="check-label"><input type="checkbox" x-model="checks.dialog" @change="saveProgress()"> Selesai ✓</label>
        </div>
    </div>

    {{-- ══ BAGIAN 7: GRAMMAR ══ --}}
    <div class="section-card">
        <div class="section-header">
            <span class="section-badge">💡 Grammar</span>
            <h2 class="section-title">Simple Past Tense</h2>
        </div>
        <div style="background:#faf5ff;border-left:4px solid #7c3aed;border-radius:0 12px 12px 0;padding:16px;font-size:13px;color:#374151;line-height:1.8;">
            <p><strong>Digunakan untuk:</strong> menceritakan kejadian yang sudah selesai di masa lalu.</p>
            <p style="margin-top:8px;"><strong>Rumus:</strong> Subject + Verb-2 (kata kerja bentuk ke-2)</p>
            <div style="margin-top:10px;display:flex;flex-wrap:wrap;gap:8px;">
                @foreach(['decided → memutuskan','packed → mengemas','arrived → tiba','felt → merasa','noticed → menyadari'] as $v)
                <span style="background:#ede9fe;color:#6d28d9;font-size:12px;padding:4px 10px;border-radius:8px;">✅ {{ $v }}</span>
                @endforeach
            </div>
        </div>
        <h3 style="font-weight:700;font-size:14px;color:#374151;margin:20px 0 10px;">✏️ Buat 3 kalimat Past Tense tentang perjalananmu:</h3>
        @for($i=0;$i<3;$i++)
        <div style="display:flex;align-items:center;gap:10px;margin-bottom:10px;">
            <span style="font-size:13px;color:#9ca3af;font-weight:600;width:20px;">{{ $i+1 }}.</span>
            <input type="text" x-model="grammar[{{ $i }}]" @input="saveProgress()"
                   placeholder="e.g. I traveled to Jakarta last year." class="ipt-base" style="flex:1;">
        </div>
        @endfor
        <div class="check-row">
            <label class="check-label"><input type="checkbox" x-model="checks.grammar" @change="saveProgress()"> Selesai ✓</label>
        </div>
    </div>

    {{-- ══ BAGIAN 8: SELF-CHECK ══ --}}
    <div class="section-card" style="background:linear-gradient(135deg,#f0fdf4,#dcfce7);border-color:#bbf7d0;">
        <div class="section-header">
            <span class="section-badge" style="background:#bbf7d0;color:#15803d;">⭐ Self-Check</span>
            <h2 class="section-title">Ringkasan Progress Modul 1</h2>
        </div>
        <div style="display:grid;gap:10px;margin-bottom:20px;">
            @foreach([
                ['recall','Menulis 5 kata tentang perjalanan'],
                ['baca1','Membaca teks "A New Adventure"'],
                ['terjemah','Menerjemahkan 10 kalimat'],
                ['teks2','Menjawab pertanyaan Teks 2'],
                ['dialog','Menerjemahkan dialog bandara'],
                ['grammar','Membuat kalimat Past Tense'],
            ] as [$key,$label])
            <label style="display:flex;align-items:center;gap:10px;cursor:pointer;">
                <div :style="checks.{{ $key }} ? 'background:#16a34a;border-color:#16a34a;' : 'background:#fff;border-color:#d1d5db;'"
                     style="width:20px;height:20px;border-radius:6px;border:2px solid;display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:all .2s;">
                    <span x-show="checks.{{ $key }}" style="color:#fff;font-size:12px;font-weight:700;">✓</span>
                </div>
                <span style="font-size:14px;color:#374151;" :class="checks.{{ $key }} ? 'line-through text-gray-400' : ''">{{ $label }}</span>
            </label>
            @endforeach
        </div>

        <div style="background:#fff;border-radius:12px;padding:16px;text-align:center;">
            <p style="font-size:13px;color:#6b7280;margin-bottom:4px;">Progress Modul 1</p>
            <p style="font-size:2.5rem;font-weight:900;color:#15803d;" x-text="progressPct()+'%'"></p>
            <div style="background:#e5e7eb;border-radius:8px;height:10px;margin-top:8px;overflow:hidden;">
                <div style="height:100%;background:linear-gradient(90deg,#16a34a,#4ade80);border-radius:8px;transition:width .5s;" :style="'width:'+progressPct()+'%'"></div>
            </div>
        </div>

        <div style="margin-top:16px;">
            <label style="display:block;font-size:13px;color:#374151;font-weight:600;margin-bottom:6px;">⭐ Nilai diri sendiri (1–10):</label>
            <input type="number" min="1" max="10" x-model="selfScore" @input="saveProgress()"
                   placeholder="Nilai..." class="ipt-base" style="width:120px;">
        </div>

        <button @click="resetProgress()" style="margin-top:16px;font-size:12px;color:#ef4444;background:none;border:none;cursor:pointer;padding:0;">
            🔄 Reset Progress Modul Ini
        </button>
    </div>

</div>

<style>
.section-card {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 16px;
    padding: 24px;
    margin-bottom: 20px;
    box-shadow: 0 1px 4px rgba(0,0,0,0.06);
}
.section-header { margin-bottom: 12px; }
.section-badge {
    display: inline-block;
    background: #eff6ff;
    color: #1d4ed8;
    font-size: 11px;
    font-weight: 700;
    padding: 3px 10px;
    border-radius: 20px;
    letter-spacing: .04em;
    margin-bottom: 6px;
}
.section-title { font-size: 16px; font-weight: 800; color: #111827; }
.section-desc { font-size: 13px; color: #6b7280; line-height: 1.6; }
.reading-box {
    background: #f8fafc;
    border-left: 4px solid #1d4ed8;
    border-radius: 0 12px 12px 0;
    padding: 16px 20px;
    font-size: 14px;
    line-height: 1.8;
    color: #374151;
}
.ipt-base {
    width: 100%;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    padding: 9px 12px;
    font-size: 13px;
    outline: none;
    transition: border .2s;
    box-sizing: border-box;
    font-family: inherit;
}
.ipt-base:focus { border-color: #1d4ed8; box-shadow: 0 0 0 3px rgba(29,78,216,.08); }
.btn-check {
    margin-top: 14px;
    font-size: 13px;
    font-weight: 600;
    color: #1d4ed8;
    background: #eff6ff;
    border: none;
    border-radius: 8px;
    padding: 8px 16px;
    cursor: pointer;
}
.check-row { margin-top: 14px; padding-top: 14px; border-top: 1px solid #f3f4f6; }
.check-label { display: flex; align-items: center; gap: 8px; font-size: 13px; color: #374151; cursor: pointer; font-weight: 600; }
.space-y-4 > * + * { margin-top: 12px; }
</style>

<script>
function modul1() {
    const KEY = 'modul1_progress';
    return {
        recall: ['','','','',''],
        terjemah: Array(10).fill(''),
        teks2: Array(4).fill(''),
        dialog: Array(11).fill(''),
        grammar: ['','',''],
        selfScore: '',
        checks: { recall:false, baca1:false, terjemah:false, teks2:false, dialog:false, grammar:false },
        showKey: { terjemah:false, teks2:false, dialog:false },

        loadProgress() {
            const saved = localStorage.getItem(KEY);
            if (saved) {
                const d = JSON.parse(saved);
                Object.assign(this, d);
            }
        },
        saveProgress() {
            localStorage.setItem(KEY, JSON.stringify({
                recall: this.recall,
                terjemah: this.terjemah,
                teks2: this.teks2,
                dialog: this.dialog,
                grammar: this.grammar,
                selfScore: this.selfScore,
                checks: this.checks,
            }));
        },
        progressPct() {
            const done = Object.values(this.checks).filter(Boolean).length;
            return Math.round(done / 6 * 100);
        },
        resetProgress() {
            if (!confirm('Reset semua progress Modul 1?')) return;
            localStorage.removeItem(KEY);
            location.reload();
        },
    }
}
</script>

</x-layouts.app>
