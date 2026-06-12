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
            'prodi'       => 'required|string|max:150',
            'konsentrasi' => 'nullable|string|max:150',
            'semester'    => 'required|in:5,7,10',
            'bidang'      => 'required|array|min:1',
            'bidang.*'    => 'string|max:100',
            'metode'      => 'required|in:Kuantitatif,Kualitatif,Mixed Methods,Belum tahu',
            'akses'       => 'required|in:perusahaan,kuesioner,sekunder,belum',
        ]);

        $profile = [
            'prodi'       => $request->prodi,
            'konsentrasi' => $request->konsentrasi,
            'semester'    => $request->semester,
            'bidang'      => $request->bidang,
            'metode'      => $request->metode,
            'akses'       => $request->akses,
        ];

        $ideas = RisetIdea::active()->get();

        $scored = $ideas->map(function ($idea) use ($profile) {
            return ['idea' => $idea, 'score' => $idea->matchScore($profile)];
        })->sortByDesc('score')->take(8)->values();

        // Bonus score dari kata kunci bidang minat
        $keywords = array_map('strtolower', $profile['bidang']);
        $scored = $scored->map(function ($item) use ($keywords) {
            foreach ($keywords as $kw) {
                if ($kw && (
                    str_contains(strtolower($item['idea']->judul), $kw) ||
                    str_contains(strtolower($item['idea']->deskripsi), $kw) ||
                    str_contains(strtolower($item['idea']->konsentrasi ?? ''), $kw)
                )) {
                    $item['score'] += 2;
                }
            }
            return $item;
        })->sortByDesc('score')->values();

        $results = $scored->pluck('idea');

        return view('public.riset-hasil', compact('results', 'profile'));
    }
}
