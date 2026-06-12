@php
$styles = [
    'pending'  => 'background:#fef9c3;color:#854d0e;',
    'paid'     => 'background:#dcfce7;color:#15803d;',
    'rejected' => 'background:#fee2e2;color:#991b1b;',
];
$labels = ['pending' => 'Menunggu', 'paid' => 'Lunas', 'rejected' => 'Ditolak'];
@endphp
<span style="font-size:11px;font-weight:700;padding:4px 10px;border-radius:20px;white-space:nowrap;{{ $styles[$status] ?? '' }}">
    {{ $labels[$status] ?? $status }}
</span>
