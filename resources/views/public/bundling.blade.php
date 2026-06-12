<x-layouts.app title="Paket Bundling — Akses Semua Konten | donnyhidayat.blog">

{{-- Hero --}}
<section style="background:linear-gradient(135deg,#0f172a 0%,#1e1b4b 50%,#312e81 100%);color:#fff;padding:80px 0 60px;position:relative;overflow:hidden;">
    <div style="position:absolute;inset:0;background:radial-gradient(ellipse at 70% 50%,rgba(99,102,241,0.2) 0%,transparent 70%);pointer-events:none;"></div>
    <div class="max-w-4xl mx-auto px-4 text-center" style="position:relative;">
        <span style="background:linear-gradient(90deg,#f59e0b,#ef4444);font-size:12px;font-weight:800;letter-spacing:.08em;text-transform:uppercase;padding:6px 18px;border-radius:20px;display:inline-block;margin-bottom:24px;">
            🔥 PENAWARAN TERBAIK
        </span>
        <h1 style="font-size:2.6rem;font-weight:900;line-height:1.15;margin-bottom:16px;">
            Paket Bundling<br>
            <span style="background:linear-gradient(90deg,#a5b4fc,#818cf8);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Akses Semua Konten</span>
        </h1>
        <p style="font-size:16px;color:#c7d2fe;max-width:560px;margin:0 auto 36px;line-height:1.75;">
            Satu paket, satu harga — dapatkan akses ke seluruh ebook, kelas online, dan materi interaktif yang tersedia sekarang maupun yang akan datang.
        </p>

        @if($owned)
            <div style="background:rgba(255,255,255,0.1);border:1px solid rgba(255,255,255,0.2);border-radius:16px;padding:24px 32px;display:inline-block;margin-bottom:24px;">
                <p style="font-size:18px;font-weight:700;margin-bottom:4px;">✅ Kamu sudah punya Paket Bundling!</p>
                <p style="font-size:14px;color:#c7d2fe;">Nikmati akses penuh ke semua konten.</p>
            </div>
            <div style="display:flex;justify-content:center;flex-wrap:wrap;gap:12px;">
                <a href="/ebook" style="background:#fff;color:#312e81;font-weight:700;font-size:14px;padding:12px 24px;border-radius:12px;text-decoration:none;">📘 Lihat Ebook</a>
                <a href="/kelas" style="background:rgba(255,255,255,0.15);color:#fff;font-weight:700;font-size:14px;padding:12px 24px;border-radius:12px;text-decoration:none;border:1px solid rgba(255,255,255,0.3);">🎓 Lihat Kelas</a>
                <a href="/materi" style="background:rgba(255,255,255,0.15);color:#fff;font-weight:700;font-size:14px;padding:12px 24px;border-radius:12px;text-decoration:none;border:1px solid rgba(255,255,255,0.3);">✏️ Materi Interaktif</a>
            </div>
        @else
            {{-- Pricing --}}
            <div style="display:flex;align-items:center;justify-content:center;gap:16px;margin-bottom:28px;flex-wrap:wrap;">
                <div style="text-align:center;">
                    <p style="font-size:14px;color:#a5b4fc;text-decoration:line-through;margin-bottom:4px;">Jika beli terpisah: Rp 500.000+</p>
                    <div style="display:flex;align-items:baseline;justify-content:center;gap:8px;">
                        <span style="font-size:3rem;font-weight:900;">Rp 297.000</span>
                        <span style="font-size:14px;color:#a5b4fc;">/ selamanya</span>
                    </div>
                </div>
            </div>
            @auth
            <form method="POST" action="/member/checkout">
                @csrf
                <input type="hidden" name="type" value="bundle">
                <input type="hidden" name="id" value="1">
                <button type="submit"
                        style="display:inline-flex;align-items:center;gap:10px;background:linear-gradient(90deg,#f59e0b,#ef4444);color:#fff;font-weight:800;font-size:17px;padding:16px 40px;border-radius:14px;border:none;cursor:pointer;box-shadow:0 8px 24px rgba(239,68,68,0.4);">
                    🚀 Beli Paket Bundling Sekarang
                </button>
            </form>
            @else
            <a href="/login"
               style="display:inline-flex;align-items:center;gap:10px;background:linear-gradient(90deg,#f59e0b,#ef4444);color:#fff;font-weight:800;font-size:17px;padding:16px 40px;border-radius:14px;text-decoration:none;box-shadow:0 8px 24px rgba(239,68,68,0.4);">
                🚀 Masuk & Beli Sekarang
            </a>
            @endauth
            <p style="font-size:12px;color:#a5b4fc;margin-top:14px;">Pembayaran manual via transfer bank · Konfirmasi admin 1×24 jam</p>
        @endif
    </div>
</section>

{{-- Yang kamu dapat --}}
<section class="max-w-5xl mx-auto px-4 py-16">
    <h2 style="font-size:1.4rem;font-weight:800;color:#111827;text-align:center;margin-bottom:8px;">Yang Kamu Dapat dalam Satu Paket</h2>
    <p style="text-align:center;color:#6b7280;font-size:14px;margin-bottom:40px;">Hemat lebih banyak dibanding beli satu per satu</p>

    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:24px;">

        {{-- Ebook --}}
        <div style="background:#fff;border:2px solid #e0e7ff;border-radius:20px;overflow:hidden;">
            <div style="background:linear-gradient(135deg,#eff6ff,#dbeafe);padding:24px 24px 20px;">
                <div style="display:flex;align-items:center;gap:12px;margin-bottom:12px;">
                    <span style="font-size:28px;">📘</span>
                    <div>
                        <p style="font-weight:800;color:#1e3a5f;font-size:15px;">Semua Ebook</p>
                        <p style="font-size:12px;color:#3b82f6;">{{ $ebookCount }} ebook tersedia</p>
                    </div>
                </div>
                <p style="font-size:13px;color:#374151;line-height:1.6;">Akses download semua ebook yang ada dan yang akan ditambahkan ke depannya.</p>
            </div>
            <div style="padding:16px 24px;display:flex;flex-direction:column;gap:8px;">
                @foreach(['Download PDF langsung','Akses selamanya','Konten terus bertambah'] as $f)
                <div style="display:flex;align-items:center;gap:8px;font-size:13px;color:#374151;">
                    <span style="color:#16a34a;font-weight:700;">✓</span> {{ $f }}
                </div>
                @endforeach
            </div>
        </div>

        {{-- Kelas --}}
        <div style="background:#fff;border:2px solid #d1fae5;border-radius:20px;overflow:hidden;">
            <div style="background:linear-gradient(135deg,#f0fdf4,#dcfce7);padding:24px 24px 20px;">
                <div style="display:flex;align-items:center;gap:12px;margin-bottom:12px;">
                    <span style="font-size:28px;">🎓</span>
                    <div>
                        <p style="font-weight:800;color:#14532d;font-size:15px;">Semua Kelas Online</p>
                        <p style="font-size:12px;color:#16a34a;">{{ $courseCount }} kelas tersedia</p>
                    </div>
                </div>
                <p style="font-size:13px;color:#374151;line-height:1.6;">Tonton semua video materi kelas online dengan player interaktif dan progress tracker.</p>
            </div>
            <div style="padding:16px 24px;display:flex;flex-direction:column;gap:8px;">
                @foreach(['Video player interaktif','Progress per pelajaran','Akses tanpa batas waktu'] as $f)
                <div style="display:flex;align-items:center;gap:8px;font-size:13px;color:#374151;">
                    <span style="color:#16a34a;font-weight:700;">✓</span> {{ $f }}
                </div>
                @endforeach
            </div>
        </div>

        {{-- Materi Interaktif --}}
        <div style="background:#fff;border:2px solid #ede9fe;border-radius:20px;overflow:hidden;">
            <div style="background:linear-gradient(135deg,#faf5ff,#ede9fe);padding:24px 24px 20px;">
                <div style="display:flex;align-items:center;gap:12px;margin-bottom:12px;">
                    <span style="font-size:28px;">✏️</span>
                    <div>
                        <p style="font-weight:800;color:#3b0764;font-size:15px;">Materi Interaktif</p>
                        <p style="font-size:12px;color:#7c3aed;">English Unlocked & lebih banyak</p>
                    </div>
                </div>
                <p style="font-size:13px;color:#374151;line-height:1.6;">Kerjakan latihan langsung di browser — terjemahan, soal, dialog, dan grammar notes.</p>
            </div>
            <div style="padding:16px 24px;display:flex;flex-direction:column;gap:8px;">
                @foreach(['5 tema × 20 unit latihan','Kunci jawaban instan','Progress tersimpan otomatis'] as $f)
                <div style="display:flex;align-items:center;gap:8px;font-size:13px;color:#374151;">
                    <span style="color:#16a34a;font-weight:700;">✓</span> {{ $f }}
                </div>
                @endforeach
            </div>
        </div>

    </div>
</section>

{{-- Perbandingan harga --}}
<section style="background:#f8fafc;border-top:1px solid #e5e7eb;border-bottom:1px solid #e5e7eb;padding:60px 0;">
    <div class="max-w-3xl mx-auto px-4">
        <h2 style="font-size:1.3rem;font-weight:800;color:#111827;text-align:center;margin-bottom:32px;">Perbandingan Harga</h2>
        <div style="background:#fff;border-radius:20px;overflow:hidden;border:1px solid #e5e7eb;box-shadow:0 2px 12px rgba(0,0,0,0.06);">
            <table style="width:100%;border-collapse:collapse;">
                <thead>
                    <tr style="background:#f1f5f9;">
                        <th style="text-align:left;padding:14px 20px;font-size:13px;color:#374151;">Item</th>
                        <th style="text-align:center;padding:14px 20px;font-size:13px;color:#374151;">Harga Satuan</th>
                        <th style="text-align:center;padding:14px 20px;font-size:13px;color:#6d28d9;background:#faf5ff;">Paket Bundling</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach([
                        ['📘 Semua Ebook','Rp 50.000–150.000 /judul'],
                        ['🎓 Semua Kelas Online','Rp 100.000–300.000 /kelas'],
                        ['✏️ English Unlocked','Rp 12.000'],
                        ['🆕 Konten Baru Mendatang','Rp harga normal'],
                    ] as $i => [$item,$harga])
                    <tr style="border-top:1px solid #f3f4f6;">
                        <td style="padding:14px 20px;font-size:14px;color:#111827;">{{ $item }}</td>
                        <td style="padding:14px 20px;text-align:center;font-size:13px;color:#6b7280;">{{ $harga }}</td>
                        <td style="padding:14px 20px;text-align:center;font-size:13px;color:#16a34a;font-weight:700;background:#f0fdf4;">✓ Termasuk</td>
                    </tr>
                    @endforeach
                    <tr style="border-top:2px solid #e5e7eb;background:#f8fafc;">
                        <td style="padding:16px 20px;font-weight:800;color:#111827;">Total jika beli terpisah</td>
                        <td style="padding:16px 20px;text-align:center;font-weight:800;color:#ef4444;text-decoration:line-through;">Rp 500.000+</td>
                        <td style="padding:16px 20px;text-align:center;font-weight:900;color:#6d28d9;font-size:18px;background:#faf5ff;">Rp 297.000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

{{-- CTA bawah --}}
@if(!$owned)
<section class="max-w-3xl mx-auto px-4 py-16 text-center">
    <h2 style="font-size:1.5rem;font-weight:800;color:#111827;margin-bottom:10px;">Siap Mulai Belajar?</h2>
    <p style="font-size:14px;color:#6b7280;margin-bottom:28px;">Bayar sekali, akses selamanya — termasuk semua konten baru yang ditambahkan.</p>
    @auth
    <form method="POST" action="/member/checkout" style="display:inline;">
        @csrf
        <input type="hidden" name="type" value="bundle">
        <input type="hidden" name="id" value="1">
        <button type="submit"
                style="display:inline-flex;align-items:center;gap:10px;background:linear-gradient(90deg,#6d28d9,#4f46e5);color:#fff;font-weight:800;font-size:16px;padding:15px 36px;border-radius:14px;border:none;cursor:pointer;box-shadow:0 6px 20px rgba(109,40,217,0.35);">
            🚀 Beli Paket Bundling — Rp 297.000
        </button>
    </form>
    @else
    <a href="/login"
       style="display:inline-flex;align-items:center;gap:10px;background:linear-gradient(90deg,#6d28d9,#4f46e5);color:#fff;font-weight:800;font-size:16px;padding:15px 36px;border-radius:14px;text-decoration:none;box-shadow:0 6px 20px rgba(109,40,217,0.35);">
        🚀 Masuk & Beli Sekarang
    </a>
    @endauth
    <p style="font-size:12px;color:#9ca3af;margin-top:12px;">Transfer bank · Konfirmasi admin dalam 1×24 jam</p>
</section>
@endif

</x-layouts.app>
