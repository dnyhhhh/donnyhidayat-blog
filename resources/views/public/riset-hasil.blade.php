<x-layouts.app title="Hasil Ide Riset — donnyhidayat.blog">
<div class="max-w-2xl mx-auto px-4 py-12">

    {{-- Header hasil --}}
    <div style="background:linear-gradient(135deg,#1e3a5f,#1d4ed8);border-radius:20px;padding:28px 32px;margin-bottom:24px;color:#fff;position:relative;">
        <p style="font-size:11px;font-weight:700;color:#93c5fd;letter-spacing:1px;margin-bottom:8px;">HASIL PROFILING</p>
        <h1 style="font-size:1.4rem;font-weight:800;margin-bottom:4px;">Ide Riset Untukmu</h1>
        <p style="font-size:13px;color:#bfdbfe;margin-bottom:16px;">
            {{ $profile['prodi'] }}
            @if($profile['konsentrasi']) · {{ $profile['konsentrasi'] }} @endif
            · {{ $profile['semester'] >= 10 ? 'Semester 10+' : ($profile['semester'] >= 7 ? 'Semester 7–9' : 'Semester 5–6') }}
        </p>
        <div style="display:flex;flex-wrap:wrap;gap:6px;">
            @foreach($profile['bidang'] as $b)
                <span style="background:rgba(255,255,255,0.15);font-size:11px;padding:3px 10px;border-radius:20px;">{{ $b }}</span>
            @endforeach
            <span style="background:rgba(255,255,255,0.15);font-size:11px;padding:3px 10px;border-radius:20px;">{{ $profile['metode'] }}</span>
        </div>

        {{-- Tombol Edit Profil --}}
        <a href="/riset" style="position:absolute;top:20px;right:20px;display:inline-flex;align-items:center;gap:6px;background:rgba(255,255,255,0.15);border:1px solid rgba(255,255,255,0.3);color:#fff;font-size:12px;font-weight:600;padding:7px 14px;border-radius:20px;text-decoration:none;transition:background .2s;"
           onmouseenter="this.style.background='rgba(255,255,255,0.25)'"
           onmouseleave="this.style.background='rgba(255,255,255,0.15)'">
            <svg style="width:13px;height:13px;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
            Edit Profil
        </a>
    </div>

    {{-- Hasil --}}
    @if($results->isEmpty())
        <div style="background:#fff;border:1px dashed #e5e7eb;border-radius:16px;padding:48px;text-align:center;">
            <div style="display:flex;justify-content:center;margin-bottom:12px;color:#9ca3af;">
                <svg style="width:40px;height:40px;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            <p style="font-weight:600;color:#374151;margin-bottom:8px;">Belum ada ide riset yang cocok</p>
            <p style="font-size:13px;color:#9ca3af;margin-bottom:20px;">Coba ubah bidang minat atau konsentrasi yang lebih umum</p>
            <a href="/riset" style="background:#1d4ed8;color:#fff;font-size:13px;font-weight:600;padding:10px 24px;border-radius:10px;text-decoration:none;">← Edit Profil</a>
        </div>
    @else
        <p style="font-size:14px;color:#6b7280;margin-bottom:16px;">
            Ditemukan <strong style="color:#111827;">{{ $results->count() }} ide riset</strong> yang cocok dengan profilmu.
        </p>

        <div style="display:flex;flex-direction:column;gap:14px;">
            @foreach($results as $i => $idea)
            @php
                $waText = urlencode("Halo Kak Donny, saya dari {$profile['prodi']}. Saya tertarik mendiskusikan topik riset berikut:\n\n*{$idea->judul}*\n\nBoleh saya konsultasi lebih lanjut?");
                $waUrl  = "https://wa.me/6282159392448?text={$waText}";
            @endphp
            <div style="background:#fff;border:1px solid #e5e7eb;border-radius:16px;padding:20px 22px;"
                 onmouseenter="this.style.boxShadow='0 4px 20px rgba(0,0,0,0.07)';this.style.borderColor='#bfdbfe';"
                 onmouseleave="this.style.boxShadow='none';this.style.borderColor='#e5e7eb';">
                <div style="display:flex;align-items:flex-start;gap:12px;">
                    <div style="width:30px;height:30px;background:linear-gradient(135deg,#dbeafe,#eff6ff);border-radius:8px;display:flex;align-items:center;justify-content:center;font-weight:800;color:#1d4ed8;font-size:13px;flex-shrink:0;">
                        {{ $i + 1 }}
                    </div>
                    <div style="flex:1;min-width:0;">
                        <h3 style="font-weight:700;color:#111827;font-size:15px;line-height:1.4;margin-bottom:6px;">{{ $idea->judul }}</h3>
                        <p style="font-size:13px;color:#6b7280;line-height:1.7;margin-bottom:12px;">{{ $idea->deskripsi }}</p>

                        <div style="display:flex;flex-wrap:wrap;gap:5px;margin-bottom:14px;">
                            @if($idea->metode)
                                <span style="background:#f0f9ff;color:#0369a1;font-size:11px;font-weight:600;padding:3px 10px;border-radius:10px;">{{ $idea->metode }}</span>
                            @endif
                            @if($idea->konsentrasi)
                                <span style="background:#f0fdf4;color:#166534;font-size:11px;font-weight:600;padding:3px 10px;border-radius:10px;">{{ $idea->konsentrasi }}</span>
                            @endif
                            @if($idea->fakultas)
                                <span style="background:#fefce8;color:#854d0e;font-size:11px;font-weight:600;padding:3px 10px;border-radius:10px;">{{ $idea->fakultas }}</span>
                            @endif
                        </div>

                        <a href="{{ $waUrl }}" target="_blank"
                           style="display:inline-flex;align-items:center;gap:7px;background:#16a34a;color:#fff;font-size:13px;font-weight:700;padding:9px 18px;border-radius:10px;text-decoration:none;">
                            <svg style="width:15px;height:15px;" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            Diskusikan Topik Ini
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div style="background:#f0fdf4;border:1px solid #bbf7d0;border-radius:14px;padding:16px 20px;margin-top:20px;display:flex;align-items:center;gap:12px;">
            <svg style="width:22px;height:22px;color:#15803d;flex-shrink:0;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
            <p style="font-size:13px;color:#166534;">
                Tidak menemukan yang cocok?
                <a href="/riset" style="font-weight:700;color:#15803d;">Edit profil</a>
                atau langsung hubungi via WhatsApp untuk konsultasi topik custom.
            </p>
        </div>
    @endif

</div>
</x-layouts.app>
