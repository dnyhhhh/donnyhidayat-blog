<?php

namespace Database\Seeders;

use App\Models\Materi;
use Illuminate\Database\Seeder;

class MateriSeeder extends Seeder
{
    public function run(): void
    {
        Materi::updateOrCreate(
            ['id' => 1],
            [
                'title'        => 'English Unlocked — Materi Interaktif',
                'description'  => 'Belajar bahasa Inggris secara interaktif langsung di browser. Tersedia 5 tema dan 20 unit latihan yang bisa kamu kerjakan seperti mengisi buku latihan, tapi lebih seru dan bisa langsung dicek. Berlangganan sekali, akses semua modul selamanya.',
                'price'        => 12000,
                'is_published' => true,
            ]
        );
    }
}
