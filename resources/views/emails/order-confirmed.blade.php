<x-mail::message>
# Pembayaran Dikonfirmasi! 🎉

Halo **{{ $order->user->name }}**,

Kabar baik! Pembayaranmu untuk invoice **{{ $order->invoice_number }}** telah berhasil dikonfirmasi. Kamu sekarang bisa mengakses kontennya.

<x-mail::panel>
**Invoice:** {{ $order->invoice_number }}
**Produk:** {{ ucfirst($order->orderable_type) }}
**Total:** Rp {{ number_format($order->amount, 0, ',', '.') }}
**Status:** ✅ Lunas
</x-mail::panel>

@if($order->orderable_type === 'ebook')
<x-mail::button :url="url('/member/dashboard#ebook')" color="success">
Download Ebook Sekarang
</x-mail::button>
@elseif($order->orderable_type === 'course')
<x-mail::button :url="url('/member/dashboard#kelas')" color="success">
Akses Kelas Sekarang
</x-mail::button>
@elseif($order->orderable_type === 'materi')
<x-mail::button :url="url('/materi/modul/1')" color="success">
Mulai Materi Interaktif
</x-mail::button>
@elseif($order->orderable_type === 'bundle')
<x-mail::button :url="url('/member/dashboard')" color="success">
Akses Semua Konten
</x-mail::button>
@endif

Selamat belajar! Jika ada pertanyaan, hubungi kami di **donnyhidayat49@gmail.com**.

Salam,
**Donny Hidayat**
donnyhidayat.blog
</x-mail::message>
