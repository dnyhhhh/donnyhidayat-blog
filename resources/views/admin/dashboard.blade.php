<x-layouts.admin title="Dashboard">
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
            <p class="text-sm text-gray-500">Total Member</p>
            <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalUsers }}</p>
        </div>
        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
            <p class="text-sm text-gray-500">Ebook</p>
            <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalEbooks }}</p>
        </div>
        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
            <p class="text-sm text-gray-500">Kelas</p>
            <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalCourses }}</p>
        </div>
        <div class="bg-white rounded-2xl p-6 border border-red-100 shadow-sm bg-red-50">
            <p class="text-sm text-red-500">Order Pending</p>
            <p class="text-3xl font-bold text-red-700 mt-1">{{ $pendingOrders }}</p>
        </div>
    </div>

    <h2 class="text-lg font-semibold mb-4">Order Terbaru</h2>
    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-500 text-xs uppercase">
                <tr>
                    <th class="px-6 py-3 text-left">Invoice</th>
                    <th class="px-6 py-3 text-left">Member</th>
                    <th class="px-6 py-3 text-left">Produk</th>
                    <th class="px-6 py-3 text-left">Total</th>
                    <th class="px-6 py-3 text-left">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach($recentOrders as $order)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-mono text-xs">{{ $order->invoice_number }}</td>
                        <td class="px-6 py-4">{{ $order->user->name }}</td>
                        <td class="px-6 py-4">{{ ucfirst($order->orderable_type) }}</td>
                        <td class="px-6 py-4">Rp {{ number_format($order->amount, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">
                            <span @class([
                                'text-xs font-semibold px-2 py-1 rounded-full',
                                'bg-yellow-100 text-yellow-700' => $order->status === 'pending',
                                'bg-green-100 text-green-700'   => $order->status === 'paid',
                                'bg-red-100 text-red-700'       => $order->status === 'rejected',
                            ])>{{ ucfirst($order->status) }}</span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        <a href="/admin/order" class="text-sm text-blue-700 hover:underline">Lihat semua order →</a>
    </div>
</x-layouts.admin>
