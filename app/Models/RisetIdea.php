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

        if ($this->fakultas && str_contains(
            strtolower($profile['fakultas'] ?? ''),
            strtolower($this->fakultas)
        )) $score += 3;

        if ($this->konsentrasi && str_contains(
            strtolower($profile['konsentrasi'] ?? ''),
            strtolower($this->konsentrasi)
        )) $score += 5;

        if ($this->metode && strtolower($this->metode) === strtolower($profile['metode'] ?? '')) {
            $score += 2;
        }

        // Idea tanpa filter cocok untuk semua
        if (!$this->fakultas && !$this->konsentrasi) $score += 1;

        return $score;
    }
}
