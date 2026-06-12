<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Ebook;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EbookController extends Controller
{
    public function index()
    {
        $ebooks = Ebook::with('category')->latest()->paginate(15);
        return view('admin.ebook-index', compact('ebooks'));
    }

    public function create()
    {
        $categories = Category::where('type', 'ebook')->get();
        return view('admin.ebook-form', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'required|string',
            'price'        => 'required|numeric|min:0',
            'category_id'  => 'nullable|exists:categories,id',
            'cover_image'  => 'nullable|image|max:2048',
            'file'         => 'required|mimes:pdf|max:51200',
            'is_published' => 'boolean',
        ]);

        $data['slug'] = Str::slug($data['title']) . '-' . Str::random(4);

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }
        $data['file_path'] = $request->file('file')->store('ebooks', 'public');

        Ebook::create($data);
        return redirect('/admin/ebook')->with('success', 'Ebook berhasil ditambahkan.');
    }

    public function edit(Ebook $ebook)
    {
        $categories = Category::where('type', 'ebook')->get();
        return view('admin.ebook-form', compact('ebook', 'categories'));
    }

    public function update(Request $request, Ebook $ebook)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'required|string',
            'price'        => 'required|numeric|min:0',
            'category_id'  => 'nullable|exists:categories,id',
            'cover_image'  => 'nullable|image|max:2048',
            'file'         => 'nullable|mimes:pdf|max:51200',
            'is_published' => 'boolean',
        ]);

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }
        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('ebooks', 'public');
        }

        $ebook->update($data);
        return redirect('/admin/ebook')->with('success', 'Ebook berhasil diperbarui.');
    }

    public function destroy(Ebook $ebook)
    {
        $ebook->delete();
        return back()->with('success', 'Ebook dihapus.');
    }

    public function show(Ebook $ebook) { return redirect('/admin/ebook'); }
}
