<x-layouts.app title="Tentang Donny Hidayat — donnyhidayat.blog">

{{-- Hero --}}
<section class="bg-gradient-to-br from-blue-900 via-blue-800 to-blue-700 text-white">
    <div class="max-w-5xl mx-auto px-4 py-20 flex flex-col md:flex-row items-center gap-10">
        <div class="flex-shrink-0">
            <div style="width:140px;height:140px;border-radius:50%;background:rgba(255,255,255,0.15);display:flex;align-items:center;justify-content:center;font-size:60px;border:4px solid rgba(255,255,255,0.3);">
                👨‍💻
            </div>
        </div>
        <div>
            <p class="text-blue-300 text-sm font-medium tracking-widest uppercase mb-2">Tentang Saya</p>
            <h1 class="text-3xl md:text-4xl font-bold mb-1">Donny Hidayat, S.Kom</h1>
            <p class="text-blue-200 text-lg mb-4">Web Developer · Entrepreneur · Digital Enthusiast</p>
            <p class="text-blue-100 leading-relaxed max-w-2xl">
                Fresh graduate Rekayasa Sistem Komputer Universitas Tanjungpura dengan predikat <strong class="text-white">Cumlaude (IPK 3.87)</strong>. Aktif membangun produk digital, mendirikan startup, dan berbagi ilmu lewat ebook & kelas online.
            </p>
            <div class="flex flex-wrap gap-3 mt-6">
                <a href="mailto:donnyhidayat49@gmail.com"
                   class="flex items-center gap-2 bg-white/10 hover:bg-white/20 border border-white/20 px-4 py-2 rounded-full text-sm transition">
                    <i class="fa-solid fa-envelope"></i> donnyhidayat49@gmail.com
                </a>
                <a href="https://linkedin.com/in/donny-hidayat" target="_blank"
                   class="flex items-center gap-2 bg-white/10 hover:bg-white/20 border border-white/20 px-4 py-2 rounded-full text-sm transition">
                    <i class="fa-brands fa-linkedin"></i> LinkedIn
                </a>
                <span class="flex items-center gap-2 bg-white/10 border border-white/20 px-4 py-2 rounded-full text-sm">
                    <i class="fa-solid fa-location-dot"></i> Pontianak, Kalimantan Barat
                </span>
            </div>
        </div>
    </div>
</section>

{{-- Ringkasan --}}
<section class="max-w-5xl mx-auto px-4 py-14">
    <div class="grid md:grid-cols-3 gap-6 text-center">
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
            <p class="text-4xl font-bold text-blue-700 mb-1">3.87</p>
            <p class="text-sm text-gray-500">IPK Cumlaude</p>
        </div>
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
            <p class="text-4xl font-bold text-blue-700 mb-1">7+</p>
            <p class="text-sm text-gray-500">Penghargaan & Kompetisi</p>
        </div>
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
            <p class="text-4xl font-bold text-blue-700 mb-1">4+</p>
            <p class="text-sm text-gray-500">Tahun Membangun Produk Digital</p>
        </div>
    </div>
</section>

{{-- Tentang --}}
<section class="max-w-5xl mx-auto px-4 pb-10">
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8 md:p-10">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Siapa Donny?</h2>
        <div class="text-gray-600 leading-relaxed space-y-3 text-sm">
            <p>Saya adalah seorang web developer dan entrepreneur muda dari Pontianak, Kalimantan Barat. Perjalanan saya di dunia teknologi dimulai sejak bangku kuliah, di mana saya tidak hanya belajar teori tetapi langsung terjun membangun bisnis dan produk nyata.</p>
            <p>Pada 2021, saya mendirikan <strong>Webkite</strong> — sebuah studio web development yang membantu bisnis dan organisasi hadir secara digital dengan website yang profesional. Saya juga aktif sebagai co-founder <strong>Amallan</strong>, komunitas yang membantu pondok pesantren mencapai kemandirian melalui digitalisasi.</p>
            <p>Selain membangun produk, saya percaya bahwa berbagi ilmu adalah investasi terbaik. Lewat platform ini, saya menerbitkan ebook dan membuka kelas online agar siapa pun bisa belajar hal-hal praktis di bidang teknologi dan bisnis digital.</p>
        </div>
    </div>
</section>

{{-- Pengalaman --}}
<section class="max-w-5xl mx-auto px-4 pb-10">
    <h2 class="text-xl font-bold text-gray-800 mb-6">Pengalaman Kerja</h2>
    <div class="space-y-4">

        @php
        $experiences = [
            [
                'role'    => 'Founder & WordPress Developer',
                'company' => 'Webkite',
                'period'  => '2021 – Sekarang',
                'desc'    => 'Mendirikan dan memimpin studio web development di Pontianak. Mengelola pengembangan dan desain situs web menggunakan WordPress untuk berbagai klien bisnis dan organisasi.',
                'icon'    => '🌐',
                'color'   => 'blue',
            ],
            [
                'role'    => 'Co-Founder & CEO',
                'company' => 'Amallan',
                'period'  => 'Pontianak',
                'desc'    => 'Memimpin komunitas yang berfokus membantu pondok pesantren mencapai kemandirian ekonomi dan sosial melalui digitalisasi dan pemberdayaan teknologi.',
                'icon'    => '🕌',
                'color'   => 'green',
            ],
            [
                'role'    => 'Divisi Pengembangan Pasar',
                'company' => 'Bursa Efek Indonesia — KP Kalimantan Barat',
                'period'  => 'Agu – Des 2024',
                'desc'    => 'Mengembangkan strategi pemasaran dan edukasi pasar modal untuk meningkatkan partisipasi investor di Kalimantan Barat dan membangun hubungan dengan institusi keuangan.',
                'icon'    => '📈',
                'color'   => 'orange',
            ],
            [
                'role'    => 'CEO',
                'company' => 'SampahCeria',
                'period'  => 'Mei – Des 2024',
                'desc'    => 'Merintis dan memimpin usaha bisnis digital di bidang produk kebersihan lingkungan berbasis teknologi.',
                'icon'    => '♻️',
                'color'   => 'green',
            ],
            [
                'role'    => 'Desainer Grafis',
                'company' => 'EkonomiKalbar.com',
                'period'  => 'Mei 2024 – Sekarang',
                'desc'    => 'Membuat desain konten dan mengelola media sosial ekonomikalbar.com by Forum Jurnalis Ekonomi Khatulistiwa (Fojekha).',
                'icon'    => '🎨',
                'color'   => 'purple',
            ],
            [
                'role'    => 'Staff Pengembangan Karir & Kewirausahaan',
                'company' => 'UPA PK2 Universitas Tanjungpura',
                'period'  => 'Pontianak',
                'desc'    => 'Mengelola website dan program rutinitas UPA PK2 UNTAN untuk mendukung pengembangan karir mahasiswa.',
                'icon'    => '🏛️',
                'color'   => 'blue',
            ],
        ];
        @endphp

        @foreach($experiences as $exp)
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 flex gap-5 items-start">
            <div style="width:48px;height:48px;border-radius:12px;background:#eff6ff;display:flex;align-items:center;justify-content:center;font-size:22px;flex-shrink:0;">{{ $exp['icon'] }}</div>
            <div class="flex-1 min-w-0">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1 mb-1">
                    <h3 class="font-semibold text-gray-800">{{ $exp['role'] }}</h3>
                    <span class="text-xs text-gray-400 whitespace-nowrap">{{ $exp['period'] }}</span>
                </div>
                <p class="text-sm text-blue-700 font-medium mb-2">{{ $exp['company'] }}</p>
                <p class="text-sm text-gray-500 leading-relaxed">{{ $exp['desc'] }}</p>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- Pendidikan --}}
<section class="max-w-5xl mx-auto px-4 pb-10">
    <h2 class="text-xl font-bold text-gray-800 mb-6">Pendidikan</h2>
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 flex gap-5 items-start">
        <div style="width:48px;height:48px;border-radius:12px;background:#eff6ff;display:flex;align-items:center;justify-content:center;font-size:22px;flex-shrink:0;">🎓</div>
        <div>
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1 mb-1">
                <h3 class="font-semibold text-gray-800">Sarjana Rekayasa Sistem Komputer</h3>
                <span class="text-xs text-gray-400">Mei 2021 – April 2025</span>
            </div>
            <p class="text-sm text-blue-700 font-medium mb-2">Universitas Tanjungpura, Pontianak</p>
            <div class="flex flex-wrap gap-2 mt-2">
                <span style="background:#dcfce7;color:#15803d;font-size:12px;font-weight:600;padding:3px 10px;border-radius:20px;">Cumlaude</span>
                <span style="background:#eff6ff;color:#1d4ed8;font-size:12px;font-weight:600;padding:3px 10px;border-radius:20px;">IPK 3.87 / 4.00</span>
                <span style="background:#f3f4f6;color:#374151;font-size:12px;font-weight:600;padding:3px 10px;border-radius:20px;">Lulus Tepat Waktu</span>
            </div>
            <p class="text-sm text-gray-500 leading-relaxed mt-3">Aktif dalam Himpunan Mahasiswa Rekayasa Sistem Komputer sebagai Kepala Divisi Keilmuan (2023–2024), serta mengikuti berbagai kompetisi di tingkat universitas hingga nasional.</p>
        </div>
    </div>
</section>

{{-- Penghargaan --}}
<section class="max-w-5xl mx-auto px-4 pb-10">
    <h2 class="text-xl font-bold text-gray-800 mb-6">Penghargaan & Prestasi</h2>
    <div class="grid md:grid-cols-2 gap-4">
        @php
        $awards = [
            ['🥇', 'Juara 1 Social Media Marketing Contest', 'KMI Award XIV 2023 — Direktorat Belmawa, Universitas Pendidikan Ganesha', '2023'],
            ['🥉', 'Juara 3 Fordigi Hackathon Challenge', 'City Chapter #5 Universitas Lambung Mangkurat — Kementerian BUMN', '2023'],
            ['🥉', 'Juara 3 MTQ Mahasiswa', 'Desain Aplikasi Komputer Al-Qur\'an — Universitas Tanjungpura', '2023'],
            ['🏅', 'Harapan 1 Pitching Day Business Competition', 'TDA Community Pontianak', '2022'],
            ['🥇', 'Juara 1 Business Idea Competition', 'Himpunan Mahasiswa Teknik Informatika — Universitas Tanjungpura', '2022'],
            ['🥈', 'Juara 2 Business Plan Competition', 'Himpunan Mahasiswa Sistem Informasi — Universitas Sriwijaya', '2022'],
            ['🥈', 'Juara 2 Bisnis dan Kewirausahaan', 'Fakultas MIPA — Universitas Tanjungpura', '2022'],
        ];
        @endphp
        @foreach($awards as $award)
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 flex gap-4 items-start">
            <span style="font-size:28px;flex-shrink:0;">{{ $award[0] }}</span>
            <div>
                <p class="font-semibold text-gray-800 text-sm">{{ $award[1] }}</p>
                <p class="text-xs text-gray-500 mt-0.5">{{ $award[2] }}</p>
                <span style="background:#eff6ff;color:#1d4ed8;font-size:11px;font-weight:600;padding:2px 8px;border-radius:20px;display:inline-block;margin-top:6px;">{{ $award[3] }}</span>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- Skill --}}
<section class="max-w-5xl mx-auto px-4 pb-10">
    <h2 class="text-xl font-bold text-gray-800 mb-6">Keahlian</h2>
    <div class="grid md:grid-cols-3 gap-5">
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
            <p class="text-sm font-bold text-gray-700 mb-3">💻 Hard Skill</p>
            <div class="flex flex-wrap gap-2">
                @foreach(['WordPress', 'Python', 'Laravel', 'Web Development', 'Desain Grafis', 'Copywriting', 'Video Editing'] as $skill)
                <span style="background:#eff6ff;color:#1d4ed8;font-size:12px;padding:4px 10px;border-radius:20px;">{{ $skill }}</span>
                @endforeach
            </div>
        </div>
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
            <p class="text-sm font-bold text-gray-700 mb-3">🤝 Soft Skill</p>
            <div class="flex flex-wrap gap-2">
                @foreach(['Komunikasi', 'Kerjasama Tim', 'Kreativitas', 'Problem Solving', 'Leadership', 'Inisiatif'] as $skill)
                <span style="background:#f0fdf4;color:#15803d;font-size:12px;padding:4px 10px;border-radius:20px;">{{ $skill }}</span>
                @endforeach
            </div>
        </div>
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
            <p class="text-sm font-bold text-gray-700 mb-3">🛠️ Software</p>
            <div class="flex flex-wrap gap-2">
                @foreach(['Microsoft Office', 'Canva', 'CapCut', 'Elementor', 'VS Code'] as $skill)
                <span style="background:#faf5ff;color:#7c3aed;font-size:12px;padding:4px 10px;border-radius:20px;">{{ $skill }}</span>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- Sertifikasi --}}
<section class="max-w-5xl mx-auto px-4 pb-10">
    <h2 class="text-xl font-bold text-gray-800 mb-6">Sertifikasi</h2>
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm divide-y divide-gray-50">
        @php
        $certs = [
            ['Program Solusi Pasar Modal', 'PT. Surya Fajar Sekuritas', '2024'],
            ['Modul Pasar Modal (Basic)', 'Otoritas Jasa Keuangan (OJK)', '2024'],
            ['Boothcamp Fordigi Hackathon Challenge', 'Kementerian BUMN', '2023'],
            ['Indonesian Student Entrepreneur Camp (ISEC)', 'Direktorat Belmawa', '2023'],
            ['Gerakan Literasi Pandu Digital Indonesia', 'Kementerian KOMINFO', '2022'],
            ['Kelas Website Tanpa Koding', 'Habis Kerja', '2022'],
            ['English Soft Skill Development Camp', 'American Corner Universitas Tanjungpura', '2021'],
        ];
        @endphp
        @foreach($certs as $cert)
        <div class="px-6 py-4 flex items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <i class="fa-solid fa-certificate text-yellow-400"></i>
                <div>
                    <p class="text-sm font-medium text-gray-800">{{ $cert[0] }}</p>
                    <p class="text-xs text-gray-400">{{ $cert[1] }}</p>
                </div>
            </div>
            <span style="background:#fefce8;color:#854d0e;font-size:11px;font-weight:600;padding:2px 8px;border-radius:20px;white-space:nowrap;">{{ $cert[2] }}</span>
        </div>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="max-w-5xl mx-auto px-4 pb-20">
    <div class="bg-gradient-to-r from-blue-700 to-blue-900 rounded-2xl p-10 text-white text-center">
        <h2 class="text-2xl font-bold mb-2">Mari Berkolaborasi!</h2>
        <p class="text-blue-200 mb-6 max-w-lg mx-auto text-sm">Tertarik bekerja sama, berdiskusi tentang teknologi, atau ingin belajar bareng? Jangan ragu untuk menghubungi saya.</p>
        <div class="flex flex-wrap justify-center gap-3">
            <a href="mailto:donnyhidayat49@gmail.com"
               class="bg-white text-blue-700 font-semibold px-6 py-3 rounded-xl hover:bg-blue-50 transition text-sm">
                <i class="fa-solid fa-envelope mr-2"></i>Kirim Email
            </a>
            <a href="https://linkedin.com/in/donny-hidayat" target="_blank"
               class="bg-white/10 border border-white/30 text-white font-semibold px-6 py-3 rounded-xl hover:bg-white/20 transition text-sm">
                <i class="fa-brands fa-linkedin mr-2"></i>LinkedIn
            </a>
            <a href="/ebook"
               class="bg-white/10 border border-white/30 text-white font-semibold px-6 py-3 rounded-xl hover:bg-white/20 transition text-sm">
                📚 Lihat Ebook Saya
            </a>
        </div>
    </div>
</section>

</x-layouts.app>
