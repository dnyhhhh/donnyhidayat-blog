<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseLesson;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('category')->withCount('lessons')->latest()->paginate(15);
        return view('admin.course-index', compact('courses'));
    }

    public function create()
    {
        $categories = Category::where('type', 'course')->get();
        return view('admin.course-form', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'required|string',
            'price'        => 'required|numeric|min:0',
            'category_id'  => 'nullable|exists:categories,id',
            'cover_image'  => 'nullable|image|max:2048',
            'is_published' => 'boolean',
        ]);

        $data['slug'] = Str::slug($data['title']) . '-' . Str::random(4);

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        $course = Course::create($data);
        return redirect("/admin/kelas/{$course->id}/edit")->with('success', 'Kelas berhasil dibuat. Sekarang tambahkan pelajaran.');
    }

    public function edit(Course $kela)
    {
        $kela->load('lessons');
        $categories = Category::where('type', 'course')->get();
        return view('admin.course-form', ['course' => $kela, 'categories' => $categories]);
    }

    public function update(Request $request, Course $kela)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'required|string',
            'price'        => 'required|numeric|min:0',
            'category_id'  => 'nullable|exists:categories,id',
            'cover_image'  => 'nullable|image|max:2048',
            'is_published' => 'boolean',
        ]);

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        $kela->update($data);
        return redirect("/admin/kelas/{$kela->id}/edit")->with('success', 'Kelas berhasil diperbarui.');
    }

    public function destroy(Course $kela)
    {
        $kela->delete();
        return redirect('/admin/kelas')->with('success', 'Kelas dihapus.');
    }

    public function show(Course $kela) { return redirect('/admin/kelas'); }

    // --- Lesson actions ---

    public function storeLesson(Request $request, Course $kela)
    {
        $data = $request->validate([
            'title'      => 'required|string|max:255',
            'video_url'  => 'nullable|url',
            'content'    => 'nullable|string',
            'is_preview' => 'boolean',
        ]);

        $data['order'] = $kela->lessons()->max('order') + 1;
        $kela->lessons()->create($data);
        $kela->update(['total_lessons' => $kela->lessons()->count()]);

        return back()->with('success', 'Pelajaran ditambahkan.');
    }

    public function updateLesson(Request $request, Course $kela, CourseLesson $lesson)
    {
        abort_unless($lesson->course_id === $kela->id, 403);

        $data = $request->validate([
            'title'      => 'required|string|max:255',
            'video_url'  => 'nullable|url',
            'content'    => 'nullable|string',
            'is_preview' => 'boolean',
        ]);

        $lesson->update($data);
        return back()->with('success', 'Pelajaran diperbarui.');
    }

    public function destroyLesson(Course $kela, CourseLesson $lesson)
    {
        abort_unless($lesson->course_id === $kela->id, 403);
        $lesson->delete();
        $kela->update(['total_lessons' => $kela->lessons()->count()]);
        return back()->with('success', 'Pelajaran dihapus.');
    }
}
