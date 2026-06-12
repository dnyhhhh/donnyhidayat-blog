<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Ebook;
use App\Models\Order;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderPlaced;

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
            'type' => 'required|in:ebook,course,materi,bundle,template',
            'id'   => 'required|integer',
        ]);

        if ($request->type === 'bundle') {
            if (auth()->user()->hasBundle()) {
                return back()->with('info', 'Anda sudah memiliki Paket Bundling.');
            }
            $order = Order::create([
                'user_id'        => auth()->id(),
                'invoice_number' => 'INV-' . strtoupper(uniqid()),
                'orderable_type' => 'bundle',
                'orderable_id'   => 1,
                'amount'         => 297000,
                'status'         => 'pending',
            ]);
            Mail::to($order->user->email)->send(new OrderPlaced($order));
            return redirect("/member/order/{$order->id}");
        }

        $model = match($request->type) {
            'ebook'  => Ebook::findOrFail($request->id),
            'course' => Course::findOrFail($request->id),
            'materi'    => \App\Models\Materi::findOrFail($request->id),
            'template'  => \App\Models\Template::findOrFail($request->id),
        };

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

        Mail::to($order->user->email)->send(new OrderPlaced($order));

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

    public function bundling()
    {
        $owned = auth()->check() && auth()->user()->hasBundle();
        $ebookCount  = \App\Models\Ebook::where('is_published', true)->count();
        $courseCount = \App\Models\Course::where('is_published', true)->count();
        return view('public.bundling', compact('owned', 'ebookCount', 'courseCount'));
    }

    public function templateIndex()
    {
        $templates = \App\Models\Template::where('is_published', true)->latest()->paginate(9);
        return view('public.template-index', compact('templates'));
    }

    public function templateShow(string $slug)
    {
        $template = \App\Models\Template::where('slug', $slug)->where('is_published', true)->firstOrFail();
        $owned = auth()->check() && auth()->user()->hasAccess('template', $template->id);
        return view('public.template-show', compact('template', 'owned'));
    }

    public function downloadTemplate(\App\Models\Template $template)
    {
        abort_unless(auth()->user()->hasAccess('template', $template->id), 403);
        return Storage::disk('public')->download($template->file_path, $template->title . '.zip');
    }

    public function materiIndex()
    {
        return view('public.materi-index');
    }

    public function materiDetail(string $slug)
    {
        $materi = \App\Models\Materi::findOrFail(1);
        $owned  = auth()->check() && auth()->user()->hasAccess('materi', 1);
        return view('public.materi-detail', compact('materi', 'owned'));
    }

    public function materiModul(int $modul)
    {
        abort_unless(auth()->check() && auth()->user()->hasAccess('materi', 1), 403);
        return view("public.materi-modul-{$modul}");
    }

    public function tentang()
    {
        return view('public.tentang');
    }

    public function downloadEbook(Ebook $ebook)
    {
        abort_unless(auth()->user()->hasAccess('ebook', $ebook->id), 403);
        return Storage::disk('public')->download($ebook->file_path, $ebook->title . '.pdf');
    }
}
