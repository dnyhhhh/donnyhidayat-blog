<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RisetIdea;

class RisetIdeaSeeder extends Seeder
{
    public function run(): void
    {
        RisetIdea::truncate();

        $ideas = [

            // ─── TEKNOLOGI & SISTEM ───────────────────────────────────────────
            [
                'judul'       => 'Pengaruh Penggunaan Aplikasi Mobile Banking terhadap Loyalitas Nasabah',
                'deskripsi'   => 'Menganalisis bagaimana fitur, kemudahan, dan keamanan aplikasi mobile banking memengaruhi tingkat loyalitas nasabah bank.',
                'fakultas'    => 'Teknologi & Sistem',
                'konsentrasi' => 'Sistem Informasi',
                'metode'      => 'Kuantitatif',
            ],
            [
                'judul'       => 'Implementasi Machine Learning untuk Prediksi Churn Pelanggan E-Commerce',
                'deskripsi'   => 'Membangun model prediktif menggunakan algoritma machine learning untuk mengidentifikasi pelanggan yang berpotensi berhenti berlangganan.',
                'fakultas'    => 'Teknologi & Sistem',
                'konsentrasi' => 'Teknik Informatika',
                'metode'      => 'Kuantitatif',
            ],
            [
                'judul'       => 'Analisis Keamanan Sistem Informasi Menggunakan Metode OCTAVE pada Instansi Pemerintah',
                'deskripsi'   => 'Mengevaluasi tingkat keamanan aset informasi dan mengidentifikasi ancaman siber pada sistem informasi instansi pemerintah daerah.',
                'fakultas'    => 'Teknologi & Sistem',
                'konsentrasi' => 'Rekayasa Sistem',
                'metode'      => 'Kualitatif',
            ],
            [
                'judul'       => 'Perancangan Sistem Rekomendasi Produk UMKM Berbasis Collaborative Filtering',
                'deskripsi'   => 'Merancang sistem rekomendasi produk untuk marketplace UMKM lokal menggunakan teknik collaborative filtering berbasis rating pengguna.',
                'fakultas'    => 'Teknologi & Sistem',
                'konsentrasi' => 'Teknik Informatika',
                'metode'      => 'Mixed Methods',
            ],
            [
                'judul'       => 'Evaluasi Usability Aplikasi Pemerintah Digital Menggunakan System Usability Scale',
                'deskripsi'   => 'Mengukur tingkat kemudahan penggunaan aplikasi layanan publik digital menggunakan kuesioner SUS dan wawancara pengguna.',
                'fakultas'    => 'Teknologi & Sistem',
                'konsentrasi' => 'Sistem Informasi',
                'metode'      => 'Mixed Methods',
            ],
            [
                'judul'       => 'Pengaruh Kualitas Sistem Informasi Akademik terhadap Kepuasan Mahasiswa',
                'deskripsi'   => 'Menguji hubungan antara kualitas sistem informasi (keandalan, kemudahan, fitur) dengan kepuasan mahasiswa dalam mengakses layanan akademik.',
                'fakultas'    => 'Teknologi & Sistem',
                'konsentrasi' => null,
                'metode'      => 'Kuantitatif',
            ],
            [
                'judul'       => 'Analisis Faktor Penerimaan Teknologi IoT di Industri Manufaktur dengan TAM',
                'deskripsi'   => 'Menginvestigasi faktor-faktor yang memengaruhi penerimaan teknologi Internet of Things pada karyawan industri manufaktur menggunakan Technology Acceptance Model.',
                'fakultas'    => 'Teknologi & Sistem',
                'konsentrasi' => 'Rekayasa Sistem',
                'metode'      => 'Kuantitatif',
            ],
            [
                'judul'       => 'Rancang Bangun Aplikasi Monitoring Kesehatan Berbasis Android untuk Lansia',
                'deskripsi'   => 'Merancang dan mengembangkan aplikasi mobile yang memudahkan pemantauan kondisi kesehatan lansia secara real-time oleh keluarga dan tenaga medis.',
                'fakultas'    => 'Teknologi & Sistem',
                'konsentrasi' => 'Teknik Informatika',
                'metode'      => 'Mixed Methods',
            ],

            // ─── BISNIS & PEMASARAN ───────────────────────────────────────────
            [
                'judul'       => 'Pengaruh Influencer Marketing di Instagram terhadap Keputusan Pembelian Produk Skincare Gen Z',
                'deskripsi'   => 'Menganalisis sejauh mana konten promosi influencer di Instagram memengaruhi keputusan beli konsumen muda pada produk perawatan kulit lokal.',
                'fakultas'    => 'Bisnis & Pemasaran',
                'konsentrasi' => 'Pemasaran Digital',
                'metode'      => 'Kuantitatif',
            ],
            [
                'judul'       => 'Analisis Strategi Konten TikTok terhadap Brand Awareness UMKM Kuliner',
                'deskripsi'   => 'Mengkaji strategi konten video pendek di TikTok yang efektif dalam meningkatkan kesadaran merek usaha kuliner skala kecil dan menengah.',
                'fakultas'    => 'Bisnis & Pemasaran',
                'konsentrasi' => 'Pemasaran Digital',
                'metode'      => 'Kualitatif',
            ],
            [
                'judul'       => 'Pengaruh Customer Experience terhadap Net Promoter Score pada Startup E-Commerce',
                'deskripsi'   => 'Menguji dampak pengalaman pelanggan (onboarding, layanan, after-sales) terhadap kemauan merekomendasikan platform e-commerce kepada orang lain.',
                'fakultas'    => 'Bisnis & Pemasaran',
                'konsentrasi' => 'Manajemen',
                'metode'      => 'Kuantitatif',
            ],
            [
                'judul'       => 'Analisis Faktor yang Memengaruhi Perpindahan Merek (Brand Switching) pada Pengguna Aplikasi Ojek Online',
                'deskripsi'   => 'Menginvestigasi faktor pendorong konsumen untuk berpindah dari satu aplikasi ojek online ke aplikasi lain, meliputi harga, layanan, dan promo.',
                'fakultas'    => 'Bisnis & Pemasaran',
                'konsentrasi' => 'Manajemen',
                'metode'      => 'Kuantitatif',
            ],
            [
                'judul'       => 'Strategi Penetrasi Pasar Produk Lokal di Era Digital: Studi Kasus UMKM Kalimantan',
                'deskripsi'   => 'Mengeksplorasi strategi yang digunakan pelaku UMKM lokal dalam menembus pasar digital nasional melalui marketplace dan media sosial.',
                'fakultas'    => 'Bisnis & Pemasaran',
                'konsentrasi' => null,
                'metode'      => 'Kualitatif',
            ],
            [
                'judul'       => 'Pengaruh Kualitas Pelayanan dan Harga terhadap Kepuasan Pelanggan Restoran Waralaba',
                'deskripsi'   => 'Menganalisis kontribusi dimensi kualitas pelayanan (SERVQUAL) dan persepsi harga terhadap tingkat kepuasan pelanggan restoran waralaba lokal.',
                'fakultas'    => 'Bisnis & Pemasaran',
                'konsentrasi' => 'Manajemen',
                'metode'      => 'Kuantitatif',
            ],
            [
                'judul'       => 'Perilaku Konsumen dalam Belanja Online: Analisis Faktor Kepercayaan dan Keamanan Transaksi',
                'deskripsi'   => 'Mengkaji bagaimana persepsi kepercayaan dan keamanan memengaruhi frekuensi belanja online konsumen Indonesia.',
                'fakultas'    => 'Bisnis & Pemasaran',
                'konsentrasi' => 'Pemasaran Digital',
                'metode'      => 'Kuantitatif',
            ],
            [
                'judul'       => 'Analisis Sentimen Media Sosial terhadap Reputasi Merek Perusahaan Telekomunikasi',
                'deskripsi'   => 'Memanfaatkan teknik text mining dan analisis sentimen untuk mengukur persepsi publik terhadap merek perusahaan telekomunikasi dari data Twitter/X.',
                'fakultas'    => 'Bisnis & Pemasaran',
                'konsentrasi' => 'Pemasaran Digital',
                'metode'      => 'Mixed Methods',
            ],

            // ─── SOSIAL & KOMUNITAS ───────────────────────────────────────────
            [
                'judul'       => 'Peran Media Sosial dalam Pembentukan Identitas Budaya Generasi Z di Perkotaan',
                'deskripsi'   => 'Mengeksplorasi bagaimana platform media sosial memengaruhi konstruksi identitas budaya dan nilai-nilai yang dianut generasi muda perkotaan.',
                'fakultas'    => 'Sosial & Komunitas',
                'konsentrasi' => 'Sosiologi',
                'metode'      => 'Kualitatif',
            ],
            [
                'judul'       => 'Dampak Program Pemberdayaan Ekonomi terhadap Kemandirian Perempuan di Pedesaan',
                'deskripsi'   => 'Mengevaluasi efektivitas program pelatihan keterampilan dan akses modal usaha dalam meningkatkan kemandirian ekonomi perempuan di desa.',
                'fakultas'    => 'Sosial & Komunitas',
                'konsentrasi' => null,
                'metode'      => 'Mixed Methods',
            ],
            [
                'judul'       => 'Analisis Kohesi Sosial Komunitas Online dalam Gerakan Sosial Digital',
                'deskripsi'   => 'Meneliti bagaimana komunitas daring membentuk solidaritas dan aksi kolektif dalam gerakan sosial berbasis media sosial.',
                'fakultas'    => 'Sosial & Komunitas',
                'konsentrasi' => 'Sosiologi',
                'metode'      => 'Kualitatif',
            ],
            [
                'judul'       => 'Pengaruh Integrasi Sosial terhadap Kesejahteraan Psikologis Mahasiswa Perantau',
                'deskripsi'   => 'Mengukur hubungan antara tingkat integrasi sosial (pertemanan, komunitas, kegiatan kampus) dengan kesejahteraan psikologis mahasiswa yang merantau.',
                'fakultas'    => 'Sosial & Komunitas',
                'konsentrasi' => null,
                'metode'      => 'Kuantitatif',
            ],
            [
                'judul'       => 'Persepsi Masyarakat terhadap Program CSR Perusahaan Tambang di Daerah Penyangga',
                'deskripsi'   => 'Mengkaji bagaimana masyarakat sekitar perusahaan pertambangan mempersepsikan program tanggung jawab sosial perusahaan dan dampaknya terhadap kepercayaan.',
                'fakultas'    => 'Sosial & Komunitas',
                'konsentrasi' => null,
                'metode'      => 'Kualitatif',
            ],
            [
                'judul'       => 'Hubungan Dukungan Sosial dengan Resiliensi Akademik Mahasiswa Berprestasi Rendah',
                'deskripsi'   => 'Menguji peran dukungan sosial dari keluarga, dosen, dan teman sebaya dalam membentuk ketahanan akademik mahasiswa.',
                'fakultas'    => 'Sosial & Komunitas',
                'konsentrasi' => null,
                'metode'      => 'Kuantitatif',
            ],

            // ─── PENDIDIKAN ───────────────────────────────────────────────────
            [
                'judul'       => 'Efektivitas Pembelajaran Berbasis Gamifikasi terhadap Motivasi Belajar Siswa SMA',
                'deskripsi'   => 'Menguji apakah penggunaan elemen gamifikasi (poin, badge, leaderboard) dalam pembelajaran meningkatkan motivasi intrinsik siswa.',
                'fakultas'    => 'Pendidikan',
                'konsentrasi' => null,
                'metode'      => 'Kuantitatif',
            ],
            [
                'judul'       => 'Analisis Kesulitan Belajar Matematika Siswa SD Berbasis Diagnostik Kognitif',
                'deskripsi'   => 'Mengidentifikasi pola kesalahan kognitif siswa sekolah dasar dalam memahami konsep matematika dasar melalui tes diagnostik dan wawancara klinis.',
                'fakultas'    => 'Pendidikan',
                'konsentrasi' => 'Pendidikan Matematika',
                'metode'      => 'Kualitatif',
            ],
            [
                'judul'       => 'Pengaruh Penggunaan Video Pembelajaran YouTube terhadap Hasil Belajar Mahasiswa',
                'deskripsi'   => 'Menganalisis hubungan antara intensitas menonton video pembelajaran di YouTube dengan capaian hasil belajar mahasiswa pada mata kuliah tertentu.',
                'fakultas'    => 'Pendidikan',
                'konsentrasi' => null,
                'metode'      => 'Kuantitatif',
            ],
            [
                'judul'       => 'Implementasi Project-Based Learning dalam Meningkatkan Keterampilan Berpikir Kritis Siswa',
                'deskripsi'   => 'Mengkaji penerapan metode pembelajaran berbasis proyek dan dampaknya terhadap kemampuan berpikir kritis siswa melalui observasi dan penilaian autentik.',
                'fakultas'    => 'Pendidikan',
                'konsentrasi' => null,
                'metode'      => 'Mixed Methods',
            ],
            [
                'judul'       => 'Faktor-Faktor yang Memengaruhi Kesiapan Guru dalam Mengimplementasikan Kurikulum Merdeka',
                'deskripsi'   => 'Menginvestigasi kesiapan guru SMP dalam mengadopsi Kurikulum Merdeka dari aspek pemahaman, kompetensi, dan dukungan institusi.',
                'fakultas'    => 'Pendidikan',
                'konsentrasi' => null,
                'metode'      => 'Mixed Methods',
            ],
            [
                'judul'       => 'Hubungan Literasi Digital dengan Kemampuan Evaluasi Informasi pada Mahasiswa',
                'deskripsi'   => 'Mengukur korelasi antara tingkat literasi digital mahasiswa dengan kemampuan mereka dalam menilai kredibilitas sumber informasi daring.',
                'fakultas'    => 'Pendidikan',
                'konsentrasi' => null,
                'metode'      => 'Kuantitatif',
            ],

            // ─── KESEHATAN ───────────────────────────────────────────────────
            [
                'judul'       => 'Pengaruh Pola Tidur dan Aktivitas Fisik terhadap Tingkat Stres Mahasiswa Tingkat Akhir',
                'deskripsi'   => 'Menganalisis hubungan kualitas dan durasi tidur serta frekuensi olahraga dengan tingkat stres yang dialami mahasiswa semester akhir.',
                'fakultas'    => 'Kesehatan',
                'konsentrasi' => null,
                'metode'      => 'Kuantitatif',
            ],
            [
                'judul'       => 'Analisis Faktor Risiko Burnout pada Tenaga Kesehatan di Rumah Sakit Daerah',
                'deskripsi'   => 'Mengidentifikasi faktor organisasi, beban kerja, dan dukungan sosial yang berkontribusi terhadap sindrom burnout perawat dan dokter di RS daerah.',
                'fakultas'    => 'Kesehatan',
                'konsentrasi' => null,
                'metode'      => 'Mixed Methods',
            ],
            [
                'judul'       => 'Hubungan Konsumsi Makanan Cepat Saji dengan Indeks Massa Tubuh Remaja Perkotaan',
                'deskripsi'   => 'Menguji korelasi frekuensi konsumsi fast food dengan status gizi (IMT) remaja usia 15–18 tahun di kawasan perkotaan.',
                'fakultas'    => 'Kesehatan',
                'konsentrasi' => null,
                'metode'      => 'Kuantitatif',
            ],
            [
                'judul'       => 'Pengalaman Pasien dalam Mengakses Layanan Telemedicine Pasca Pandemi',
                'deskripsi'   => 'Mengeksplorasi persepsi, hambatan, dan kepuasan pasien dalam memanfaatkan layanan konsultasi medis jarak jauh (telemedicine) secara kualitatif.',
                'fakultas'    => 'Kesehatan',
                'konsentrasi' => null,
                'metode'      => 'Kualitatif',
            ],
            [
                'judul'       => 'Efektivitas Edukasi Kesehatan Berbasis Media Sosial dalam Meningkatkan Kesadaran Hipertensi',
                'deskripsi'   => 'Mengevaluasi dampak kampanye edukasi kesehatan melalui Instagram dan TikTok terhadap pengetahuan dan perilaku pencegahan hipertensi masyarakat.',
                'fakultas'    => 'Kesehatan',
                'konsentrasi' => null,
                'metode'      => 'Mixed Methods',
            ],
            [
                'judul'       => 'Analisis Perilaku Pencarian Informasi Kesehatan Online pada Ibu Hamil',
                'deskripsi'   => 'Mengkaji pola pencarian informasi kesehatan kehamilan secara daring, sumber yang digunakan, dan pengaruhnya terhadap keputusan perawatan prenatal.',
                'fakultas'    => 'Kesehatan',
                'konsentrasi' => null,
                'metode'      => 'Kualitatif',
            ],

            // ─── KEUANGAN ────────────────────────────────────────────────────
            [
                'judul'       => 'Pengaruh Literasi Keuangan terhadap Perilaku Investasi Mahasiswa di Pasar Modal',
                'deskripsi'   => 'Menguji apakah tingkat literasi keuangan mahasiswa memengaruhi keputusan dan konsistensi mereka dalam berinvestasi di saham dan reksa dana.',
                'fakultas'    => 'Keuangan',
                'konsentrasi' => 'Keuangan',
                'metode'      => 'Kuantitatif',
            ],
            [
                'judul'       => 'Analisis Faktor yang Memengaruhi Penggunaan Paylater oleh Generasi Milenial',
                'deskripsi'   => 'Mengidentifikasi faktor psikologis, sosial, dan finansial yang mendorong atau menghambat penggunaan fitur beli sekarang bayar nanti di kalangan milenial.',
                'fakultas'    => 'Keuangan',
                'konsentrasi' => null,
                'metode'      => 'Kuantitatif',
            ],
            [
                'judul'       => 'Pengaruh Profitabilitas, Leverage, dan Ukuran Perusahaan terhadap Nilai Perusahaan',
                'deskripsi'   => 'Menganalisis dampak rasio keuangan utama terhadap nilai perusahaan yang terdaftar di BEI menggunakan data laporan keuangan tahunan.',
                'fakultas'    => 'Keuangan',
                'konsentrasi' => 'Akuntansi',
                'metode'      => 'Kuantitatif',
            ],
            [
                'judul'       => 'Analisis Determinan Tax Avoidance pada Perusahaan Manufaktur Terdaftar di BEI',
                'deskripsi'   => 'Menginvestigasi pengaruh tata kelola perusahaan, profitabilitas, dan leverage terhadap praktik penghindaran pajak perusahaan manufaktur.',
                'fakultas'    => 'Keuangan',
                'konsentrasi' => 'Akuntansi',
                'metode'      => 'Kuantitatif',
            ],
            [
                'judul'       => 'Perilaku Keuangan UMKM: Pengelolaan Arus Kas dan Akses Permodalan',
                'deskripsi'   => 'Mengeksplorasi praktik manajemen keuangan pelaku UMKM, tantangan pengelolaan arus kas, dan strategi akses permodalan formal maupun informal.',
                'fakultas'    => 'Keuangan',
                'konsentrasi' => null,
                'metode'      => 'Kualitatif',
            ],
            [
                'judul'       => 'Pengaruh BI Rate dan Inflasi terhadap Return Saham Sektor Perbankan',
                'deskripsi'   => 'Menganalisis hubungan antara kebijakan suku bunga Bank Indonesia dan tingkat inflasi dengan return saham perbankan yang listed di BEI.',
                'fakultas'    => 'Keuangan',
                'konsentrasi' => 'Keuangan',
                'metode'      => 'Kuantitatif',
            ],

            // ─── LINGKUNGAN ──────────────────────────────────────────────────
            [
                'judul'       => 'Analisis Perilaku Pro-Lingkungan Konsumen dalam Keputusan Membeli Produk Ramah Lingkungan',
                'deskripsi'   => 'Mengkaji faktor nilai, norma, dan kesadaran lingkungan yang mendorong konsumen memilih produk berlabel ramah lingkungan dibanding produk konvensional.',
                'fakultas'    => 'Lingkungan',
                'konsentrasi' => null,
                'metode'      => 'Kuantitatif',
            ],
            [
                'judul'       => 'Efektivitas Program Bank Sampah dalam Mengurangi Volume Sampah Rumah Tangga',
                'deskripsi'   => 'Mengevaluasi dampak nyata program bank sampah terhadap pengurangan volume sampah dan perubahan perilaku pengelolaan sampah masyarakat.',
                'fakultas'    => 'Lingkungan',
                'konsentrasi' => null,
                'metode'      => 'Mixed Methods',
            ],
            [
                'judul'       => 'Persepsi dan Partisipasi Masyarakat dalam Program Penghijauan Kota',
                'deskripsi'   => 'Meneliti tingkat kesadaran, sikap, dan keterlibatan aktif warga dalam program penanaman pohon dan ruang terbuka hijau perkotaan.',
                'fakultas'    => 'Lingkungan',
                'konsentrasi' => null,
                'metode'      => 'Mixed Methods',
            ],
            [
                'judul'       => 'Analisis Dampak Pembangunan Perkebunan Kelapa Sawit terhadap Keanekaragaman Hayati Lokal',
                'deskripsi'   => 'Mengkaji perubahan biodiversitas flora dan fauna di kawasan yang berubah menjadi lahan perkebunan kelapa sawit menggunakan data sekunder dan observasi.',
                'fakultas'    => 'Lingkungan',
                'konsentrasi' => null,
                'metode'      => 'Kualitatif',
            ],
            [
                'judul'       => 'Hubungan Pengetahuan Lingkungan dan Green Purchase Intention pada Mahasiswa',
                'deskripsi'   => 'Menguji apakah tingkat pengetahuan tentang isu lingkungan berkorelasi dengan niat beli produk ramah lingkungan di kalangan mahasiswa.',
                'fakultas'    => 'Lingkungan',
                'konsentrasi' => null,
                'metode'      => 'Kuantitatif',
            ],

            // ─── HUKUM & KEBIJAKAN ────────────────────────────────────────────
            [
                'judul'       => 'Analisis Implementasi Kebijakan Perlindungan Data Pribadi di Platform Digital',
                'deskripsi'   => 'Mengkaji sejauh mana platform digital di Indonesia telah memenuhi ketentuan UU Perlindungan Data Pribadi dalam mengelola data pengguna.',
                'fakultas'    => 'Hukum & Kebijakan',
                'konsentrasi' => 'Hukum',
                'metode'      => 'Kualitatif',
            ],
            [
                'judul'       => 'Efektivitas Regulasi Fintech Peer-to-Peer Lending dalam Melindungi Konsumen',
                'deskripsi'   => 'Mengevaluasi apakah regulasi OJK terhadap platform pinjaman online P2P sudah memadai dalam melindungi hak-hak peminjam dari praktik tidak adil.',
                'fakultas'    => 'Hukum & Kebijakan',
                'konsentrasi' => null,
                'metode'      => 'Kualitatif',
            ],
            [
                'judul'       => 'Persepsi Pelaku UMKM terhadap Kemudahan Perizinan Berusaha Pasca OSS',
                'deskripsi'   => 'Mengukur tingkat kepuasan dan persepsi kemudahan pelaku UMKM dalam mengakses perizinan usaha melalui sistem Online Single Submission.',
                'fakultas'    => 'Hukum & Kebijakan',
                'konsentrasi' => null,
                'metode'      => 'Kuantitatif',
            ],
            [
                'judul'       => 'Analisis Kebijakan Digitalisasi Pelayanan Publik terhadap Kepuasan Masyarakat',
                'deskripsi'   => 'Mengevaluasi dampak transformasi digital layanan publik pemerintah daerah terhadap kepuasan, efisiensi, dan inklusivitas layanan kepada masyarakat.',
                'fakultas'    => 'Hukum & Kebijakan',
                'konsentrasi' => 'Administrasi Publik',
                'metode'      => 'Mixed Methods',
            ],
            [
                'judul'       => 'Implementasi Kebijakan Sekolah Ramah Anak dalam Perspektif Pemenuhan Hak Anak',
                'deskripsi'   => 'Mengkaji pelaksanaan kebijakan Sekolah Ramah Anak di tingkat SD dan hambatan yang dihadapi dalam pemenuhan hak-hak anak di lingkungan sekolah.',
                'fakultas'    => 'Hukum & Kebijakan',
                'konsentrasi' => null,
                'metode'      => 'Kualitatif',
            ],

            // ─── LINTAS BIDANG / UNIVERSAL ───────────────────────────────────
            [
                'judul'       => 'Pengaruh Work-Life Balance terhadap Produktivitas Kerja Karyawan Generasi Milenial',
                'deskripsi'   => 'Menganalisis hubungan antara keseimbangan kehidupan-kerja dengan produktivitas karyawan milenial yang bekerja di perusahaan teknologi.',
                'fakultas'    => null,
                'konsentrasi' => null,
                'metode'      => 'Kuantitatif',
            ],
            [
                'judul'       => 'Dampak Remote Work terhadap Kolaborasi Tim dan Budaya Organisasi',
                'deskripsi'   => 'Mengeksplorasi bagaimana transisi ke kerja jarak jauh memengaruhi dinamika tim, komunikasi, dan nilai-nilai budaya organisasi.',
                'fakultas'    => null,
                'konsentrasi' => null,
                'metode'      => 'Kualitatif',
            ],
            [
                'judul'       => 'Hubungan Kecerdasan Emosional dengan Kemampuan Kepemimpinan pada Mahasiswa Organisasi',
                'deskripsi'   => 'Menguji apakah tingkat kecerdasan emosional berkorelasi positif dengan efektivitas kepemimpinan mahasiswa yang aktif di organisasi kemahasiswaan.',
                'fakultas'    => null,
                'konsentrasi' => null,
                'metode'      => 'Kuantitatif',
            ],
            [
                'judul'       => 'Analisis Faktor Keberhasilan Startup Digital di Indonesia: Perspektif Founder',
                'deskripsi'   => 'Mengidentifikasi faktor kritis yang menentukan keberhasilan atau kegagalan startup digital melalui wawancara mendalam dengan para pendiri perusahaan.',
                'fakultas'    => null,
                'konsentrasi' => null,
                'metode'      => 'Kualitatif',
            ],
            [
                'judul'       => 'Pengaruh Motivasi Berwirausaha terhadap Intensi Mahasiswa Mendirikan Usaha',
                'deskripsi'   => 'Mengukur kontribusi motivasi internal, eksternal, dan faktor lingkungan terhadap niat berwirausaha mahasiswa tingkat akhir.',
                'fakultas'    => null,
                'konsentrasi' => null,
                'metode'      => 'Kuantitatif',
            ],
            [
                'judul'       => 'Pengalaman Mahasiswa Pertama Kali Memasuki Dunia Kerja: Studi Fenomenologi',
                'deskripsi'   => 'Mengeksplorasi pengalaman transisi, tantangan, dan pembelajaran mahasiswa fresh graduate dalam menghadapi lingkungan profesional pertama kali.',
                'fakultas'    => null,
                'konsentrasi' => null,
                'metode'      => 'Kualitatif',
            ],
            [
                'judul'       => 'Pengaruh Self-Efficacy dan Prokrastinasi terhadap Kecepatan Penyelesaian Skripsi',
                'deskripsi'   => 'Menganalisis bagaimana keyakinan diri dan kebiasaan menunda pekerjaan berhubungan dengan lama waktu yang dibutuhkan mahasiswa menyelesaikan tugas akhir.',
                'fakultas'    => null,
                'konsentrasi' => null,
                'metode'      => 'Kuantitatif',
            ],
            [
                'judul'       => 'Pemanfaatan AI Generatif (ChatGPT) oleh Mahasiswa: Antara Produktivitas dan Integritas Akademik',
                'deskripsi'   => 'Mengkaji pola penggunaan AI generatif dalam tugas akademik mahasiswa, manfaat yang dirasakan, dan persepsi terhadap batasan etika penggunaannya.',
                'fakultas'    => null,
                'konsentrasi' => null,
                'metode'      => 'Mixed Methods',
            ],
        ];

        foreach ($ideas as $idea) {
            RisetIdea::create(array_merge($idea, ['is_active' => true]));
        }

        $this->command->info('✓ ' . count($ideas) . ' ide riset berhasil dibuat.');
    }
}
