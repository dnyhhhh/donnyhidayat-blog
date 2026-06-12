<x-layouts.app title="Hasil Ide Riset — donnyhidayat.blog">
<div class="max-w-2xl mx-auto px-4 py-12">

    {{-- Header hasil --}}
    <div class="bg-gradient-to-br from-blue-900 via-blue-800 to-blue-700 rounded-2xl p-7 mb-6 text-white relative">
        <p class="text-xs font-bold text-blue-300 tracking-widest uppercase mb-2">HASIL PROFILING</p>
        <h1 class="text-2xl font-extrabold mb-1">Ide Riset Untukmu</h1>
        <p class="text-sm text-blue-200 mb-4">
            {{ $profile['prodi'] }}
            @if($profile['konsentrasi']) · {{ $profile['konsentrasi'] }} @endif
            · {{ $profile['semester'] >= 10 ? 'Semester 10+' : ($profile['semester'] >= 7 ? 'Semester 7–9' : 'Semester 5–6') }}
        </p>
        <div class="flex flex-wrap gap-1.5">
            @foreach($profile['bidang'] as $b)
                <span class="bg-white/15 text-xs px-3 py-1 rounded-full">{{ $b }}</span>
            @endforeach
            <span class="bg-white/15 text-xs px-3 py-1 rounded-full">{{ $profile['metode'] }}</span>
        </div>

        {{-- Tombol Edit Profil --}}
        <a href="/riset/reset"
           class="absolute top-5 right-5 inline-flex items-center gap-1.5 bg-white/15 hover:bg-white/25 border border-white/30 text-white text-xs font-semibold px-3.5 py-1.5 rounded-full transition">
            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
            Edit Profil
        </a>
    </div>

    {{-- Hasil --}}
    @if($results->isEmpty())
        <div class="bg-white border border-dashed border-gray-200 rounded-2xl p-12 text-center">
            <div class="flex justify-center mb-3 text-gray-300">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            <p class="font-semibold text-gray-700 mb-2">Belum ada ide riset yang cocok</p>
            <p class="text-sm text-gray-400 mb-5">Coba ubah bidang minat atau konsentrasi yang lebih umum</p>
            <a href="/riset/reset" class="bg-blue-700 text-white text-sm font-semibold px-6 py-2.5 rounded-xl">← Edit Profil</a>
        </div>
    @else
        <p class="text-sm text-gray-500 mb-4">
            Ditemukan <strong class="text-gray-900">{{ $results->count() }} ide riset</strong> yang cocok dengan profilmu.
        </p>

        <div class="flex flex-col gap-3.5">
            @foreach($results as $i => $idea)
            @php
                $waText = urlencode("Halo Kak Donny, saya dari {$profile['prodi']}. Saya tertarik mendiskusikan topik riset berikut:\n\n*{$idea->judul}*\n\nBoleh saya konsultasi lebih lanjut?");
                $waUrl  = "https://wa.me/6282159392448?text={$waText}";
            @endphp
            <div class="bg-white border border-gray-200 rounded-2xl p-5 hover:border-blue-200 hover:shadow-md transition">
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 bg-gradient-to-br from-blue-100 to-blue-50 rounded-lg flex items-center justify-center font-extrabold text-blue-700 text-sm flex-shrink-0">
                        {{ $i + 1 }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="font-bold text-gray-900 text-sm leading-snug mb-1.5">{{ $idea->judul }}</h3>
                        <p class="text-xs text-gray-500 leading-relaxed mb-3">{{ $idea->deskripsi }}</p>

                        <div class="flex flex-wrap gap-1.5 mb-3">
                            @if($idea->metode)
                                <span class="bg-sky-50 text-sky-700 text-xs font-semibold px-2.5 py-0.5 rounded-lg">{{ $idea->metode }}</span>
                            @endif
                            @if($idea->konsentrasi)
                                <span class="bg-green-50 text-green-700 text-xs font-semibold px-2.5 py-0.5 rounded-lg">{{ $idea->konsentrasi }}</span>
                            @endif
                            @if($idea->fakultas)
                                <span class="bg-yellow-50 text-yellow-700 text-xs font-semibold px-2.5 py-0.5 rounded-lg">{{ $idea->fakultas }}</span>
                            @endif
                        </div>

                        <a href="{{ $waUrl }}" target="_blank"
                           class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white text-xs font-bold px-4 py-2 rounded-lg transition">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            Diskusikan Topik Ini
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="bg-green-50 border border-green-200 rounded-2xl p-4 mt-5 flex items-center gap-3">
            <svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
            <p class="text-sm text-green-800">
                Tidak menemukan yang cocok?
                <a href="/riset/reset" class="font-bold text-green-700 hover:underline">Edit profil</a>
                atau langsung hubungi via WhatsApp untuk konsultasi topik custom.
            </p>
        </div>
    @endif

</div>
</x-layouts.app>
