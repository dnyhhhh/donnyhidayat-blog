<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class TemplateController extends Controller
{
    public function index()
    {
        $templates = Template::latest()->paginate(20);
        return view('admin.template-index', compact('templates'));
    }

    public function create()
    {
        return view('admin.template-form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'tech_stack'  => 'nullable|string|max:255',
            'preview_url' => 'nullable|url|max:500',
            'price'       => 'required|integer|min:0',
            'cover_image' => 'nullable|image|max:2048',
            'file'        => 'nullable|file|max:51200',
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['is_published'] = $request->boolean('is_published');

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('templates/covers', 'public');
        }
        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('templates/files', 'public');
        }

        Template::create($data);
        return redirect('/admin/template')->with('success', 'Template berhasil ditambahkan.');
    }

    public function edit(Template $template)
    {
        return view('admin.template-form', compact('template'));
    }

    public function update(Request $request, Template $template)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'tech_stack'  => 'nullable|string|max:255',
            'preview_url' => 'nullable|url|max:500',
            'price'       => 'required|integer|min:0',
            'cover_image' => 'nullable|image|max:2048',
            'file'        => 'nullable|file|max:51200',
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['is_published'] = $request->boolean('is_published');

        if ($request->hasFile('cover_image')) {
            if ($template->cover_image) Storage::disk('public')->delete($template->cover_image);
            $data['cover_image'] = $request->file('cover_image')->store('templates/covers', 'public');
        }
        if ($request->hasFile('file')) {
            if ($template->file_path) Storage::disk('public')->delete($template->file_path);
            $data['file_path'] = $request->file('file')->store('templates/files', 'public');
        }

        $template->update($data);
        return redirect('/admin/template')->with('success', 'Template berhasil diupdate.');
    }

    public function destroy(Template $template)
    {
        if ($template->cover_image) Storage::disk('public')->delete($template->cover_image);
        if ($template->file_path) Storage::disk('public')->delete($template->file_path);
        $template->delete();
        return back()->with('success', 'Template dihapus.');
    }
}
