<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RisetIdea extends Model
{
    protected $fillable = ['judul', 'deskripsi', 'fakultas', 'konsentrasi', 'metode', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive($query) {
        return $query->where('is_active', true);
    }

    public function matchScore(array $profile): int
    {
        $score = 0;

        // Cocokkan bidang (fakultas di DB = tag bidang ide)
        if ($this->fakultas) {
            $ideaBidang = strtolower($this->fakultas);
            foreach ($profile['bidang'] ?? [] as $b) {
                if (str_contains($ideaBidang, strtolower($b)) || str_contains(strtolower($b), $ideaBidang)) {
                    $score += 3;
                    break;
                }
            }
        }

        // Cocokkan konsentrasi/prodi
        if ($this->konsentrasi) {
            $ideaKons = strtolower($this->konsentrasi);
            if (str_contains(strtolower($profile['konsentrasi'] ?? ''), $ideaKons) ||
                str_contains(strtolower($profile['prodi'] ?? ''), $ideaKons) ||
                str_contains($ideaKons, strtolower($profile['prodi'] ?? ''))) {
                $score += 5;
            }
        }

        // Cocokkan metode
        if ($this->metode && $profile['metode'] !== 'Belum tahu') {
            if (strtolower($this->metode) === strtolower($profile['metode'] ?? '')) {
                $score += 2;
            }
        }

        // Ide universal (tanpa filter spesifik)
        if (!$this->fakultas && !$this->konsentrasi) {
            $score += 1;
        }

        return $score;
    }
}
