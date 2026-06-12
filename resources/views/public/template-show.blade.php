<x-layouts.app :title="$template->title . ' — donnyhidayat.blog'">
<div class="max-w-5xl mx-auto px-4 py-10">
    <a href="/template" class="text-sm text-blue-700 hover:underline">← Kembali ke Template</a>

    <div class="mt-8 bg-white rounded-2xl border border-gray-100 shadow-sm p-8">
        <div class="flex flex-col md:flex-row gap-10 items-start">

            {{-- Cover / Screenshot --}}
            <div style="flex-shrink:0;width:280px;margin:0 auto;">
                <div style="width:280px;border-radius:12px;overflow:hidden;box-shadow:0 20px 50px rgba(0,0,0,0.15),0 4px 12px rgba(0,0,0,0.08);">
                    @if($template->cover_image)
                        <img src="{{ asset('storage/'.$template->cover_image) }}" style="width:100%;display:block;object-fit:cover;">
                    @else
                        <div style="width:100%;height:200px;background:linear-gradient(135deg,#1e3a5f,#3b82f6);display:flex;align-items:center;justify-content:center;color:rgba(255,255,255,0.8);"><svg style="width:64px;height:64px;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg></div>
                    @endif
                </div>
                @if($template->preview_url)
                <a href="{{ $template->preview_url }}" target="_blank"
                   style="display:block;text-align:center;margin-top:12px;background:#f1f5f9;color:#475569;font-size:13px;font-weight:600;padding:9px;border-radius:10px;text-decoration:none;">
                    ↗ Lihat Demo Live
                </a>
                @endif
            </div>

            {{-- Info --}}
            <div style="flex:1;min-width:0;">
                {{-- Tech stack badges --}}
                @if($template->tech_stack)
                <div style="display:flex;flex-wrap:wrap;gap:6px;margin-bottom:12px;">
                    @foreach(explode(',', $template->tech_stack) as $tech)
                        <span style="background:#f0f9ff;color:#0369a1;font-size:11px;font-weight:700;padding:3px 10px;border-radius:10px;letter-spacing:.03em;">{{ trim($tech) }}</span>
                    @endforeach
                </div>
                @endif

                <h1 style="font-size:1.7rem;font-weight:800;color:#111827;line-height:1.25;">{{ $template->title }}</h1>
                <p style="color:#6b7280;font-size:13px;margin-top:6px;">oleh <strong style="color:#374151;">Donny Hidayat</strong></p>

                <div style="height:3px;width:48px;background:linear-gradient(90deg,#1d4ed8,#60a5fa);border-radius:4px;margin:16px 0;"></div>

                {{-- Deskripsi --}}
                <div x-data="{ expanded: false }">
                    <p x-show="!expanded" style="color:#4b5563;font-size:14px;line-height:1.8;margin:0;">
                        {{ Str::limit($template->description, 200) }}
                    </p>
                    <p x-show="expanded" style="color:#4b5563;font-size:14px;line-height:1.8;margin:0;display:none;">
                        {{ $template->description }}
                    </p>
                    @if(strlen($template->description ?? '') > 200)
                    <button @click="expanded = !expanded"
                            style="margin-top:8px;font-size:13px;color:#1d4ed8;font-weight:600;background:none;border:none;cursor:pointer;padding:0;"
                            x-text="expanded ? '↑ Sembunyikan' : 'Selengkapnya ↓'"></button>
                    @endif
                </div>

                {{-- Yang didapat --}}
                <div style="background:#f8fafc;border-radius:12px;padding:16px 20px;margin-top:20px;">
                    <p style="font-size:13px;font-weight:700;color:#374151;margin-bottom:10px;">Yang kamu dapatkan:</p>
                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px;">
                        <span style="font-size:13px;color:#374151;">✅ Source code lengkap</span>
                        <span style="font-size:13px;color:#374151;">✅ Dokumentasi penggunaan</span>
                        <span style="font-size:13px;color:#374151;">✅ Akses seumur hidup</span>
                        <span style="font-size:13px;color:#374151;">✅ Update gratis</span>
                    </div>
                </div>

                {{-- Harga --}}
                <div style="margin-top:24px;display:flex;align-items:baseline;gap:8px;">
                    <span style="font-size:2rem;font-weight:800;color:#111827;">Rp {{ number_format($template->price, 0, ',', '.') }}</span>
                    <span style="font-size:13px;color:#9ca3af;">/ bayar sekali</span>
                </div>

                {{-- Tombol --}}
                <div style="margin-top:20px;display:flex;flex-wrap:wrap;gap:12px;align-items:center;">
                    @if($owned)
                        <a href="/member/template/{{ $template->id }}/download"
                           style="display:inline-flex;align-items:center;gap:8px;background:#16a34a;color:#fff;font-weight:700;font-size:15px;padding:13px 28px;border-radius:12px;text-decoration:none;">
                            <svg style="width:18px;height:18px;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg> Download Template
                        </a>
                    @elseauth
                        <form method="POST" action="/member/checkout">
                            @csrf
                            <input type="hidden" name="type" value="template">
                            <input type="hidden" name="id" value="{{ $template->id }}">
                            <button type="submit"
                                    style="display:inline-flex;align-items:center;gap:8px;background:#16a34a;color:#fff;font-weight:700;font-size:15px;padding:13px 28px;border-radius:12px;border:none;cursor:pointer;">
                                <svg style="width:18px;height:18px;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg> Beli Sekarang
                            </button>
                        </form>
                    @else
                        <a href="/login"
                           style="display:inline-flex;align-items:center;gap:8px;background:#16a34a;color:#fff;font-weight:700;font-size:15px;padding:13px 28px;border-radius:12px;text-decoration:none;">
                            <svg style="width:18px;height:18px;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg> Beli Sekarang
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
