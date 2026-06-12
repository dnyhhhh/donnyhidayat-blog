<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->latest()->paginate(15);
        return view('admin.blog-index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::where('type', 'blog')->get();
        return view('admin.blog-form', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'excerpt'      => 'nullable|string',
            'body'         => 'required|string',
            'category_id'  => 'nullable|exists:categories,id',
            'cover_image'  => 'nullable|image|max:2048',
            'is_published' => 'boolean',
        ]);

        $data['slug'] = Str::slug($data['title']) . '-' . Str::random(4);
        if ($data['is_published'] ?? false) {
            $data['published_at'] = now();
        }
        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('blog-covers', 'public');
        }

        Post::create($data);
        return redirect('/admin/blog')->with('success', 'Artikel berhasil diterbitkan.');
    }

    public function edit(Post $blog)
    {
        $categories = Category::where('type', 'blog')->get();
        return view('admin.blog-form', ['post' => $blog, 'categories' => $categories]);
    }

    public function update(Request $request, Post $blog)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'excerpt'      => 'nullable|string',
            'body'         => 'required|string',
            'category_id'  => 'nullable|exists:categories,id',
            'cover_image'  => 'nullable|image|max:2048',
            'is_published' => 'boolean',
        ]);

        if (($data['is_published'] ?? false) && !$blog->published_at) {
            $data['published_at'] = now();
        }
        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('blog-covers', 'public');
        }

        $blog->update($data);
        return redirect('/admin/blog')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Post $blog)
    {
        $blog->delete();
        return back()->with('success', 'Artikel dihapus.');
    }

    public function show(Post $blog) { return redirect('/admin/blog'); }
}
