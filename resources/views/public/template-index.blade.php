<x-layouts.app title="Template Website — donnyhidayat.blog">
<div class="max-w-6xl mx-auto px-4 py-12">

    {{-- Hero --}}
    <div style="background:linear-gradient(135deg,#0f172a,#1e3a5f);border-radius:20px;padding:48px 40px;margin-bottom:48px;text-align:center;">
        <span style="background:#3b82f6;color:#fff;font-size:12px;font-weight:700;padding:4px 14px;border-radius:20px;letter-spacing:1px;">TEMPLATE WEBSITE</span>
        <h1 style="font-size:36px;font-weight:800;color:#fff;margin:16px 0 12px;">Template Siap Pakai, Tinggal Pasang</h1>
        <p style="color:#94a3b8;font-size:15px;max-width:520px;margin:0 auto;">Desain profesional, kode bersih, dan dokumentasi lengkap. Beli sekali, pakai selamanya.</p>
    </div>

    {{-- Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($templates as $template)
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition overflow-hidden flex flex-col">
            @if($template->cover_image)
                <img src="{{ asset('storage/'.$template->cover_image) }}" class="w-full h-48 object-cover">
            @else
                <div style="width:100%;height:192px;background:linear-gradient(135deg,#dbeafe,#ede9fe);display:flex;align-items:center;justify-content:center;color:#818cf8;"><svg style="width:48px;height:48px;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg></div>
            @endif

            <div class="p-5 flex flex-col flex-1">
                <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;flex-wrap:wrap;">
                    @if($template->tech_stack)
                        @foreach(explode(',', $template->tech_stack) as $tech)
                            <span style="background:#f0f9ff;color:#0369a1;font-size:11px;font-weight:600;padding:2px 8px;border-radius:10px;">{{ trim($tech) }}</span>
                        @endforeach
                    @endif
                </div>
                <h3 class="font-bold text-gray-800 text-base">{{ $template->title }}</h3>
                <p class="text-gray-500 text-sm mt-1 line-clamp-2 flex-1">{{ $template->description }}</p>

                <div style="display:flex;align-items:center;justify-content:space-between;margin-top:16px;gap:8px;">
                    <span style="font-size:18px;font-weight:800;color:#1d4ed8;">Rp {{ number_format($template->price, 0, ',', '.') }}</span>
                    <div style="display:flex;gap:8px;">
                        @if($template->preview_url)
                            <a href="{{ $template->preview_url }}" target="_blank"
                               style="background:#f1f5f9;color:#475569;font-size:12px;font-weight:600;padding:7px 14px;border-radius:8px;text-decoration:none;">
                                Demo ↗
                            </a>
                        @endif
                        <a href="/template/{{ $template->slug }}"
                           style="background:#1d4ed8;color:#fff;font-size:12px;font-weight:600;padding:7px 14px;border-radius:8px;text-decoration:none;">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-3 text-center text-gray-400 py-20">
            <p class="mb-3 flex justify-center" style="color:#818cf8;"><svg style="width:40px;height:40px;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg></p>
            <p>Belum ada template tersedia.</p>
        </div>
        @endforelse
    </div>

    <div class="mt-10">{{ $templates->links() }}</div>
</div>
</x-layouts.app>
