<x-layouts.admin title="Kelola Order">
    @if(session('success'))
        <div class="bg-green-50 text-green-700 text-sm rounded-lg px-4 py-3 mb-6">{{ session('success') }}</div>
    @endif

    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-500 text-xs uppercase">
                <tr>
                    <th class="px-6 py-3 text-left">Invoice</th>
                    <th class="px-6 py-3 text-left">Member</th>
                    <th class="px-6 py-3 text-left">Produk</th>
                    <th class="px-6 py-3 text-left">Total</th>
                    <th class="px-6 py-3 text-left">Bukti</th>
                    <th class="px-6 py-3 text-left">Status</th>
                    <th class="px-6 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach($orders as $order)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-mono text-xs">{{ $order->invoice_number }}</td>
                        <td class="px-6 py-4">{{ $order->user->name }}</td>
                        <td class="px-6 py-4">{{ ucfirst($order->orderable_type) }}</td>
                        <td class="px-6 py-4 font-semibold">Rp {{ number_format($order->amount, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">
                            @if($order->payment_proof)
                                <a href="{{ asset('storage/'.$order->payment_proof) }}" target="_blank" class="text-blue-700 hover:underline">Lihat</a>
                            @else
                                <span class="text-gray-400">—</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <span @class([
                                'text-xs font-semibold px-2 py-1 rounded-full',
                                'bg-yellow-100 text-yellow-700' => $order->status === 'pending',
                                'bg-green-100 text-green-700'   => $order->status === 'paid',
                                'bg-red-100 text-red-700'       => $order->status === 'rejected',
                            ])>{{ ucfirst($order->status) }}</span>
                        </td>
                        <td class="px-6 py-4">
                            @if($order->status === 'pending')
                                <div class="flex gap-2">
                                    <form method="POST" action="/admin/order/{{ $order->id }}/approve">
                                        @csrf
                                        <button class="text-xs bg-green-600 text-white px-3 py-1.5 rounded-lg hover:bg-green-700">Konfirmasi</button>
                                    </form>
                                    <form method="POST" action="/admin/order/{{ $order->id }}/reject">
                                        @csrf
                                        <button class="text-xs bg-red-600 text-white px-3 py-1.5 rounded-lg hover:bg-red-700">Tolak</button>
                                    </form>
                                </div>
                            @else
                                <span class="text-gray-400 text-xs">—</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-6">{{ $orders->links() }}</div>
</x-layouts.admin>
