<x-layouts.app title="Dashboard — donnyhidayat.blog">
<div class="max-w-4xl mx-auto px-4 py-12">
    <h1 class="text-2xl font-bold text-gray-800 mb-2">Halo, {{ auth()->user()->name }} 👋</h1>
    <p class="text-gray-500 mb-8">Kelola pembelian dan akses konten Anda di sini.</p>

    @if(session('success'))
        <div class="bg-green-50 text-green-700 text-sm rounded-lg px-4 py-3 mb-6">{{ session('success') }}</div>
    @endif

    <h2 class="text-lg font-semibold mb-4">Riwayat Pembelian</h2>

    @if($orders->isEmpty())
        <div class="bg-white rounded-2xl border border-gray-100 p-10 text-center text-gray-400">
            <p class="text-4xl mb-3">🛒</p>
            <p>Belum ada pembelian. <a href="/ebook" class="text-blue-700 hover:underline">Lihat Ebook</a> atau <a href="/kelas" class="text-blue-700 hover:underline">Lihat Kelas</a>.</p>
        </div>
    @else
        <div class="space-y-4">
            @foreach($orders as $order)
                <div class="bg-white rounded-2xl border border-gray-100 p-5 flex items-center justify-between">
                    <div>
                        <p class="font-medium text-gray-800">{{ $order->invoice_number }}</p>
                        <p class="text-sm text-gray-500 mt-1">
                            {{ ucfirst($order->orderable_type) }} •
                            Rp {{ number_format($order->amount, 0, ',', '.') }} •
                            {{ $order->created_at->format('d M Y') }}
                        </p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span @class([
                            'text-xs font-semibold px-3 py-1 rounded-full',
                            'bg-yellow-100 text-yellow-700' => $order->status === 'pending',
                            'bg-green-100 text-green-700'  => $order->status === 'paid',
                            'bg-red-100 text-red-700'      => $order->status === 'rejected',
                        ])>{{ ucfirst($order->status) }}</span>
                        <a href="/member/order/{{ $order->id }}" class="text-sm text-blue-700 hover:underline">Detail</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-6">{{ $orders->links() }}</div>
    @endif
</div>
</x-layouts.app>
