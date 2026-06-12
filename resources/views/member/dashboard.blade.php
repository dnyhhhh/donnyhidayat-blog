<x-layouts.app title="Dashboard — donnyhidayat.blog">
<div class="max-w-4xl mx-auto px-4 py-10" x-data="{ tab: window.location.hash.replace('#','') || 'ebook' }">

    {{-- Header --}}
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Halo, {{ auth()->user()->name }} 👋</h1>
        <p class="text-gray-500 text-sm mt-1">Akses semua konten yang sudah kamu beli di sini.</p>
    </div>

    @if(session('success'))
        <div class="bg-green-50 text-green-700 text-sm rounded-lg px-4 py-3 mb-6">{{ session('success') }}</div>
    @endif

    {{-- Tab menu --}}
    <div style="display:flex;gap:8px;border-bottom:2px solid #e5e7eb;margin-bottom:28px;overflow-x:auto;">
        @foreach([
            ['ebook',  '📘', 'Ebook Saya',           $ebooks->count()],
            ['kelas',  '🎓', 'Kelas Saya',            $courses->count()],
            ['materi', '✏️', 'Materi Interaktif',     $materis->count()],
        ] as [$key, $icon, $label, $count])
        <button @click="tab='{{ $key }}'; window.location.hash='{{ $key }}'"
                :style="tab==='{{ $key }}'
                    ? 'border-bottom:3px solid #1d4ed8;color:#1d4ed8;font-weight:700;'
                    : 'border-bottom:3px solid transparent;color:#6b7280;'"
                style="display:flex;align-items:center;gap:6px;padding:10px 18px;background:none;border-top:none;border-left:none;border-right:none;cursor:pointer;font-size:14px;white-space:nowrap;transition:color .2s;margin-bottom:-2px;">
            <span>{{ $icon }}</span>
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
                <p style="font-size:40px;margin-bottom:12px;">📘</p>
                <p style="font-weight:600;color:#374151;margin-bottom:6px;">Belum ada ebook</p>
                <a href="/ebook" style="color:#1d4ed8;font-size:13px;">Lihat koleksi ebook →</a>
            </div>
        @else
            <div class="space-y-3">
                @foreach($ebooks as $order)
                @php $item = \App\Models\Ebook::find($order->orderable_id); @endphp
                <div class="order-card">
                    <div style="display:flex;align-items:center;gap:14px;flex:1;min-width:0;">
                        <div style="width:44px;height:44px;border-radius:10px;background:#eff6ff;display:flex;align-items:center;justify-content:center;font-size:20px;flex-shrink:0;">📘</div>
                        <div style="min-width:0;">
                            <p style="font-weight:600;color:#111827;font-size:14px;">{{ $item?->title ?? '—' }}</p>
                            <p style="font-size:12px;color:#9ca3af;margin-top:2px;">{{ $order->invoice_number }} · {{ $order->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                    <div style="display:flex;align-items:center;gap:10px;flex-shrink:0;">
                        @include('member._status-badge', ['status' => $order->status])
                        @if($order->status === 'paid')
                            <a href="/member/ebook/{{ $order->orderable_id }}/download" class="btn-akses">Download</a>
                        @else
                            <a href="/member/order/{{ $order->id }}" class="btn-detail">Detail</a>
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
                <p style="font-size:40px;margin-bottom:12px;">🎓</p>
                <p style="font-weight:600;color:#374151;margin-bottom:6px;">Belum ada kelas</p>
                <a href="/kelas" style="color:#1d4ed8;font-size:13px;">Lihat koleksi kelas →</a>
            </div>
        @else
            <div class="space-y-3">
                @foreach($courses as $order)
                @php $item = \App\Models\Course::find($order->orderable_id); @endphp
                <div class="order-card">
                    <div style="display:flex;align-items:center;gap:14px;flex:1;min-width:0;">
                        <div style="width:44px;height:44px;border-radius:10px;background:#f0fdf4;display:flex;align-items:center;justify-content:center;font-size:20px;flex-shrink:0;">🎓</div>
                        <div style="min-width:0;">
                            <p style="font-weight:600;color:#111827;font-size:14px;">{{ $item?->title ?? '—' }}</p>
                            <p style="font-size:12px;color:#9ca3af;margin-top:2px;">{{ $order->invoice_number }} · {{ $order->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                    <div style="display:flex;align-items:center;gap:10px;flex-shrink:0;">
                        @include('member._status-badge', ['status' => $order->status])
                        @if($order->status === 'paid' && $item)
                            <a href="/kelas/{{ $item->slug }}" class="btn-akses">Buka Kelas</a>
                        @else
                            <a href="/member/order/{{ $order->id }}" class="btn-detail">Detail</a>
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
                <p style="font-size:40px;margin-bottom:12px;">✏️</p>
                <p style="font-weight:600;color:#374151;margin-bottom:6px;">Belum berlangganan materi interaktif</p>
                <a href="/materi" style="color:#1d4ed8;font-size:13px;">Lihat Materi Interaktif →</a>
            </div>
        @else
            <div class="space-y-3">
                @foreach($materis as $order)
                <div class="order-card">
                    <div style="display:flex;align-items:center;gap:14px;flex:1;min-width:0;">
                        <div style="width:44px;height:44px;border-radius:10px;background:#faf5ff;display:flex;align-items:center;justify-content:center;font-size:20px;flex-shrink:0;">✏️</div>
                        <div style="min-width:0;">
                            <p style="font-weight:600;color:#111827;font-size:14px;">English Unlocked — Materi Interaktif</p>
                            <p style="font-size:12px;color:#9ca3af;margin-top:2px;">{{ $order->invoice_number }} · {{ $order->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                    <div style="display:flex;align-items:center;gap:10px;flex-shrink:0;">
                        @include('member._status-badge', ['status' => $order->status])
                        @if($order->status === 'paid')
                            <a href="/materi/modul/1" class="btn-akses">Buka Materi</a>
                        @else
                            <a href="/member/order/{{ $order->id }}" class="btn-detail">Detail</a>
                        @endif
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
