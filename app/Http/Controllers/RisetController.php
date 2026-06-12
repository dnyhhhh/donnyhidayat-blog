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

        if (!auth()->check()) {
            session(['riset_pending' => $request->only(['prodi', 'konsentrasi', 'semester', 'bidang', 'metode', 'akses'])]);
            return redirect()->guest('/login');
        }

        $profile = $request->only(['prodi', 'konsentrasi', 'semester', 'bidang', 'metode', 'akses']);

        return view('public.riset-hasil', [
            'results' => $this->findMatches($profile),
            'profile' => $profile,
        ]);
    }

    public function resume()
    {
        $profile = session()->pull('riset_pending');

        if (!$profile) {
            return redirect('/riset');
        }

        return view('public.riset-hasil', [
            'results' => $this->findMatches($profile),
            'profile' => $profile,
        ]);
    }

    private function findMatches(array $profile)
    {
        $ideas = RisetIdea::active()->get();

        $scored = $ideas->map(function ($idea) use ($profile) {
            return ['idea' => $idea, 'score' => $idea->matchScore($profile)];
        })->sortByDesc('score')->take(8)->values();

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

        return $scored->pluck('idea');
    }
}
