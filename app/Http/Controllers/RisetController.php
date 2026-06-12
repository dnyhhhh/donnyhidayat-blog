<?php
namespace App\Http\Controllers;

use App\Models\RisetIdea;
use Illuminate\Http\Request;

class RisetController extends Controller
{
    public function index()
    {
        return view('public.riset');
    }

    public function generate(Request $request)
    {
        $request->validate([
            'nama'         => 'required|string|max:100',
            'universitas'  => 'required|string|max:150',
            'fakultas'     => 'required|string|max:150',
            'prodi'        => 'required|string|max:150',
            'konsentrasi'  => 'nullable|string|max:150',
            'semester'     => 'required|integer|min:1|max:14',
            'metode'       => 'required|in:Kuantitatif,Kualitatif,Mixed Methods',
            'minat'        => 'nullable|string|max:300',
        ]);

        $profile = $request->only(['nama', 'universitas', 'fakultas', 'prodi', 'konsentrasi', 'semester', 'metode', 'minat']);

        $ideas = RisetIdea::active()->get();

        // Beri skor tiap ide berdasarkan kecocokan profil
        $scored = $ideas->map(function ($idea) use ($profile) {
            return ['idea' => $idea, 'score' => $idea->matchScore($profile)];
        })->sortByDesc('score')->take(8)->values();

        // Tambah keyword minat sebagai bonus filter
        if ($profile['minat']) {
            $keywords = array_map('trim', explode(',', strtolower($profile['minat'])));
            $scored = $scored->map(function ($item) use ($keywords) {
                foreach ($keywords as $kw) {
                    if ($kw && (
                        str_contains(strtolower($item['idea']->judul), $kw) ||
                        str_contains(strtolower($item['idea']->deskripsi), $kw)
                    )) {
                        $item['score'] += 2;
                    }
                }
                return $item;
            })->sortByDesc('score')->values();
        }

        $results = $scored->pluck('idea');

        return view('public.riset-hasil', compact('results', 'profile'));
    }
}
