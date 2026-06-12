<x-layouts.app title="Detail Order — donnyhidayat.blog">
<div class="max-w-2xl mx-auto px-4 py-12">
    <a href="/member/dashboard" class="text-sm text-blue-700 hover:underline">← Kembali ke Dashboard</a>

    <div class="bg-white rounded-2xl border border-gray-100 p-8 mt-6">
        <div class="flex items-start justify-between mb-6">
            <div>
                <h1 class="text-xl font-bold text-gray-800">{{ $order->invoice_number }}</h1>
                <p class="text-sm text-gray-500 mt-1">{{ $order->created_at->format('d M Y, H:i') }}</p>
            </div>
            <span @class([
                'text-sm font-semibold px-3 py-1 rounded-full',
                'bg-yellow-100 text-yellow-700' => $order->status === 'pending',
                'bg-green-100 text-green-700'   => $order->status === 'paid',
                'bg-red-100 text-red-700'       => $order->status === 'rejected',
            ])>{{ ucfirst($order->status) }}</span>
        </div>

        <div class="border-t border-gray-100 pt-6 space-y-3 text-sm">
            <div class="flex justify-between">
                <span class="text-gray-500">Jenis Produk</span>
                <span class="font-medium">{{ ucfirst($order->orderable_type) }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500">Total Pembayaran</span>
                <span class="font-bold text-blue-700">Rp {{ number_format($order->amount, 0, ',', '.') }}</span>
            </div>
        </div>

        @if($order->status === 'pending')
            <div class="mt-8 bg-blue-50 rounded-xl p-5">
                <h2 class="font-semibold text-gray-800 mb-2">Instruksi Pembayaran</h2>
                <p class="text-sm text-gray-600">Transfer sejumlah <strong>Rp {{ number_format($order->amount, 0, ',', '.') }}</strong> ke rekening berikut:</p>
                <div class="mt-3 text-sm space-y-1">
                    <p><strong>Bank BCA</strong> — No. Rek: <strong>1234567890</strong></p>
                    <p>Atas Nama: <strong>Donny Hidayat</strong></p>
                </div>
                <p class="text-xs text-gray-400 mt-3">Setelah transfer, unggah bukti pembayaran di bawah ini.</p>
            </div>

            @if($order->payment_proof)
                <div class="mt-6">
                    <p class="text-sm font-medium text-gray-700 mb-2">Bukti pembayaran sudah diunggah. Menunggu konfirmasi admin.</p>
                    <img src="{{ asset('storage/'.$order->payment_proof) }}" class="rounded-lg max-h-48 object-contain border border-gray-200">
                </div>
            @else
                <form method="POST" action="/member/order/{{ $order->id }}/proof" enctype="multipart/form-data" class="mt-6">
                    @csrf
                    @if(session('success'))
                        <div class="bg-green-50 text-green-700 text-sm rounded-lg px-4 py-3 mb-4">{{ session('success') }}</div>
                    @endif
                    <label class="block text-sm font-medium text-gray-700 mb-2">Upload Bukti Transfer</label>
                    <input type="file" name="proof" accept="image/*" required
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    <button type="submit" class="mt-4 bg-blue-700 text-white text-sm font-semibold px-6 py-2.5 rounded-lg hover:bg-blue-800">
                        Kirim Bukti Pembayaran
                    </button>
                </form>
            @endif
        @endif

        @if($order->status === 'paid')
            <div class="mt-6 bg-green-50 rounded-xl p-5 text-center">
                <p class="text-green-700 font-semibold">Pembayaran dikonfirmasi ✓</p>
                @if($order->orderable_type === 'ebook')
                    <a href="/member/ebook/{{ $order->orderable_id }}/download"
                        class="inline-block mt-3 bg-green-600 text-white text-sm font-semibold px-6 py-2.5 rounded-lg hover:bg-green-700">
                        Download Ebook
                    </a>
                @elseif($order->orderable_type === 'materi')
                    <a href="/materi/modul/1"
                        class="inline-block mt-3 bg-green-600 text-white text-sm font-semibold px-6 py-2.5 rounded-lg hover:bg-green-700">
                        Akses Materi Interaktif
                    </a>
                @else
                    <a href="/kelas"
                        class="inline-block mt-3 bg-green-600 text-white text-sm font-semibold px-6 py-2.5 rounded-lg hover:bg-green-700">
                        Akses Kelas
                    </a>
                @endif
            </div>
        @endif
    </div>
</div>
</x-layouts.app>
