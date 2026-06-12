<x-layouts.app :title="$course->title . ' — donnyhidayat.blog'">

@php
    $lessons = $course->lessons;
    $total   = $lessons->count();
@endphp

<div x-data="coursePlayer({{ $total }}, 'course_{{ $course->id }}')" x-init="init()" x-cloak>

{{-- ── HEADER ── --}}
<div class="bg-blue-900 text-white">
    <div class="max-w-6xl mx-auto px-4 py-6">
        <p class="text-blue-300 text-xs mb-1">
            <a href="/kelas" class="hover:underline">Kelas</a> &rsaquo; {{ $course->category?->name ?? 'Kelas Online' }}
        </p>
        <h1 class="text-xl font-bold">{{ $course->title }}</h1>
        <p class="text-blue-300 text-sm mt-1">donnyhidayat.blog</p>

        @if($owned)
        <div class="mt-4 flex items-center gap-4">
            <div class="flex-1 max-w-sm bg-blue-800 rounded-full h-2.5">
                <div class="bg-green-400 h-2.5 rounded-full transition-all duration-500"
                     :style="'width:' + progressPct() + '%'"></div>
            </div>
            <span class="text-xs text-blue-200 whitespace-nowrap"
                  x-text="progressPct() + '% (' + completedCount() + '/' + {{ $total }} + ' selesai)'"></span>
        </div>
        @endif
    </div>
</div>

{{-- ── BODY ── --}}
<div class="max-w-6xl mx-auto px-4 py-8">
    @if(!$owned && $lessons->where('is_preview', true)->isEmpty())
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-10 text-center">
            <p class="text-4xl mb-4">🔒</p>
            <h2 class="text-xl font-bold text-gray-800 mb-2">Beli kelas untuk akses semua materi</h2>
            <p class="text-gray-500 mb-6">Rp {{ number_format($course->price, 0, ',', '.') }}</p>
            @auth
                <form method="POST" action="/member/checkout">
                    @csrf
                    <input type="hidden" name="type" value="course">
                    <input type="hidden" name="id" value="{{ $course->id }}">
                    <button class="bg-blue-700 text-white font-semibold px-8 py-3 rounded-xl hover:bg-blue-800">Daftar Sekarang</button>
                </form>
            @else
                <a href="/login" class="inline-block bg-blue-700 text-white font-semibold px-8 py-3 rounded-xl hover:bg-blue-800">Masuk untuk Mendaftar</a>
            @endauth
        </div>
    @else
        <div class="flex flex-col lg:flex-row gap-6 items-start">

            {{-- ── SIDEBAR ── --}}
            <aside style="width:100%;max-width:280px;flex-shrink:0;"
                   class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden order-2 lg:order-1">

                <div class="bg-gray-50 px-5 py-4 border-b border-gray-100 flex items-center justify-between">
                    <div>
                        <p class="font-semibold text-gray-800 text-sm">Konten Kelas</p>
                        <p class="text-xs text-gray-400 mt-0.5"
                           x-text="completedCount() + ' / {{ $total }} selesai'"></p>
                    </div>
                    @if($owned)
                    <button @click="resetProgress()"
                            class="text-xs text-red-500 hover:text-red-700 hover:underline">Reset</button>
                    @endif
                </div>

                <ul class="divide-y divide-gray-50" style="max-height:600px;overflow-y:auto;">
                    @foreach($lessons as $i => $lesson)
                        @php $canAccess = $owned || $lesson->is_preview; @endphp
                        <li>
                            <button
                                @if($canAccess) @click="selectLesson({{ $i }})" @endif
                                :class="active === {{ $i }} ? 'bg-blue-50 border-l-4 border-blue-700' : 'border-l-4 border-transparent {{ $canAccess ? 'hover:bg-gray-50' : '' }}'"
                                class="w-full text-left px-4 py-4 flex items-start gap-3 transition-colors {{ !$canAccess ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer' }}">

                                {{-- Ikon status --}}
                                <span class="mt-0.5 flex-shrink-0" style="width:22px;height:22px;display:flex;align-items:center;justify-content:center;">
                                    @if($canAccess)
                                        {{-- Selesai --}}
                                        <span x-show="isCompleted({{ $i }})"
                                              style="width:22px;height:22px;min-width:22px;border-radius:50%;background:#22c55e;color:#fff;font-size:13px;font-weight:700;line-height:22px;text-align:center;display:block;">&#10003;</span>
                                        {{-- Aktif --}}
                                        <span x-show="!isCompleted({{ $i }}) && active === {{ $i }}"
                                              style="width:22px;height:22px;min-width:22px;border-radius:50%;background:#1d4ed8;color:#fff;font-size:9px;line-height:22px;text-align:center;display:block;">&#9654;</span>
                                        {{-- Default --}}
                                        <span x-show="!isCompleted({{ $i }}) && active !== {{ $i }}"
                                              style="width:22px;height:22px;min-width:22px;border-radius:50%;border:2px solid #d1d5db;color:#9ca3af;font-size:11px;font-weight:600;line-height:18px;text-align:center;display:block;">{{ $i + 1 }}</span>
                                    @else
                                        {{-- Terkunci --}}
                                        <span class="w-6 h-6 flex items-center justify-center flex-shrink-0">
                                            <i class="fa-solid fa-lock text-gray-400" style="font-size:13px;"></i>
                                        </span>
                                    @endif
                                </span>

                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium leading-snug"
                                       :class="isCompleted({{ $i }}) ? 'text-gray-400 line-through' : 'text-gray-800'">{{ $lesson->title }}</p>
                                    <div class="flex items-center gap-2 mt-1">
                                        @if($lesson->video_url)
                                            <span class="text-xs text-gray-400">▶ Video</span>
                                        @endif
                                        @if($lesson->is_preview)
                                            <span class="text-xs text-green-600 bg-green-50 px-1.5 py-0.5 rounded">Preview</span>
                                        @endif
                                    </div>
                                </div>
                            </button>
                        </li>
                    @endforeach
                </ul>
            </aside>

            {{-- ── AREA VIDEO ── --}}
            <div style="flex:1;min-width:0;" class="order-1 lg:order-2">
                @foreach($lessons as $i => $lesson)
                    @php
                        $canAccess = $owned || $lesson->is_preview;
                        $embedUrl  = null;
                        if ($canAccess && $lesson->video_url) {
                            if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([A-Za-z0-9_-]{11})/', $lesson->video_url, $m)) {
                                $embedUrl = 'https://www.youtube.com/embed/' . $m[1] . '?rel=0&enablejsapi=1';
                            } elseif (preg_match('/vimeo\.com\/(\d+)/', $lesson->video_url, $m)) {
                                $embedUrl = 'https://player.vimeo.com/video/' . $m[1] . '?api=1';
                            }
                        }
                        $nextLesson    = $lessons->get($i + 1);
                        $nextCanAccess = $nextLesson && ($owned || $nextLesson->is_preview);
                    @endphp

                    <div x-show="active === {{ $i }}">
                        @if($canAccess)

                            {{-- Video --}}
                            @if($embedUrl)
                                <div style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;border-radius:1rem;background:#000;">
                                    <iframe id="yt-frame-{{ $i }}"
                                        src="{{ $embedUrl }}"
                                        style="position:absolute;top:0;left:0;width:100%;height:100%;border:0;"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                            @elseif($lesson->video_url)
                                <div style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;border-radius:1rem;background:#000;">
                                    <video controls style="position:absolute;top:0;left:0;width:100%;height:100%;"
                                           @ended="markComplete({{ $i }})">
                                        <source src="{{ $lesson->video_url }}">
                                    </video>
                                </div>
                            @else
                                <div style="padding-bottom:56.25%;position:relative;border-radius:1rem;background:#f3f4f6;">
                                    <div style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;flex-direction:column;color:#9ca3af;">
                                        <p style="margin-bottom:.5rem;display:flex;justify-content:center;color:#9ca3af;"><svg style="width:40px;height:40px;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg></p>
                                        <p style="font-size:.875rem;">Materi teks</p>
                                    </div>
                                </div>
                            @endif

                            {{-- Judul + Tombol --}}
                            <div class="mt-5 flex items-center justify-between gap-3 flex-wrap">
                                <div>
                                    <p class="text-xs text-gray-400 mb-1">Pelajaran {{ $i + 1 }} dari {{ $total }}</p>
                                    <h2 class="text-lg font-bold text-gray-800">{{ $lesson->title }}</h2>
                                </div>
                                <div class="flex items-center gap-2">
                                    {{-- Tandai selesai --}}
                                    <button x-show="!isCompleted({{ $i }})"
                                            @click="markComplete({{ $i }})"
                                            class="text-sm font-semibold px-4 py-2 rounded-xl border-2 border-green-500 text-green-600 hover:bg-green-50 whitespace-nowrap">
                                        ✓ Tandai Selesai
                                    </button>
                                    <span x-show="isCompleted({{ $i }})"
                                          class="text-sm font-semibold px-4 py-2 rounded-xl bg-green-100 text-green-700 whitespace-nowrap">
                                        ✓ Selesai
                                    </span>
                                    {{-- Selanjutnya --}}
                                    @if($nextLesson && $nextCanAccess)
                                        <button @click="markComplete({{ $i }}); selectLesson({{ $i + 1 }})"
                                                class="text-sm font-semibold px-4 py-2 rounded-xl bg-blue-700 text-white hover:bg-blue-800 whitespace-nowrap">
                                            Selanjutnya ›
                                        </button>
                                    @endif
                                </div>
                            </div>

                            {{-- Konten teks --}}
                            @if($lesson->content)
                                <div class="mt-5 bg-white rounded-2xl border border-gray-100 shadow-sm p-6 text-sm text-gray-700 leading-relaxed">
                                    {!! nl2br(e($lesson->content)) !!}
                                </div>
                            @endif

                        @endif
                    </div>
                @endforeach

                @if(!$owned)
                    <div class="mt-6 bg-blue-50 border border-blue-100 rounded-2xl p-6 text-center">
                        <p class="font-semibold text-gray-800 mb-1">Dapatkan akses ke semua {{ $total }} pelajaran</p>
                        <p class="text-blue-700 font-bold text-xl mb-4">Rp {{ number_format($course->price, 0, ',', '.') }}</p>
                        @auth
                            <form method="POST" action="/member/checkout">
                                @csrf
                                <input type="hidden" name="type" value="course">
                                <input type="hidden" name="id" value="{{ $course->id }}">
                                <button class="bg-blue-700 text-white font-semibold px-8 py-3 rounded-xl hover:bg-blue-800">Daftar Kelas</button>
                            </form>
                        @else
                            <a href="/login" class="inline-block bg-blue-700 text-white font-semibold px-8 py-3 rounded-xl hover:bg-blue-800">Masuk untuk Mendaftar</a>
                        @endauth
                    </div>
                @endif
            </div>

        </div>
    @endif
</div>

</div>{{-- end x-data wrapper --}}

<style>[x-cloak]{display:none!important;}</style>

<script>
function coursePlayer(total, storageKey) {
    return {
        active: 0,
        completed: [],

        init() {
            const saved = localStorage.getItem(storageKey);
            if (saved) this.completed = JSON.parse(saved);

            const hash = parseInt(window.location.hash.replace('#lesson-', ''));
            if (!isNaN(hash) && hash < total) this.active = hash;

            // Auto-detect YouTube video ended via postMessage
            window.addEventListener('message', (e) => {
                try {
                    const data = typeof e.data === 'string' ? JSON.parse(e.data) : e.data;
                    if (data?.event === 'onStateChange' && data?.info === 0) {
                        this.markComplete(this.active);
                    }
                } catch (_) {}
            });
        },

        selectLesson(index) {
            this.active = index;
            window.location.hash = 'lesson-' + index;
            window.scrollTo({ top: 0, behavior: 'smooth' });
        },

        markComplete(index) {
            if (!this.completed.includes(index)) {
                this.completed = [...this.completed, index];
                localStorage.setItem(storageKey, JSON.stringify(this.completed));
            }
        },

        isCompleted(index) {
            return this.completed.includes(index);
        },

        completedCount() {
            return this.completed.length;
        },

        progressPct() {
            if (total === 0) return 0;
            return Math.round((this.completed.length / total) * 100);
        },

        resetProgress() {
            if (!confirm('Reset semua progress kelas ini?')) return;
            this.completed = [];
            localStorage.removeItem(storageKey);
        },
    }
}
</script>

</x-layouts.app>
