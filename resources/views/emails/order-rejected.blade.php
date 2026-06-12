<x-mail::message>
# Pembayaran Tidak Dapat Diproses

Halo **{{ $order->user->name }}**,

Mohon maaf, pembayaran untuk invoice **{{ $order->invoice_number }}** tidak dapat kami konfirmasi.

<x-mail::panel>
**Invoice:** {{ $order->invoice_number }}
**Produk:** {{ ucfirst($order->orderable_type) }}
**Total:** Rp {{ number_format($order->amount, 0, ',', '.') }}
**Status:** ❌ Ditolak
</x-mail::panel>

Kemungkinan penyebab:
- Bukti transfer tidak jelas / tidak terbaca
- Jumlah transfer tidak sesuai
- Transfer ke rekening yang salah

**Silakan coba lagi** dengan upload ulang bukti transfer yang valid, atau hubungi kami langsung.

<x-mail::button :url="url('/member/order/' . $order->id)" color="error">
Lihat Detail & Upload Ulang
</x-mail::button>

Jika ada pertanyaan, balas email ini atau hubungi: **donnyhidayat49@gmail.com**

Salam,
**Donny Hidayat**
donnyhidayat.blog
</x-mail::message>
