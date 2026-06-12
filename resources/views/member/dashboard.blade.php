<x-layouts.app title="Dashboard — donnyhidayat.blog">
<div class="max-w-4xl mx-auto px-4 py-10" x-data="{ tab: window.location.hash.replace('#','') || 'ebook' }">

    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Halo, {{ auth()->user()->name }}</h1>
        <p class="text-gray-500 text-sm mt-1">Akses semua konten yang sudah kamu beli di sini.</p>
    </div>

    @if(session('success'))
        <div class="bg-green-50 text-green-700 text-sm rounded-lg px-4 py-3 mb-4">{{ session('success') }}</div>
    @endif

    {{-- Banner Bundle --}}
    @if($hasBundle)
    <div style="background:linear-gradient(135deg,#1e1b4b,#312e81);border-radius:16px;padding:18px 24px;margin-bottom:24px;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;">
        <div style="display:flex;align-items:center;gap:12px;">
            <span style="display:flex;align-items:center;"><svg style="width:28px;height:28px;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg></span>
            <div>
                <p style="font-weight:800;color:#fff;font-size:15px;">Paket Bundling Aktif</p>
                <p style="font-size:12px;color:#a5b4fc;margin-top:2px;">Kamu punya akses ke semua ebook, kelas, dan materi interaktif</p>
            </div>
        </div>
        @if($bundleOrder)
        <span style="background:rgba(255,255,255,0.15);color:#c7d2fe;font-size:12px;font-weight:600;padding:6px 14px;border-radius:20px;">
            {{ $bundleOrder->invoice_number }}
        </span>
        @endif
    </div>
    @endif

    {{-- Tab menu --}}
    <div style="display:flex;gap:8px;border-bottom:2px solid #e5e7eb;margin-bottom:28px;overflow-x:auto;">
        @foreach([
            ['ebook',    'Ebook Saya',           $ebooks->count()],
            ['kelas',    'Kelas Saya',            $courses->count()],
            ['materi',   'Materi Interaktif',     $materis->count()],
            ['template', 'Template',              $templates->count()],
            ['riwayat',  'Riwayat',               $allOrders->count()],
        ] as [$key, $label, $count])
        <button @click="tab='{{ $key }}'; window.location.hash='{{ $key }}'"
                :style="tab==='{{ $key }}'
                    ? 'border-bottom:3px solid #1d4ed8;color:#1d4ed8;font-weight:700;'
                    : 'border-bottom:3px solid transparent;color:#6b7280;'"
                style="display:flex;align-items:center;gap:6px;padding:10px 18px;background:none;border-top:none;border-left:none;border-right:none;cursor:pointer;font-size:14px;white-space:nowrap;transition:color .2s;margin-bottom:-2px;">
            <span style="display:flex;align-items:center;">
                @switch($key)
                    @case('ebook')
                        <svg style="width:16px;height:16px;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        @break
                    @case('kelas')
                        <svg style="width:16px;height:16px;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                        @break
                    @case('materi')
                        <svg style="width:16px;height:16px;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                        @break
                    @case('template')
                        <svg style="width:16px;height:16px;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg>
                        @break
                    @case('riwayat')
                        <svg style="width:16px;height:16px;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        @break
                @endswitch
            </span>
            <span>{{ $label }}</span>
            <span :style="tab==='{{ $key }}' ? 'background:#dbeafe;color:#1d4ed8;' : 'background:#f3f4f6;color:#9ca3af;'"
                  style="font-size:11px;font-weight:700;padding:2px 7px;border-radius:20px;">{{ $count }}</span>
        </button>
        @endforeach
    </div>

    {{-- TAB: EBOOK --}}
    <div x-show="tab==='ebook'">
        @if($ebooks->isEmpty())
            <div class="empty-state">
                <p style="margin-bottom:12px;display:flex;justify-content:center;"><svg style="width:40px;height:40px;color:#93c5fd;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg></p>
                <p style="font-weight:600;color:#374151;margin-bottom:6px;">Belum ada ebook</p>
                <a href="/ebook" style="color:#1d4ed8;font-size:13px;">Lihat koleksi ebook →</a>
            </div>
        @else
            <div class="space-y-3">
                @foreach($ebooks as $item)
                @php $isBundle = $hasBundle; @endphp
                <div class="order-card">
                    <div style="display:flex;align-items:center;gap:14px;flex:1;min-width:0;">
                        <div style="width:44px;height:44px;border-radius:10px;background:#eff6ff;display:flex;align-items:center;justify-content:center;flex-shrink:0;color:#3b82f6;"><svg style="width:20px;height:20px;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg></div>
                        <div style="min-width:0;">
                            <p style="font-weight:600;color:#111827;font-size:14px;">{{ $isBundle ? $item->title : ($item->orderable->title ?? '—') }}</p>
                            @if($isBundle)
                                <span style="display:inline-flex;align-items:center;gap:4px;font-size:11px;background:#e0e7ff;color:#3730a3;padding:2px 8px;border-radius:10px;font-weight:600;"><svg style="width:12px;height:12px;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg> via Paket Bundling</span>
                            @else
                                <p style="font-size:12px;color:#9ca3af;margin-top:2px;">{{ $item->invoice_number }} · {{ $item->created_at->format('d M Y') }}</p>
                            @endif
                        </div>
                    </div>
                    <div style="display:flex;align-items:center;gap:10px;flex-shrink:0;">
                        @if($isBundle)
                            <a href="/member/ebook/{{ $item->id }}/download" class="btn-akses">Download</a>
                        @else
                            @include('member._status-badge', ['status' => $item->status])
                            @if($item->status === 'paid')
                                <a href="/member/ebook/{{ $item->orderable_id }}/download" class="btn-akses">Download</a>
                            @else
                                <a href="/member/order/{{ $item->id }}" class="btn-detail">Detail</a>
                            @endif
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>

    {{-- TAB: KELAS --}}
    <div x-show="tab==='kelas'" style="display:none;">
        @if($courses->isEmpty())
            <div class="empty-state">
                <p style="margin-bottom:12px;display:flex;justify-content:center;"><svg style="width:40px;height:40px;color:#818cf8;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg></p>
                <p style="font-weight:600;color:#374151;margin-bottom:6px;">Belum ada kelas</p>
                <a href="/kelas" style="color:#1d4ed8;font-size:13px;">Lihat koleksi kelas →</a>
            </div>
        @else
            <div class="space-y-3">
                @foreach($courses as $item)
                <div class="order-card">
                    <div style="display:flex;align-items:center;gap:14px;flex:1;min-width:0;">
                        <div style="width:44px;height:44px;border-radius:10px;background:#f0fdf4;display:flex;align-items:center;justify-content:center;flex-shrink:0;color:#4f46e5;"><svg style="width:20px;height:20px;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg></div>
                        <div style="min-width:0;">
                            <p style="font-weight:600;color:#111827;font-size:14px;">{{ $hasBundle ? $item->title : ($item->orderable->title ?? '—') }}</p>
                            @if($hasBundle)
                                <span style="display:inline-flex;align-items:center;gap:4px;font-size:11px;background:#e0e7ff;color:#3730a3;padding:2px 8px;border-radius:10px;font-weight:600;"><svg style="width:12px;height:12px;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg> via Paket Bundling</span>
                            @else
                                <p style="font-size:12px;color:#9ca3af;margin-top:2px;">{{ $item->invoice_number }} · {{ $item->created_at->format('d M Y') }}</p>
                            @endif
                        </div>
                    </div>
                    <div style="display:flex;align-items:center;gap:10px;flex-shrink:0;">
                        @if($hasBundle)
                            <a href="/kelas/{{ $item->slug }}" class="btn-akses">Buka Kelas</a>
                        @else
                            @include('member._status-badge', ['status' => $item->status])
                            @if($item->status === 'paid')
                                <a href="/kelas/{{ $item->orderable->slug }}" class="btn-akses">Buka Kelas</a>
                            @else
                                <a href="/member/order/{{ $item->id }}" class="btn-detail">Detail</a>
                            @endif
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>

    {{-- TAB: MATERI --}}
    <div x-show="tab==='materi'" style="display:none;">
        @if($materis->isEmpty())
            <div class="empty-state">
                <p style="margin-bottom:12px;display:flex;justify-content:center;"><svg style="width:40px;height:40px;color:#a78bfa;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg></p>
                <p style="font-weight:600;color:#374151;margin-bottom:6px;">Belum berlangganan materi interaktif</p>
                <a href="/materi" style="color:#1d4ed8;font-size:13px;">Lihat Materi Interaktif →</a>
            </div>
        @else
            <div class="space-y-3">
                @foreach($materis as $item)
                <div class="order-card">
                    <div style="display:flex;align-items:center;gap:14px;flex:1;min-width:0;">
                        <div style="width:44px;height:44px;border-radius:10px;background:#faf5ff;display:flex;align-items:center;justify-content:center;flex-shrink:0;color:#7c3aed;"><svg style="width:20px;height:20px;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg></div>
                        <div style="min-width:0;">
                            <p style="font-weight:600;color:#111827;font-size:14px;">{{ $hasBundle ? $item->title : ($item->orderable->title ?? 'English Unlocked — Materi Interaktif') }}</p>
                            @if($hasBundle)
                                <span style="display:inline-flex;align-items:center;gap:4px;font-size:11px;background:#e0e7ff;color:#3730a3;padding:2px 8px;border-radius:10px;font-weight:600;"><svg style="width:12px;height:12px;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg> via Paket Bundling</span>
                            @else
                                <p style="font-size:12px;color:#9ca3af;margin-top:2px;">{{ $item->invoice_number }} · {{ $item->created_at->format('d M Y') }}</p>
                            @endif
                        </div>
                    </div>
                    <div style="display:flex;align-items:center;gap:10px;flex-shrink:0;">
                        @if($hasBundle)
                            <a href="/materi/modul/1" class="btn-akses">Buka Materi</a>
                        @else
                            @include('member._status-badge', ['status' => $item->status])
                            @if($item->status === 'paid')
                                <a href="/materi/modul/1" class="btn-akses">Buka Materi</a>
                            @else
                                <a href="/member/order/{{ $item->id }}" class="btn-detail">Detail</a>
                            @endif
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>


    {{-- TAB: TEMPLATE --}}
    <div x-show="tab==='template'" style="display:none;">
        @if($templates->isEmpty())
            <div class="empty-state">
                <p style="margin-bottom:12px;display:flex;justify-content:center;"><svg style="width:40px;height:40px;color:#818cf8;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg></p>
                <p style="font-weight:600;color:#374151;margin-bottom:6px;">Belum ada template</p>
                <a href="/template" style="color:#1d4ed8;font-size:13px;">Lihat Template Website →</a>
            </div>
        @else
            <div class="space-y-3">
                @foreach($templates as $item)
                <div class="order-card">
                    <div style="display:flex;align-items:center;gap:14px;flex:1;min-width:0;">
                        <div style="width:44px;height:44px;border-radius:10px;background:#f0f4ff;display:flex;align-items:center;justify-content:center;flex-shrink:0;color:#4f46e5;"><svg style="width:20px;height:20px;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg></div>
                        <div style="min-width:0;">
                            <p style="font-weight:600;color:#111827;font-size:14px;">{{ $hasBundle ? $item->title : ($item->orderable->title ?? '—') }}</p>
                            @if($hasBundle)
                                <span style="display:inline-flex;align-items:center;gap:4px;font-size:11px;background:#e0e7ff;color:#3730a3;padding:2px 8px;border-radius:10px;font-weight:600;"><svg style="width:12px;height:12px;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg> via Paket Bundling</span>
                            @else
                                <p style="font-size:12px;color:#9ca3af;margin-top:2px;">{{ $item->invoice_number }} · {{ $item->created_at->format('d M Y') }}</p>
                            @endif
                        </div>
                    </div>
                    <div style="display:flex;align-items:center;gap:10px;flex-shrink:0;">
                        @if($hasBundle)
                            <a href="/member/template/{{ $item->id }}/download" class="btn-akses">Download</a>
                        @else
                            @include('member._status-badge', ['status' => $item->status])
                            @if($item->status === 'paid')
                                <a href="/member/template/{{ $item->orderable_id }}/download" class="btn-akses">Download</a>
                            @else
                                <a href="/member/order/{{ $item->id }}" class="btn-detail">Detail</a>
                            @endif
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>

    {{-- TAB: RIWAYAT --}}
    <div x-show="tab==='riwayat'" style="display:none;">
        @if($allOrders->isEmpty())
            <div class="empty-state">
                <p style="margin-bottom:12px;display:flex;justify-content:center;"><svg style="width:40px;height:40px;color:#9ca3af;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg></p>
                <p style="font-weight:600;color:#374151;margin-bottom:6px;">Belum ada transaksi</p>
                <a href="/ebook" style="color:#1d4ed8;font-size:13px;">Mulai belanja →</a>
            </div>
        @else
            <div class="space-y-3">
                @foreach($allOrders as $order)
                @php
                    $productName = match($order->orderable_type) {
                        'bundle' => 'Paket Bundling — Akses Semua Konten',
                        default  => $order->orderable?->title ?? '—',
                    };
                @endphp
                <div class="order-card">
                    <div style="display:flex;align-items:center;gap:14px;flex:1;min-width:0;">
                        <div style="width:44px;height:44px;border-radius:10px;background:#f9fafb;display:flex;align-items:center;justify-content:center;flex-shrink:0;color:#6b7280;">
                            @switch($order->orderable_type)
                                @case('ebook')
                                    <svg style="width:20px;height:20px;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                    @break
                                @case('course')
                                    <svg style="width:20px;height:20px;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                                    @break
                                @case('materi')
                                    <svg style="width:20px;height:20px;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                                    @break
                                @case('bundle')
                                    <svg style="width:20px;height:20px;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                                    @break
                                @case('template')
                                    <svg style="width:20px;height:20px;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg>
                                    @break
                                @default
                                    <svg style="width:20px;height:20px;" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                            @endswitch
                        </div>
                        <div style="min-width:0;">
                            <p style="font-weight:600;color:#111827;font-size:14px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ $productName }}</p>
                            <div style="display:flex;align-items:center;gap:8px;margin-top:3px;flex-wrap:wrap;">
                                <span style="font-size:11px;color:#9ca3af;">{{ $order->invoice_number }}</span>
                                <span style="font-size:11px;color:#d1d5db;">·</span>
                                <span style="font-size:11px;color:#9ca3af;">{{ $order->created_at->format('d M Y') }}</span>
                                <span style="font-size:11px;color:#d1d5db;">·</span>
                                <span style="font-size:11px;color:#6b7280;font-weight:600;">Rp {{ number_format($order->amount, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                    <div style="display:flex;align-items:center;gap:10px;flex-shrink:0;">
                        @include('member._status-badge', ['status' => $order->status])
                        <a href="/member/order/{{ $order->id }}" class="btn-detail">Detail</a>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>

</div>

<style>
.empty-state { background:#fff; border:1px dashed #e5e7eb; border-radius:16px; padding:48px; text-align:center; }
.order-card { background:#fff; border:1px solid #e5e7eb; border-radius:14px; padding:16px 20px; display:flex; align-items:center; justify-content:space-between; gap:12px; }
.space-y-3 > * + * { margin-top:12px; }
.btn-akses { background:#16a34a; color:#fff; font-size:13px; font-weight:600; padding:8px 16px; border-radius:8px; text-decoration:none; white-space:nowrap; }
.btn-detail { background:#eff6ff; color:#1d4ed8; font-size:13px; font-weight:600; padding:8px 16px; border-radius:8px; text-decoration:none; white-space:nowrap; }
</style>

</x-layouts.app>
