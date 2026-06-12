<x-layouts.app title="Ide Riset Skripsi — donnyhidayat.blog">
<div class="max-w-2xl mx-auto px-4 py-12">

    {{-- Hero --}}
    <div style="text-align:center;margin-bottom:40px;">
        <span style="background:#eff6ff;color:#1d4ed8;font-size:12px;font-weight:700;padding:4px 16px;border-radius:20px;letter-spacing:1px;">IDE RISET SKRIPSI</span>
        <h1 style="font-size:2rem;font-weight:800;color:#111827;margin:16px 0 10px;line-height:1.2;">Temukan Topik Skripsi<br>yang Tepat Untukmu</h1>
        <p style="color:#6b7280;font-size:15px;max-width:480px;margin:0 auto;">Isi profil akademikmu, sistem akan mencarikan ide riset yang sesuai dengan bidang dan minatmu.</p>
    </div>

    {{-- Form --}}
    <div style="background:#fff;border:1px solid #e5e7eb;border-radius:20px;padding:36px;">
        @if($errors->any())
            <div style="background:#fef2f2;color:#dc2626;font-size:13px;border-radius:10px;padding:12px 16px;margin-bottom:20px;">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="/riset/generate">
            @csrf

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px;">
                <div style="grid-column:1/-1;">
                    <label style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">Nama Lengkap</label>
                    <input type="text" name="nama" value="{{ old('nama') }}" required placeholder="Nama kamu"
                           style="width:100%;border:1.5px solid #e5e7eb;border-radius:10px;padding:10px 14px;font-size:14px;outline:none;box-sizing:border-box;"
                           onfocus="this.style.borderColor='#1d4ed8'" onblur="this.style.borderColor='#e5e7eb'">
                </div>

                <div style="grid-column:1/-1;">
                    <label style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">Universitas / Perguruan Tinggi</label>
                    <input type="text" name="universitas" value="{{ old('universitas') }}" required placeholder="Universitas kamu"
                           style="width:100%;border:1.5px solid #e5e7eb;border-radius:10px;padding:10px 14px;font-size:14px;outline:none;box-sizing:border-box;"
                           onfocus="this.style.borderColor='#1d4ed8'" onblur="this.style.borderColor='#e5e7eb'">
                </div>

                <div>
                    <label style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">Fakultas</label>
                    <input type="text" name="fakultas" value="{{ old('fakultas') }}" required placeholder="cth: Ekonomi & Bisnis"
                           style="width:100%;border:1.5px solid #e5e7eb;border-radius:10px;padding:10px 14px;font-size:14px;outline:none;box-sizing:border-box;"
                           onfocus="this.style.borderColor='#1d4ed8'" onblur="this.style.borderColor='#e5e7eb'">
                </div>

                <div>
                    <label style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">Program Studi</label>
                    <input type="text" name="prodi" value="{{ old('prodi') }}" required placeholder="cth: Manajemen"
                           style="width:100%;border:1.5px solid #e5e7eb;border-radius:10px;padding:10px 14px;font-size:14px;outline:none;box-sizing:border-box;"
                           onfocus="this.style.borderColor='#1d4ed8'" onblur="this.style.borderColor='#e5e7eb'">
                </div>

                <div>
                    <label style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">Konsentrasi / Peminatan</label>
                    <input type="text" name="konsentrasi" value="{{ old('konsentrasi') }}" placeholder="cth: Pemasaran Digital"
                           style="width:100%;border:1.5px solid #e5e7eb;border-radius:10px;padding:10px 14px;font-size:14px;outline:none;box-sizing:border-box;"
                           onfocus="this.style.borderColor='#1d4ed8'" onblur="this.style.borderColor='#e5e7eb'">
                </div>

                <div>
                    <label style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">Semester Saat Ini</label>
                    <select name="semester" required
                            style="width:100%;border:1.5px solid #e5e7eb;border-radius:10px;padding:10px 14px;font-size:14px;outline:none;background:#fff;box-sizing:border-box;">
                        <option value="">— Pilih —</option>
                        @for($i = 5; $i <= 14; $i++)
                            <option value="{{ $i }}" {{ old('semester') == $i ? 'selected' : '' }}>Semester {{ $i }}</option>
                        @endfor
                    </select>
                </div>

                <div style="grid-column:1/-1;">
                    <label style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:8px;">Metode Penelitian yang Diminati</label>
                    <div style="display:flex;gap:10px;flex-wrap:wrap;">
                        @foreach(['Kuantitatif','Kualitatif','Mixed Methods'] as $m)
                        <label style="display:flex;align-items:center;gap:8px;background:#f9fafb;border:1.5px solid #e5e7eb;border-radius:10px;padding:10px 16px;cursor:pointer;font-size:13px;font-weight:500;">
                            <input type="radio" name="metode" value="{{ $m }}" {{ old('metode') === $m ? 'checked' : '' }} style="accent-color:#1d4ed8;">
                            {{ $m }}
                        </label>
                        @endforeach
                    </div>
                </div>

                <div style="grid-column:1/-1;">
                    <label style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">Topik / Kata Kunci Minat <span style="font-weight:400;color:#9ca3af;">(opsional)</span></label>
                    <input type="text" name="minat" value="{{ old('minat') }}" placeholder="cth: media sosial, UMKM, kepuasan pelanggan"
                           style="width:100%;border:1.5px solid #e5e7eb;border-radius:10px;padding:10px 14px;font-size:14px;outline:none;box-sizing:border-box;"
                           onfocus="this.style.borderColor='#1d4ed8'" onblur="this.style.borderColor='#e5e7eb'">
                    <p style="font-size:12px;color:#9ca3af;margin-top:5px;">Pisahkan dengan koma jika lebih dari satu</p>
                </div>
            </div>

            <button type="submit"
                    style="width:100%;background:linear-gradient(135deg,#1d4ed8,#2563eb);color:#fff;font-weight:700;font-size:15px;padding:14px;border-radius:12px;border:none;cursor:pointer;margin-top:8px;letter-spacing:.02em;">
                🔍 Temukan Ide Riset Saya
            </button>
        </form>
    </div>

    {{-- Info --}}
    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:12px;margin-top:24px;">
        @foreach([
            ['🎯', 'Dipersonalisasi', 'Ide disesuaikan dengan profil akademikmu'],
            ['⚡', 'Instan', 'Hasil muncul langsung setelah isi form'],
            ['💬', 'Bisa Diskusi', 'Setiap ide bisa langsung didiskusikan via WhatsApp'],
        ] as [$icon, $title, $desc])
        <div style="background:#fff;border:1px solid #e5e7eb;border-radius:14px;padding:16px;text-align:center;">
            <p style="font-size:24px;margin-bottom:6px;">{{ $icon }}</p>
            <p style="font-weight:700;font-size:13px;color:#111827;">{{ $title }}</p>
            <p style="font-size:12px;color:#6b7280;margin-top:4px;">{{ $desc }}</p>
        </div>
        @endforeach
    </div>

</div>
</x-layouts.app>
