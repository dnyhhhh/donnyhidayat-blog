<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Ebook;
use App\Models\Order;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublicController extends Controller
{
    public function home()
    {
        return view('public.home', [
            'ebooks'  => Ebook::where('is_published', true)->latest()->take(3)->get(),
            'courses' => Course::where('is_published', true)->latest()->take(3)->get(),
            'posts'   => Post::where('is_published', true)->latest()->take(3)->get(),
        ]);
    }

    public function ebookIndex()
    {
        $ebooks = Ebook::where('is_published', true)->latest()->paginate(9);
        return view('public.ebook-index', compact('ebooks'));
    }

    public function ebookShow(string $slug)
    {
        $ebook = Ebook::where('slug', $slug)->where('is_published', true)->firstOrFail();
        $owned = auth()->check() && auth()->user()->hasAccess('ebook', $ebook->id);
        return view('public.ebook-show', compact('ebook', 'owned'));
    }

    public function courseIndex()
    {
        $courses = Course::where('is_published', true)->latest()->paginate(9);
        return view('public.course-index', compact('courses'));
    }

    public function courseShow(string $slug)
    {
        $course = Course::with('lessons')->where('slug', $slug)->where('is_published', true)->firstOrFail();
        $owned = auth()->check() && auth()->user()->hasAccess('course', $course->id);
        return view('public.course-show', compact('course', 'owned'));
    }

    public function blogIndex()
    {
        $posts = Post::where('is_published', true)->latest('published_at')->paginate(9);
        return view('public.blog-index', compact('posts'));
    }

    public function blogShow(string $slug)
    {
        $post = Post::where('slug', $slug)->where('is_published', true)->firstOrFail();
        return view('public.blog-show', compact('post'));
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'type' => 'required|in:ebook,course',
            'id'   => 'required|integer',
        ]);

        $model = $request->type === 'ebook'
            ? Ebook::findOrFail($request->id)
            : Course::findOrFail($request->id);

        if (auth()->user()->hasAccess($request->type, $model->id)) {
            return back()->with('info', 'Anda sudah memiliki akses ke produk ini.');
        }

        $order = Order::create([
            'user_id'        => auth()->id(),
            'invoice_number' => 'INV-' . strtoupper(uniqid()),
            'orderable_type' => $request->type,
            'orderable_id'   => $model->id,
            'amount'         => $model->price,
            'status'         => 'pending',
        ]);

        return redirect("/member/order/{$order->id}");
    }

    public function uploadProof(Request $request, Order $order)
    {
        abort_unless($order->user_id === auth()->id(), 403);
        abort_unless($order->status === 'pending', 403);

        $request->validate(['proof' => 'required|image|max:2048']);
        $path = $request->file('proof')->store('payment_proofs', 'public');
        $order->update(['payment_proof' => $path]);

        return back()->with('success', 'Bukti pembayaran berhasil diunggah. Menunggu konfirmasi admin.');
    }

    public function downloadEbook(Ebook $ebook)
    {
        abort_unless(auth()->user()->hasAccess('ebook', $ebook->id), 403);
        return Storage::disk('public')->download($ebook->file_path, $ebook->title . '.pdf');
    }
}
