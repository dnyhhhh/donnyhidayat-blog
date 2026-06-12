<x-layouts.app title="{{ $materi->title }} — donnyhidayat.blog">

{{-- Hero --}}
<section style="background:linear-gradient(135deg,#1e3a5f 0%,#1d4ed8 60%,#2563eb 100%);color:#fff;padding:64px 0 48px;">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <a href="/materi" style="display:inline-block;margin-bottom:20px;font-size:13px;color:#93c5fd;">← Kembali ke Materi Interaktif</a>
        <span style="background:rgba(255,255,255,0.15);border:1px solid rgba(255,255,255,0.3);font-size:12px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;padding:4px 14px;border-radius:20px;display:inline-block;margin-bottom:20px;">🌍 Belajar Bahasa Inggris</span>
        <h1 style="font-size:2.2rem;font-weight:900;line-height:1.15;margin-bottom:16px;">English Unlocked<br><span style="color:#93c5fd;">Materi Interaktif</span></h1>
        <p style="font-size:16px;color:#bfdbfe;max-width:560px;margin:0 auto 32px;line-height:1.7;">Bukan sekadar baca buku — kerjakan langsung di browser. Isi terjemahan, jawab soal, cek hasilmu. Semua yang tadinya di kertas, kini bisa dilakukan online.</p>

        @if($owned)
            <a href="/materi/modul/1"
               style="display:inline-flex;align-items:center;gap:8px;background:#16a34a;color:#fff;font-weight:700;font-size:16px;padding:15px 32px;border-radius:14px;text-decoration:none;">
                📖 Lanjutkan Belajar — Modul 1
            </a>
        @else
            <div style="display:flex;flex-direction:column;align-items:center;gap:12px;">
                <div style="display:flex;align-items:baseline;gap:8px;margin-bottom:4px;">
                    <span style="font-size:2.5rem;font-weight:900;">Rp 12.000</span>
                    <span style="font-size:14px;color:#93c5fd;">/ akses selamanya</span>
                </div>
                @auth
                <form method="POST" action="/member/checkout">
                    @csrf
                    <input type="hidden" name="type" value="materi">
                    <input type="hidden" name="id" value="1">
                    <button type="submit"
                            style="display:inline-flex;align-items:center;gap:8px;background:#16a34a;color:#fff;font-weight:700;font-size:16px;padding:15px 32px;border-radius:14px;border:none;cursor:pointer;">
                        🚀 Mulai Belajar Sekarang
                    </button>
                </form>
                @else
                <a href="/login"
                   style="display:inline-flex;align-items:center;gap:8px;background:#16a34a;color:#fff;font-weight:700;font-size:16px;padding:15px 32px;border-radius:14px;text-decoration:none;">
                    🚀 Daftar & Mulai Belajar
                </a>
                @endauth
                <p style="font-size:12px;color:#93c5fd;">Bayar sekali, akses selamanya. Konfirmasi dalam 1×24 jam.</p>
            </div>
        @endif
    </div>
</section>

{{-- Fitur --}}
<section class="max-w-4xl mx-auto px-4 py-14">
    <div class="grid md:grid-cols-3 gap-5">
        @foreach([
            ['✏️','Latihan Interaktif','Isi langsung di web seperti mengisi buku latihan. Tidak perlu kertas dan pensil.'],
            ['🔑','Kunci Jawaban Instan','Cek jawabanmu setelah selesai mengerjakan setiap bagian.'],
            ['📊','Pantau Progress','Setiap modul punya progress tracker agar kamu tahu sejauh mana sudah belajar.'],
        ] as [$icon, $title, $desc])
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 text-center">
            <div style="font-size:36px;margin-bottom:12px;">{{ $icon }}</div>
            <p style="font-weight:700;color:#111827;margin-bottom:8px;">{{ $title }}</p>
            <p style="font-size:13px;color:#6b7280;line-height:1.6;">{{ $desc }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- Daftar Modul --}}
<section class="max-w-4xl mx-auto px-4 pb-16">
    <h2 style="font-size:1.3rem;font-weight:800;color:#111827;margin-bottom:20px;">📚 Isi Materi — 5 Tema, 20 Unit</h2>

    @php
    $modules = [
        ['num'=>1,'emoji'=>'🌍','tema'=>'Perjalanan & Transportasi','units'=>['Unit 1 — Teks Cerita & Terjemahan','Unit 2 — Dialog Bandara & Pesawat','Unit 3 — Latihan Pengucapan','Unit 4 — Soal Pilihan Ganda & Isian'],'available'=>true],
        ['num'=>2,'emoji'=>'💼','tema'=>'Dunia Kerja & Karier','units'=>['Unit 5–8'],'available'=>false],
        ['num'=>3,'emoji'=>'🏥','tema'=>'Kesehatan & Tubuh','units'=>['Unit 9–12'],'available'=>false],
        ['num'=>4,'emoji'=>'📱','tema'=>'Teknologi & Media Sosial','units'=>['Unit 13–16'],'available'=>false],
        ['num'=>5,'emoji'=>'🍽️','tema'=>'Makanan, Tempat & Gaya Hidup','units'=>['Unit 17–20'],'available'=>false],
    ];
    @endphp

    <div class="space-y-4">
        @foreach($modules as $mod)
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <div style="display:flex;align-items:center;justify-content:space-between;padding:18px 24px;gap:16px;">
                <div style="display:flex;align-items:center;gap:14px;">
                    <div style="width:48px;height:48px;border-radius:12px;background:#eff6ff;display:flex;align-items:center;justify-content:center;font-size:24px;flex-shrink:0;">{{ $mod['emoji'] }}</div>
                    <div>
                        <p style="font-weight:700;color:#111827;font-size:15px;">Tema {{ $mod['num'] }} — {{ $mod['tema'] }}</p>
                        <p style="font-size:12px;color:#9ca3af;margin-top:2px;">{{ count($mod['units']) }} unit · {{ $mod['available'] ? 'Tersedia' : 'Segera hadir' }}</p>
                    </div>
                </div>
                @if($mod['available'])
                    @if($owned)
                        <a href="/materi/modul/{{ $mod['num'] }}"
                           style="flex-shrink:0;background:#1d4ed8;color:#fff;font-weight:600;font-size:13px;padding:9px 20px;border-radius:10px;text-decoration:none;">
                            Buka →
                        </a>
                    @else
                        <span style="flex-shrink:0;background:#dcfce7;color:#15803d;font-size:12px;font-weight:600;padding:6px 14px;border-radius:10px;">🆓 Preview</span>
                    @endif
                @else
                    <span style="flex-shrink:0;background:#f3f4f6;color:#9ca3af;font-size:12px;font-weight:600;padding:6px 14px;border-radius:10px;">🔒 Segera</span>
                @endif
            </div>
        </div>
        @endforeach
    </div>

    @if(!$owned)
    <div style="margin-top:32px;background:linear-gradient(135deg,#eff6ff,#dbeafe);border:1px solid #bfdbfe;border-radius:20px;padding:32px;text-align:center;">
        <p style="font-size:18px;font-weight:800;color:#1e3a5f;margin-bottom:8px;">Akses semua modul hanya Rp 12.000</p>
        <p style="font-size:13px;color:#3b82f6;margin-bottom:20px;">Bayar sekali — akses selamanya tanpa biaya berulang</p>
        @auth
        <form method="POST" action="/member/checkout">
            @csrf
            <input type="hidden" name="type" value="materi">
            <input type="hidden" name="id" value="1">
            <button type="submit"
                    style="background:#16a34a;color:#fff;font-weight:700;font-size:15px;padding:13px 30px;border-radius:12px;border:none;cursor:pointer;">
                🚀 Berlangganan Sekarang
            </button>
        </form>
        @else
        <a href="/login"
           style="display:inline-block;background:#16a34a;color:#fff;font-weight:700;font-size:15px;padding:13px 30px;border-radius:12px;text-decoration:none;">
            🚀 Masuk & Berlangganan
        </a>
        @endauth
    </div>
    @endif
</section>

</x-layouts.app>
