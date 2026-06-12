<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RisetIdea;
use Illuminate\Http\Request;

class RisetIdeaController extends Controller
{
    public function index()
    {
        $ideas = RisetIdea::latest()->paginate(20);
        return view('admin.riset-index', compact('ideas'));
    }

    public function create()
    {
        return view('admin.riset-form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul'        => 'required|string|max:255',
            'deskripsi'    => 'required|string',
            'fakultas'     => 'nullable|string|max:150',
            'konsentrasi'  => 'nullable|string|max:150',
            'metode'       => 'nullable|in:Kuantitatif,Kualitatif,Mixed Methods',
        ]);
        $data['is_active'] = $request->boolean('is_active');
        RisetIdea::create($data);
        return redirect('/admin/riset')->with('success', 'Ide riset berhasil ditambahkan.');
    }

    public function edit(RisetIdea $riset)
    {
        return view('admin.riset-form', ['idea' => $riset]);
    }

    public function update(Request $request, RisetIdea $riset)
    {
        $data = $request->validate([
            'judul'        => 'required|string|max:255',
            'deskripsi'    => 'required|string',
            'fakultas'     => 'nullable|string|max:150',
            'konsentrasi'  => 'nullable|string|max:150',
            'metode'       => 'nullable|in:Kuantitatif,Kualitatif,Mixed Methods',
        ]);
        $data['is_active'] = $request->boolean('is_active');
        $riset->update($data);
        return redirect('/admin/riset')->with('success', 'Ide riset diperbarui.');
    }

    public function destroy(RisetIdea $riset)
    {
        $riset->delete();
        return back()->with('success', 'Ide riset dihapus.');
    }
}
