<x-layouts.app :title="$ebook->title . ' — donnyhidayat.blog'">
<div class="max-w-5xl mx-auto px-4 py-10">
    <a href="/ebook" class="text-sm text-blue-700 hover:underline">← Kembali ke Ebook</a>

    <div class="mt-8 bg-white rounded-2xl border border-gray-100 shadow-sm p-8">
        <div class="flex flex-col md:flex-row gap-10 items-start">

            {{-- Cover A4 --}}
            <div style="flex-shrink:0;width:220px;margin:0 auto;">
                <div style="width:220px;height:311px;border-radius:10px;overflow:hidden;box-shadow:0 20px 50px rgba(0,0,0,0.2),0 4px 12px rgba(0,0,0,0.1);position:relative;">
                    @if($ebook->cover_image)
                        <img src="{{ asset('storage/'.$ebook->cover_image) }}"
                             style="width:100%;height:100%;object-fit:cover;display:block;">
                    @else
                        <div style="width:100%;height:100%;background:linear-gradient(135deg,#1d4ed8,#3b82f6);display:flex;align-items:center;justify-content:center;font-size:64px;">📘</div>
                    @endif
                    <div style="position:absolute;inset:0;background:linear-gradient(135deg,rgba(255,255,255,0.1) 0%,transparent 50%);pointer-events:none;"></div>
                </div>
                <div style="height:10px;background:radial-gradient(ellipse at center,rgba(0,0,0,0.15) 0%,transparent 70%);margin-top:4px;border-radius:50%;"></div>
            </div>

            {{-- Info --}}
            <div style="flex:1;min-width:0;">
                @if($ebook->category)
                    <span style="background:#eff6ff;color:#1d4ed8;font-size:11px;font-weight:700;padding:4px 12px;border-radius:20px;letter-spacing:.05em;text-transform:uppercase;display:inline-block;">{{ $ebook->category->name }}</span>
                @endif

                <h1 style="font-size:1.6rem;font-weight:800;color:#111827;line-height:1.25;margin-top:12px;">{{ $ebook->title }}</h1>
                <p style="color:#6b7280;font-size:13px;margin-top:6px;">oleh <strong style="color:#374151;">Donny Hidayat</strong></p>

                <div style="height:3px;width:48px;background:linear-gradient(90deg,#1d4ed8,#60a5fa);border-radius:4px;margin:16px 0;"></div>

                {{-- Deskripsi --}}
                <div x-data="{ expanded: false }">
                    <p x-show="!expanded" style="color:#4b5563;font-size:14px;line-height:1.8;margin:0;">
                        {{ Str::limit($ebook->description, 180) }}
                    </p>
                    <p x-show="expanded" style="color:#4b5563;font-size:14px;line-height:1.8;margin:0;display:none;">
                        {{ $ebook->description }}
                    </p>
                    @if(strlen($ebook->description) > 180)
                    <button @click="expanded = !expanded"
                            style="margin-top:8px;font-size:13px;color:#1d4ed8;font-weight:600;background:none;border:none;cursor:pointer;padding:0;"
                            x-text="expanded ? '↑ Sembunyikan' : 'Selengkapnya ↓'"></button>
                    @endif
                </div>

                {{-- Harga --}}
                <div style="margin-top:24px;display:flex;align-items:baseline;gap:8px;">
                    <span style="font-size:2rem;font-weight:800;color:#111827;">Rp {{ number_format($ebook->price, 0, ',', '.') }}</span>
                    <span style="font-size:13px;color:#9ca3af;">/ ebook PDF</span>
                </div>

                {{-- Benefit --}}
                <div style="display:flex;flex-wrap:wrap;gap:16px;margin-top:12px;">
                    <span style="font-size:12px;color:#374151;">✅ Akses seumur hidup</span>
                    <span style="font-size:12px;color:#374151;">✅ Download langsung</span>
                    <span style="font-size:12px;color:#374151;">✅ Format PDF</span>
                </div>

                {{-- Tombol --}}
                <div style="margin-top:24px;display:flex;flex-wrap:wrap;gap:12px;align-items:center;">
                    @if($owned)
                        <a href="/member/ebook/{{ $ebook->id }}/download"
                           style="display:inline-flex;align-items:center;gap:8px;background:#16a34a;color:#fff;font-weight:700;font-size:15px;padding:13px 28px;border-radius:12px;text-decoration:none;">
                            ⬇ Download Ebook
                        </a>
                    @elseauth
                        <form method="POST" action="/member/checkout">
                            @csrf
                            <input type="hidden" name="type" value="ebook">
                            <input type="hidden" name="id" value="{{ $ebook->id }}">
                            <button type="submit"
                                    style="display:inline-flex;align-items:center;gap:8px;background:#16a34a;color:#fff;font-weight:700;font-size:15px;padding:13px 28px;border-radius:12px;border:none;cursor:pointer;">
                                🛒 Beli Sekarang
                            </button>
                        </form>
                    @else
                        <a href="/login"
                           style="display:inline-flex;align-items:center;gap:8px;background:#16a34a;color:#fff;font-weight:700;font-size:15px;padding:13px 28px;border-radius:12px;text-decoration:none;">
                            🛒 Beli Sekarang
                        </a>
                    @endauth
                </div>

                @if(!$owned)
                <p style="font-size:12px;color:#9ca3af;margin-top:10px;">Pembayaran manual via transfer bank. Konfirmasi admin dalam 1×24 jam.</p>
                @endif
            </div>

        </div>
    </div>
</div>
</x-layouts.app>
