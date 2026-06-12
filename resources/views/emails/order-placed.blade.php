<x-mail::message>
# Pesanan Kamu Sudah Diterima! 🎉

Halo **{{ $order->user->name }}**,

Terima kasih sudah melakukan pembelian di **donnyhidayat.blog**. Pesananmu sudah kami terima dan sedang menunggu konfirmasi pembayaran.

<x-mail::panel>
**Invoice:** {{ $order->invoice_number }}
**Produk:** {{ ucfirst($order->orderable_type) }}
**Total:** Rp {{ number_format($order->amount, 0, ',', '.') }}
**Status:** Menunggu Konfirmasi
</x-mail::panel>

Silakan upload bukti transfer di halaman invoice kamu.

<x-mail::button :url="url('/member/order/' . $order->id)" color="primary">
Lihat Invoice & Upload Bukti
</x-mail::button>

**Cara Pembayaran:**
1. Transfer ke rekening yang tertera di halaman invoice
2. Upload foto/screenshot bukti transfer
3. Admin akan konfirmasi dalam **1×24 jam**
4. Kamu akan mendapat email notifikasi setelah dikonfirmasi

Jika ada pertanyaan, balas email ini atau hubungi: **donnyhidayat49@gmail.com**

Salam,
**Donny Hidayat**
donnyhidayat.blog
</x-mail::message>
