<x-layouts.app title="Materi Interaktif — donnyhidayat.blog">

{{-- Hero --}}
<section style="background:linear-gradient(135deg,#0f172a 0%,#1e3a5f 50%,#1d4ed8 100%);color:#fff;padding:72px 0 56px;">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <span style="background:rgba(255,255,255,0.12);border:1px solid rgba(255,255,255,0.25);font-size:12px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;padding:5px 16px;border-radius:20px;display:inline-block;margin-bottom:22px;">
            ✨ Belajar Lebih Interaktif
        </span>
        <h1 style="font-size:2.4rem;font-weight:900;line-height:1.15;margin-bottom:16px;">
            Materi Interaktif
        </h1>
        <p style="font-size:16px;color:#bfdbfe;max-width:580px;margin:0 auto;line-height:1.75;">
            Bukan sekadar baca — kerjakan langsung di browser. Isi soal, terjemahkan dialog, cek jawaban, pantau progress. Semua yang tadinya di kertas, kini bisa dilakukan online.
        </p>
    </div>
</section>

{{-- Kenapa Materi Interaktif? --}}
<section class="max-w-4xl mx-auto px-4 py-14">
    <h2 style="font-size:1.3rem;font-weight:800;color:#111827;text-align:center;margin-bottom:32px;">Kenapa Materi Interaktif?</h2>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:20px;">
        @foreach([
            ['clipboard','Isi Langsung di Web','Tidak perlu kertas atau buku tulis. Semua latihan bisa dikerjakan langsung di browser kamu.'],
            ['check','Kunci Jawaban Instan','Setelah selesai, cek jawabanmu dengan satu klik. Belajar mandiri jadi lebih efektif.'],
            ['chart','Pantau Progress','Setiap modul punya progress tracker. Kamu tahu persis sudah sampai mana.'],
            ['save','Tersimpan Otomatis','Jawabanmu tidak akan hilang. Bisa lanjut kapan saja dari perangkat yang sama.'],
        ] as [$icon,$title,$desc])
        <div style="background:#fff;border:1px solid #e5e7eb;border-radius:16px;padding:24px;text-align:center;box-shadow:0 1px 4px rgba(0,0,0,0.05);">
            <div style="display:flex;justify-content:center;margin-bottom:12px;color:#1d4ed8;">
                @if($icon === 'clipboard')
                    <svg style="width:32px;height:32px;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                @elseif($icon === 'check')
                    <svg style="width:32px;height:32px;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                @elseif($icon === 'chart')
                    <svg style="width:32px;height:32px;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                @elseif($icon === 'save')
                    <svg style="width:32px;height:32px;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/></svg>
                @endif
            </div>
            <p style="font-weight:700;color:#111827;font-size:14px;margin-bottom:8px;">{{ $title }}</p>
            <p style="font-size:13px;color:#6b7280;line-height:1.6;">{{ $desc }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- Daftar Materi --}}
<section class="max-w-4xl mx-auto px-4 pb-20">
    <h2 style="font-size:1.3rem;font-weight:800;color:#111827;margin-bottom:20px;">Pilih Materi</h2>

    <div style="display:grid;gap:20px;">

        {{-- English Unlocked --}}
        <div style="background:#fff;border:1px solid #e5e7eb;border-radius:20px;overflow:hidden;box-shadow:0 2px 8px rgba(0,0,0,0.06);">
            <div style="background:linear-gradient(135deg,#1e3a5f,#1d4ed8);padding:28px 28px 24px;color:#fff;">
                <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:16px;flex-wrap:wrap;">
                    <div>
                        <span style="background:rgba(255,255,255,0.18);font-size:11px;font-weight:700;padding:3px 10px;border-radius:20px;letter-spacing:.05em;">🌍 BAHASA INGGRIS</span>
                        <h3 style="font-size:1.3rem;font-weight:900;margin-top:10px;margin-bottom:6px;">English Unlocked</h3>
                        <p style="font-size:13px;color:#bfdbfe;line-height:1.6;max-width:480px;">Kuasai bahasa Inggris lewat latihan interaktif berbasis tema nyata — perjalanan, dunia kerja, kesehatan, teknologi, dan gaya hidup.</p>
                    </div>
                    <div style="text-align:right;flex-shrink:0;">
                        <p style="font-size:1.8rem;font-weight:900;">Rp 12.000</p>
                        <p style="font-size:12px;color:#93c5fd;">akses selamanya</p>
                    </div>
                </div>
            </div>
            <div style="padding:20px 28px;display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between;gap:16px;">
                <div style="display:flex;flex-wrap:wrap;gap:10px;">
                    @foreach(['5 Tema','20 Unit','Kunci Jawaban','Progress Tracker'] as $f)
                    <span style="background:#f8fafc;border:1px solid #e5e7eb;font-size:12px;color:#374151;padding:5px 12px;border-radius:20px;">✓ {{ $f }}</span>
                    @endforeach
                </div>
                <a href="/materi/english-unlocked"
                   style="display:inline-flex;align-items:center;gap:8px;background:#1d4ed8;color:#fff;font-weight:700;font-size:14px;padding:11px 24px;border-radius:12px;text-decoration:none;">
                    Lihat Detail →
                </a>
            </div>
        </div>

        {{-- Coming soon --}}
        @foreach([
            ['🗣️','Public Speaking Interaktif','Latihan berbicara percaya diri: struktur pidato, teknik presentasi, dan latihan impromptu langsung di web.','Segera hadir'],
            ['💰','Literasi Keuangan Dasar','Belajar mengelola uang, budgeting, investasi, dan perencanaan keuangan secara interaktif.','Segera hadir'],
        ] as [$icon,$title,$desc,$badge])
        <div style="background:#f9fafb;border:1px dashed #d1d5db;border-radius:20px;padding:28px;display:flex;align-items:center;gap:20px;opacity:.75;">
            <div style="width:56px;height:56px;border-radius:14px;background:#e5e7eb;display:flex;align-items:center;justify-content:center;font-size:26px;flex-shrink:0;">{{ $icon }}</div>
            <div style="flex:1;min-width:0;">
                <p style="font-weight:700;color:#374151;font-size:15px;margin-bottom:4px;">{{ $title }}</p>
                <p style="font-size:13px;color:#9ca3af;line-height:1.5;">{{ $desc }}</p>
            </div>
            <span style="flex-shrink:0;background:#e5e7eb;color:#6b7280;font-size:12px;font-weight:600;padding:6px 14px;border-radius:20px;">🔒 {{ $badge }}</span>
        </div>
        @endforeach

    </div>
</section>

</x-layouts.app>
